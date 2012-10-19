<?php 
/**
 * General Functions File
 */
function slugify($str)
{
    $str = preg_replace( '/-/', ' ', $str );
    $str = preg_replace( '/\s\s+/', ' ', $str );
    preg_match_all('/([\s_a-z0-9]+)/', strtolower($str), $chars);
    $str = implode( '', $chars[1] );
    $str = trim($str);
    $str = str_replace(' ', '-', $str);
    return $str;
}

function is_page($controller)
{
    if( is_url($controller) )
    {
        echo "active ";
    }
}
function is_url($controller)
{
    $test_url = APP::url($controller);
    $uri = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $uri;

    if( $url == $test_url )
    {
        return true;
    }
    else
    {
        return false;
    }
}
function url($path, $data=array())
{
    echo APP::url($path, $data);
}
function bodyclass()
{
    return "";
}
function is_selected($i, $value)
{
    if( $i == $value )
    {
        echo ' selected';    
    }
}
?>
