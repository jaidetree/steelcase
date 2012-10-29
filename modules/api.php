<?php
namespace API;
/**
 * PHP Token Class
 */
class Tokenizer
{
    public static function generate($value)
    {
        $bcrypt = new \Bcrypt(4);
        $key = $bcrypt->hash( '@R()ck3tt' . ( time() / 5 ) );
        $raw = hash_hmac( 'sha256', $value, $key );

        $start = rand(0, 47);
        $left = substr($raw, $start, strlen($raw) / 8);
        $token = self::_generate_token($left);

        return $token;
    } 

    private static function _generate_token($chars)
    {
        $bcrypt = new \Bcrypt(5);
        $right_chars = str_split($chars);
        $right = "";

        foreach($right_chars as $char)
        {
            $char = hexdec($char) * 3 + 1;
            $right .= dechex($char);
        }


        $right = hash_hmac( 'sha256', $right, 'BR4keTM@5k');
        $right = substr($right, 10, strlen($chars));

        return $chars . $right;
    }

    public static function process_key($time)
    {
       return ($time + 4) * 4 / 10;
    }

    public static function verify_token($token)
    {
        $token_raw = substr($token, 0, 8);

        if( $token == self::_generate_token($token_raw) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
/**
 * API Response that gets sent to the browser.
 */
class Response extends \JSONResponse
{
    const message = "Command ran successfully.";
    const status_pass = "ok";
    const status_fail = "error";
    const default_error_code = -1;

    protected $_data = array( 
        'status' => Response::status_pass,
        'message' => Response::message, 
        'error_code' => Response::default_error_code 
    );

    public function __construct($content=array(), $message=null, $is_error=false, $error_code=null) 
    {
        $this->build_response($content, $message, $is_error, $error_code);
    }

    /**
     * Create our response packet with a status, message, and code.
     * @param  mixed $content    [description]
     * @param  boolean $is_error   [description]
     * @param  integer $error_code [description]
     */
    private function build_response($content, $message, $is_error, $error_code)
    {
        if( $is_error === true )
        {
            $data = array();
            $data['status'] = Response::status_fail;
            $data['message'] = $message;
            $data['error_code'] = $error_code;
        }
        else
        {
            $data['status'] = Response::status_pass;
            $data['error_code'] = Response::default_error_code;
            $data['data'] = $content;
            $data['message'] = $message ? $message : Response::message;
        }
        
        $this->_data = array_merge($this->_data, $data);
    }

    public function __set($name, $value)
    {
        $this->_data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->_data[$name];
    }
}
/**
 * ModuleFactory
 *
 * Responsible for generating module objects and running
 * running the proper API Module method.
 */
class ModuleFactory
{
    /**
     * Handle any internal errors as JSON messages.
     */
    public static function exception_error_handler($errno, $errstr, $errfile, $errline) 
    {
        throw new JSONException($errstr . " " . $errfile . " " . $errline);
    }

    /**
     * Factory Method for creating API Modules.
     */
    public static function create($route)
    {
        set_error_handler(__CLASS__ . '::exception_error_handler', E_ALL & ~E_NOTICE );
        list($class_name, $method) = explode('.', $route);

        if( ! class_exists('API\\' . $class_name) )
        {
           require_once ROOT . 'api/' . strtolower($class_name) . '.class.php'; 
        }

        $class_name = 'API\\' . $class_name;

        $class = new $class_name();

        if( method_exists($class, $method) )
        {
            call_user_func_array(array($class, $method), self::process_input($_POST) );
        }
        else
        {
            throw new JSONException('There is no action named "' . $action . '".');
        }

        return $class;
    }

    /**
     * Turn all input data into a consistently
     * structured array to send to an API Module.
     */
    private static function process_input($input)
    {
        if( ! $input )
        {
            return array( 'data' => array() );
        }
        if( is_string( $input ) )
        {
            return json_decode($input, true);
        }

        if( is_array( $input ) )
        {
            if( ! array_key_exists('data', $input) )
            {
                $data = array( 'data' => $input);
                $input = $data;
            }
            else
            {
                if( is_string($input['data']) ) 
                {
                    $input['data'] =  self::process_input($input['data']) ;
                }
            }
            return $input;
        }
        if( is_object( $input ) )
        {
            return (array)$input;
        }
    }
}
/**
 * API Module for processing an API response.
 */
abstract class Module 
{
    protected $response = null;

    /**
     * Return a string version of the response.
     * Results in a JSON formatted string.
     */
    public function __toString()
    {
        return (string)$this->response;
    }

    /**
     * Construct a JSON Response. Should be called in every
     * APIModule subclass.
     * @param  array  $data         Array of data
     * @param  string  $message     Message to send back.
     * @param  boolean  $status     True/False for weather it's a success or failure.
     * @param  integer $code        Just a unqiue number to identify where.
     */
    protected function respond($data, $message=null)
    {
        /**
         * If we have a model object, turn it into an array.
         */
        if( is_subclass_of($data, 'ActiveRecord\Model') )
        {
            $data = $data->attributes();            
            foreach($data as $key => $value)
            {
                /**
                 * If property is a datetime object then
                 * format it as a string date.
                 */
                if( method_exists($value, 'format') )
                {
                    $data[$key]  = $value->format("F j, Y h:i a");
                }
            }
        }


        $this->send( new Response($data, $message) );
    }
    /**
     * Show an error response from within a 
     * API Module subclass.
     * @param  string  $message    [description]
     * @param  integer $error_code [description]
     */
    protected function error($message, $error_code=0)
    {
       $this->send( new Response(null, $message, true, $error_code) );
    }

    public function send($response)
    {
        echo $response;
        die();
    }

    protected function token_required($token)
    {
        if( $token and $_SESSION['token'] == $token and Tokenizer::verify_token($token) )
        {
            return true;
        }

        $this->error("Authenticated token required.");
    } 
}
/**
 * Our exception for handling any error
 * that happens from within an API Request.
 */
class JSONException extends \Exception
{
    public function __construct($message, $code=0, Exception $previous=null) 
    {
        $response = new Response(null, $message, true, $code);
        echo $response;
        die();
        // Override here
    }
}
?>