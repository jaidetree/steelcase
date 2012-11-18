<?php
class Response
{
    protected $data;


    public function render() 
    {
        return '';
    }

    public function __toString()
    {
        return $this->render();
    }
}

class TextResponse extends Response 
{
    public function __construct($text)
    {
        $this->data = $text;
    }

    public function render()
    {
        echo $this->data;
        return parent::render();
    }
}
class TemplateResponse extends Response
{
    private $template;

    public function __construct($template, $data=array())
    {
        $this->template = $template;
        $this->data = $data;
    }
    public function render()
    {
        echo render($this->template, $this->data);
        return '';
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
        return parent::render();
    }
}
class JSONResponse extends Response
{
    protected $_data = array();

    public function __construct($data) 
    {
        $this->_data = $data;
    }
    public function render()
    {
        header('Content-Type: text/json');
        echo json_encode($this->_data);
        return parent::render();
    }
}
class HTMLResponse extends Response
{
    public function __construct($content)
    {
        if( ! is_a($content, 'HTMLTag') )
        {
            throw new Exception('Object must be a HTMLTag type, instead it was a ' . get_class($content));
        }
        $this->data = $content;
    }

    public function render()
    {
        echo $this->data->html();
        return parent::render();
    }
}
?>
