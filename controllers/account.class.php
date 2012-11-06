<?php
class AccountController extends Controller 
{
    function login()
    {
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
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        session_start();
        send_message('success', 'You are now logged out.');
        return new TemplateResponse('account/login');
    }
}
?>