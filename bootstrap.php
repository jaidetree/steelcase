<?php
/**
 * This page basically loads everything.
 */
error_reporting( E_ALL & ~E_NOTICE );
@ini_set("display_errors", 1);

define( 'ROOT', dirname( __FILE__ ) . '/' );

require_once ROOT . "includes/app.class.php";

/**
 * Load our core files.
 */
$includes_dir = ROOT . 'includes/';
$dir = dir($includes_dir);

while(($file = $dir->read()) !== false )
{
    /**
     * Does the file start with a dot (.)?
     */
    if( substr($file, 0, 1) == "." )
    {
        /**
         * Skip this file!
         */
        continue;
    }
    require_once $includes_dir . $file;
}

/**
 * Files to include 
 */
$files = array(
    "bcrypt.class.php",
    "php-activerecord/ActiveRecord.php",
    "context.class.php",
    "messenger.class.php",
    "auth.php",
    "standardauth.class.php",
    "html.php",
    "fields.php",
);

/**
 * Include those required files
 */
$module_dir = ROOT . 'modules/';
foreach( $files as $file )
{
    if( ! file_exists( $module_dir . $file ) )
    {
        continue;
    }

    require_once $module_dir . $file;
}


/**
 * Initalize our drivers
 */
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('models');
    $cfg->set_connections(array(
        'development' => 'mysql://' . APP::cfg('db', 'username') . ':' . APP::cfg('db', 'password') . '@' . APP::cfg('db', 'host' ) . '/' . APP::cfg('db', 'name' )
    ));
});

/** 
 * Load our Controllers 
 */
$controller_dir = ROOT . 'controllers/';
$dir = dir($controller_dir);

//require_once( $controller_dir . 'context.class.php' );

while( ($file = $dir->read()) !== false )
{
    if( ! preg_match( '/\.class\.php$/', $file ) )
    {
        continue;
    }
    require_once $controller_dir . $file;
    $name = ucwords(basename($file, ".class.php"));
    $class_name = $name . "Controller";

    if( class_exists( $class_name ) )
    {
        $object = new $class_name();

        APP::add_controller($name, $object);
    }
}
/**
 * Authentication initialization
 */
Auth::get('StandardAuth')->start();
?>
