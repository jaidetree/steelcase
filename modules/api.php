<?php
/**
 * API Response that gets sent to the browser.
 */
class APIResponse 
{
    const PASS = "ok";
    const FAIL = "error";

    private $_data = array( 
        'action_status' => APIResponse::PASS,
        'action_message' => 'Task ran successfully.',
        'action_code' => 0
    );

    public function __construct($data=array()) 
    {
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

    public function status($status, $message=null, $code=0)
    {
        if( $status === true )
        {
            $status = APIResponse::PASS;
        }
        else
        {
            $status = APIResponse::FAIL;
        }

        $status_array = array( 
            'action_status' => $status,
        );

        if( $message )
        {
            $status_array['action_message'] = $message;
        }

        if( $code )
        {
            $status_array['code'] = $code;
        }

        $this->_data = array_merge( $this->_data, $status_array);
    }

    public function __toString()
    {
        $response = new JSONResponse($this->_data);
        return $response->render();
    }
}
/**
 * API Module for processing an API response.
 */
abstract class APIModule 
{
    protected $response = null;

    /**
     * Handle the action, and process the raw input.
     */
    public function __construct($action, $raw_input)
    {
        $input = $this->process_input($raw_input);

        if( method_exists($this, $action) )
        {
            call_user_func_array(array($this, $action), $input);
        }
        else
        {
            throw new JSONException('There is no action named "' . $action . '".');
        }

        return $this->response;
    }

    public function __toString()
    {
        return (string)$this->response;
    }

    private function process_input($raw_input)
    {
        if( is_array( $raw_input ) && array_key_exists('data', $raw_input) )
        {
            $raw_input = $raw_input['data'];
        }

        if( is_string($raw_input) && preg_match('/^\{.*\}$/', $raw_input) )
        {
            return json_decode($raw_input, true);
        }
        else
        {
            return $raw_input;
        }
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
    protected function respond($data, $message=false, $status=true, $code=0)
    {
        $this->response = new APIResponse($data);
        $this->response->status($status, $message, $code);
    }

    /**
     * Is the session valid? Should we run our 
     * secret handshake?
     * @return Boolean
     */
    protected function validate_session()
    {
        return true;
    }
}
/**
 * Our exception for handling any error
 * that happens from within an API Request.
 */
class JSONException extends Exception
{
    private $response = null;

    public function __construct($message, $code=0, Exception $previous=null) 
    {
        $this->response = new APIResponse();
        $this->response->status(false, $message, $code);

        //parent::__construct($message, $code, $previous);

        echo $this->response;
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