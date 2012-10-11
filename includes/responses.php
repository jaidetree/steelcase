<?php
class Response
{
    public function render() 
    {
        return "";
    }

    public function __toString()
    {
        $this->render();
        return '';
    }
}

class TemplateResponse extends Response
{
    private $template;
    private $data;

    public function __construct($template, $data=array())
    {
        $this->template = $template;
        $this->data = $data;
    }
    public function render()
    {
        echo render($this->template, $this->data);
    }
}

class RedirectResponse extends Response
{
    private $location;

    public function __construct($location, $data=array(), $status=301)
    {
        if( $data || preg_match('/^[a-z]+\.[a-z]+$/', $location)  )
        {
            $this->location = APP::url($location, $data);
        }
        else
        {
            if( ! preg_match('/^http/', $location) )
            {
                $location = 'http://' . $_SERVER['REMOTE_HOST'] . '/' . $location;
            }

            $this->location = $location;
        }
    }

    public function render()
    {
        header("Location: " . $this->location, True, $status);
        die();
    }
}
class Error404Response extends TemplateResponse
{
    public function __construct()
    {
        parent::__construct('errors/error404');
    }
    public function render()
    {
        header('HTTP/1.0 404 Not Found');
        parent::render();
    }
}
class JSONResponse extends Response
{
    private $_data = array();

    public function __construct($data) 
    {
        $this->_data = $data;
    }
    public function render()
    {
        echo json_encode($this->_data);
    }
}
?>
