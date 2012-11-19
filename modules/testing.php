<?php
/** 
 * Tester.
 * Sets up the routes
 * Loads the tests.
 */
class Tester
{
    private $tests;
    public function __construct()
    {
        APP::modules()->router->append( '^testing/$', 'Tests.index');
        APP::modules()->router->append( '^testing/verbose/$', 'Tests.verbose');
        APP::modules()->router->append( '^testing/([-_a-z]+)/$', 'Tests.run');
        $this->tests = new Collection();

        APP::modules()->observer->attach(new TestLogger(), 'TestRunner');
    }   

    public function load_tests()
    {
        $controller_dir = ROOT . 'tests/';
        $dir = dir($controller_dir);

        while( ($file = $dir->read()) !== false )
        {
            if( ! preg_match( '/\.class\.php$/', $file ) )
            {
                continue;
            }
            require_once $controller_dir . $file;
        }
    }

    public function tests()
    {
        return $this->tests;
    }

    public function get()
    {
        return $this->tests->iterator();
    }

    public function register_test($display_name, $test)
    {
        $item = new Collection();
        $item->name = $display_name;
        $item->object = $test; 
        $this->tests->append(slugify(get_class($test)), $item);
    }
}
APP::register_module(new Tester());

class TestsController extends Controller
{
    public function __construct()
    {
        set_error_handler(array($this, 'exception_error_handler'), E_ALL & ~E_NOTICE);
    }

    public function exception_error_handler($errno, $errstr, $errfile, $errline ) {
        throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
    }
    public function index()
    {
        login_required();

        $html = HTML::div();
        $ul = HTML::ul();
        $page = HTML::div(array( 'class' => 'page', 'style' => 'margin: 1em;' ));

        $ul->style = "margin: 1em;";

        foreach( APP::modules()->tester->get() as $name=>$item )
        {
            $li = HTML::li();
            $object = $item->object;
            $test = HTML::li(HTML::a(array(
                'href' => APP::url('Tests.run', array( slugify($name) )),
            ), $item->name ));

            $li->insert($test);
            $ul->insert($li);
        }

        $html->insert(HTML::h1('Tests'));
        $html->insert(render('_status'));

        if( $_SESSION['test_verbose'] )
        {
            $verbose = "on";
        }
        else
        {
            $verbose = "off";
        }

        $a = HTML::a(array( 'href' => APP::url('Tests.verbose') ), 'Toggle Verbose Mode');

        $page->insert(HTML::p('Verbose mode is ' . $verbose . ' ' . $a));
        $page->insert(HTML::p('Run any of the following tests:'));
        $page->insert($ul);
        $html->insert($page);

        echo render('_header');
        echo new HTMLResponse($html);
        echo render('_footer');
    }

    public function run($class_name)
    {
        login_required();

        foreach( APP::modules()->tester->get() as $test)
        {
            new TestRunner($test->object, $_SESSION['test_verbose']);
        }
    }

    public function verbose()
    {
        login_required();

        if( ! $_SESSION['test_verbose'] )
        {
            $_SESSION['test_verbose'] = true;
            send_message('status', 'Verbose mode activated.');
        }
        else
        {
            $_SESSION['test_verbose'] = false;
            send_message('status', 'Verbose mode deactivated.');
        }

        return new RedirectResponse(APP::url('Tests.index'));
    }
}

class TestRunner
{
    public function __construct($test_object, $verbose=false)
    {
        $class = new ReflectionClass($test_object);

        $test_object->verbose($verbose);

        APP::notify(get_class(), 'start_testing', array( $class ));

        if( is_callable(array( $test_object, 'setup')) )
        {
            APP::notify(get_class(), 'setup', array( $class->getMethod('setup') ));
            $test_object->setup();
        }

       foreach($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method)
       {
            if( ! preg_match('/^test_/', $method->name ) )  
            {
                continue;
            }

            APP::notify(get_class(), 'start_test', array( $method ));

            try
            { 
                $method->invoke($test_object);
            }
            catch (Exception $e)
            {
                $test_object->error($e->getMessage());
            }

            $result = $test_object->status();
            APP::notify(get_class(), 'ran', array( $method, $result));
            $test_object->reset_status();
       }

       if( is_callable(array( $test_object, 'teardown')) )
       {
           APP::notify(get_class(), 'teardown', array( $class->getMethod('teardown') ));
           $test_object->teardown();
       }
       APP::notify(get_class(), 'finished_testing', array( $class, $test_object->errors() ));
    }
}
class TestLogger
{
    private static $timer;
    private static $total_time;
    function start_testing($class)
    {
        TestPrinter::start();
        self::$total_time = microtime(true);
        TestPrinter::headline('STARTED TEST: ' . $class->name);
    }
    function finished_testing($class, $errors=0)
    {
        TestPrinter::rule();
        $time = HTML::span(array( 'style' => "font-weight: bold;color: blue;" ), round((microtime(true) - self::$timer), 5));
        TestPrinter::action('Finished Testing at ' . date("h:i a") . ' in ' . $time . ' seconds, ' . $errors . ' errors were encountered.', 0);
        TestPrinter::rule();
        TestPrinter::stop();
    }
    function start_test($method)
    {
       self::$timer = microtime(true);
       TestPrinter::action('Running Test: ' . $method->name);
    }
    function ran($method, $success=false)
    {
        $tag = HTML::span();
        if( $success )
        {
            $tag->style = "color: green;";
            $tag->insert('Test Passed');
            $status = "..........";
        }
        else 
        {
            $tag->style = "color: red;";
            $status = "..........";
            $tag->insert('Test Failed');
        }
        $time = HTML::span(array( 'style' => "font-weight: bold;color: blue;" ), round((microtime(true) - self::$timer), 5));
        TestPrinter::action($status . $tag . ' in ' . $time . ' seconds.', 2);
        TestPrinter::rule('-');
    }

    function teardown()
    {
        TestPrinter::action('Running Teardown....', 2);
    }
}
class TestPrinter
{
   public static function start()
   {
        echo "<pre>";
   } 
   public static function stop()
   {
        echo "</pre>";
   }
   private static function send($object)
   {
        echo $object . "\n"; 
   }
   public static function rule($char="=")
   {
        self::send(new TestPrintRule($char));
   }
   public static function headline($line)
   {  
        self::send(new TestPrintRule());
        self::send(new TestPrintHeader(strtoupper(date( 'h:i:s a' )) . ': ' . $line));
        self::send(new TestPrintRule());
   }
   public static function action($line, $indent=1)
   {
        self::send(new TestPrintLine($line, $indent));
   }
   public static function error($line, $indent=2)
   {
        self::send(new TestPrintError($line, $indent));
   }
}
class TestPrintDisplay
{
    protected $data;
    public function __construct($data)
    {
       $this->data = $data; 
    }
    public function __toString()
    {
        return $this->output();
    }
}
class TestPrintRule extends TestPrintDisplay
{
    public function __construct($char="=")
    {
        $this->data = $char;
    }

    public function output()
    {
        $suffix = "";
        if( $this->data != '=' )
        {
            $suffix = "\n";
        }
        return $suffix . str_repeat($this->data, 100) . $suffix;
    }
}
class TestPrintHeader extends TestPrintDisplay
{
    public function __construct($data)
    {
        parent::__construct($data);
    }
    public function output()
    {
        return $this->data;
    }
}
class TestPrintLine extends TestPrintDisplay
{
    public function __construct($text, $indent=1)
    {
        $this->indent = $indent;
        parent::__construct($text);
    }
    public function output()
    {
        return str_repeat("\t", $this->indent) . $this->data;
    }
}
class TestPrintError extends TestPrintLine
{
    public function output()
    {
        $tag = HTML::span(array( 'style' => 'color: red;'), $this->data);
        return str_repeat("\t", $this->indent) . $tag;
    }
}
class TestPrintLineBreak extends TestPrintDisplay
{
    public function output()
    {
        return "\n\n";
    }
}

class TestError extends Exception
{
    public function __construct($message="", $code=0, $exception=NULL)
    {
        parent::__construct($message, $code, $exception);    
    }

    public function __toString()
    {
        TestPrinter::error( $this->message );
        return ' ';
    }
}

class Test
{
    protected $verbose = false;
    protected $status = true;
    protected $_errors = 0;
    public function status()
    {
        return $this->status;
    }
    public function reset_status()
    {
        $this->status = true;;
    }

    public function error($message)
    {
        $data = debug_backtrace();
        $data[1]['file'] = basename( $data[1]['file'] );
        $error_msg = vsprintf("Error in %s on line %s in %s", $data[0]);
        $this->_errors++;
        TestPrinter::error( $message . "\n\t\t" . $error_msg);
        $this->status = false;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function output()
    {
        if( ! $this->verbose )
        {
            return false;
        }
        $args = func_get_args();
        $message = array_shift($args);

        if( count($args) > 0 )
        {
            $message = vsprintf($message, $args);
        }

        TestPrinter::action($message, 3);
    }

    public function should_pass($condition, $error_message="")
    {
        if( $condition === true )
        {
            return true;
        }
        else
        {
            $this->error('Condition should pass but failed: ' . $error_message );
            return false;
        }
    }
    public function should_fail($condition, $error_message="")
    {
        if( $condition === true )
        {
            $this->error('Condition should fail but passed: ' . $error_message );
            return true;
        }
        else
        {
            return false;
        }
    }
    public function assert_equal()
    {
        $args = func_get_args();
        foreach($args as $idx=>$arg)
        {
            if( $idx > 0 && $arg[$idx] !== $arg[$idx-1] )
            {
                $this->error(sprintf('Assert failed: %s does not equal %s', $arg[$idx-1], $arg[$idx]));
                return false;
            }
        }

        return true;
    }
    public function assert_not_equal()
    {
        $args = func_get_args();
        foreach($args as $idx=>$arg)
        {
            if( $idx > 0 && $arg[$idx] === $arg[$idx-1] )
            {
                $this->error(sprintf('Assert failed: %s does equal %s', $arg[$idx-1], $arg[$idx]));
                return false;
            }
        }

        return true;
    }
    public function verbose($mode)
    {
        $this->verbose = $mode;
    }
}
class CRUDTest extends Test
{
    protected $model = "stdObject";
    protected $controller = "TraineesController";

    public function test_create()
    {
        $columns = call_user_func( $this->model . '::Table')->columns;
        for($i=0;$i<=1000;$i++)
        {
            $model = new $this->model();
            foreach($columns as $column)
            {
                $column_name = $column->name;
                if( $column_name == "id" )
                {
                    continue;
                }
                $model->$column_name = md5(time());
            }
            $this->output("saving model: " . $this->model . ' id: ' . $columns[0]['name']);
            $this->should_pass($model->save(), 'Saving model ' . $this->model . '.');
            $this->data[] = $model;
        }
    }

    public function test_read()
    {
        $data = call_user_func( $this->model . '::all');
        $this->should_pass(count($data) > 0, 'The number of rows should be more than 0.');

        foreach( $data as $item )
        {
            $this->should_pass(is_object($item), 'The collection of rows should be an item.');
        }
    }

    public function test_update()
    {
        $columns = array_values(call_user_func( $this->model . '::Table')->columns);
        $data = $this->data;

        $this->should_pass(count($data) > 0, 'The number of rows should be more than 0 in test_update.');

        foreach( $data as $item )
        {
            $name = $columns[1]->name;
            $item->$name = base64_encode(md5(time()));
            $this->should_pass($item->save(), 'The table ' . $this->model . ' could not be updated.');
        }
    }

    public function test_delete()
    {
       foreach( $this->data as $item ) 
       {
            $this->should_pass($item->delete(), 'Tried deleting item ' . $item->id );
       }
    }

    public function test_routes()
    {
        $controller = new ReflectionClass($this->controller);

        foreach( $controller->getMethods(ReflectionMethod::IS_PUBLIC) as $method )
        {
            if( $method->name == "route" )
            {
                continue;
            }

            $method_class = str_replace('Controller', '', $method->class);
            $method_name = trim($method->name);

            $url = APP::url($method_class . '.' . $method_name ); 

            if( $url == "#error" )
            {
                $this->error( "Could not find route to " . $method_class . ' ' . $method_name );
            }
            else
            {
                $this->should_pass( preg_match('#^http(.*)/$#i', trim($url)) == 1, 'URL reversal not working for ' . $url );
            }
        }
    }

    public function test_controller()
    {

        $controller = new ReflectionClass($this->controller);

        foreach( $controller->getMethods(ReflectionMethod::IS_PUBLIC) as $method )
        {
            if( $method->name == "route" )
            {
                continue;
            }

            $method_class = str_replace('Controller', '', $method->class);
            $method_name = trim($method->name);

            $url = APP::url($method_class . '.' . $method_name ); 

            if( $url == "#error" )
            {
                $this->error( "Could not find route to " . $method_class . ' ' . $method_name );
            }
            else
            {
                $this->should_pass( preg_match('#^http(.*)/$#i', trim($url)) == 1, 'URL reversal not working for ' . $url );
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            @session_write_close();
            $result = curl_exec($ch);
            curl_close($ch);
            @session_start();

            $this->should_fail( preg_match( '/401|Error|Not Found/', $result) == 1, "An error occured when testing " . $url . htmlentities($result) );
        }
    }
}
?>