<?php
abstract class Response
{
    abstract public function render();
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

    public function __construct($location, $data=array())
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
        header("Location: " . $this->location);
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
?>
