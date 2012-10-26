<?php
namespace API;
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

    public function __construct($content=array(), $is_error=false, $error_code=null) 
    {
        $this->build_response($content, $is_error, $error_code);
    }

    private function build_response($content, $is_error, $error_code)
    {
        if( $is_error === true )
        {
            $data = array();
            $data['status'] = Response::status_fail;
            $data['message'] = $content;
            $data['error_code'] = $error_code;
        }
        else
        {
            $data = $content;
            $data['status'] = Response::status_pass;
            if( ! array_key_exists('message', $data) or ! $data['message'] )
            {
                $data['message'] = Response::message;
            }
            $data['error_code'] = Response::default_error_code;
        }
        
        $this->_data = array_merge($this->_data, $data);
    }

    public function error($message, $error_code=0)
    {
        $this->build_response($message, true, $error_code);
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
class ModuleFactory
{
    /**
     * Factory Method for creating API Modules.
     */
    public static function create($route)
    {
        list($class_name, $method) = explode('.', $route);

        if( ! class_exists($class_name) )
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
     * Handle the action, and process the raw input.
     */
    public function __construct()
    {
        set_error_handler(array( $this, 'exception_error_handler' ));
    }

    public function exception_error_handler($errno, $errstr, $errfile, $errline) {
        throw new JSONException($errstr . " " . $errfile . " " . $errline);
    }

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
     * @todo  Use subclass of to turn a model into an array.
     */
    protected function data_response($data, $message)
    {
        if( is_subclass_of($data, 'ActiveRecord\Model') )
        {
            $data = $data->attributes();            
            foreach($data as $key => $value)
            {
                if( method_exists($value, 'format') )
                {
                    $data[$key]  = $value->format("F j, Y h:i a");
                }
            }
        }

        $data['message'] = $message;

        $this->response = new Response($data);
    }
    protected function error_response($message, $error_code=0)
    {
       $this->response = new Response($message, true, $error_code);
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
        $response = new Response();
        $response->error($message, $code);

        echo $response;

        die();
        // Override here
    }

    public function __toString() {

        return json_encode(array( 
            'status' => $this->response->status,
            'message' => $this->response->message
        ));
    }
}
?>