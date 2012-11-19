<?php
class AccountController extends Controller 
{
    function login()
    {
        $this->bodyclass('login');
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        if( ( ! $username or ! $password ) and ! Auth::is_logged_in() ) {
            return new TemplateResponse('account/login');
        }
        else
        {
            if( Auth::login($username, $password) )
            {
                return new RedirectResponse('pages.secure');
            }
            else
            {
                send_message('error', "Account email/password did not match.");
                return new TemplateResponse('account/login');
            }
        }
    }
    function logout()
    {
        Auth::logout();
    }
}
?>