<?php
class AccountController extends Controller 
{
    function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if( ( ! $username or ! $password ) and ! Auth::init()->is_logged_in() ) {
            return new TemplateResponse('account/login');
        }
        else
        {
            if( Auth::init()->login($username, $password) )
            {
                return new RedirectResponse('pages.secure');
            }
            else
            {
                
            }
        }
    }   
}
?>