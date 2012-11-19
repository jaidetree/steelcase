<?php
class PagesController extends Controller
{
    /**
     * This is a view. It runs our business logic. Like getting data from a 
     * database then sends it to a template file in our views folder
     * to render to the user.
     */
    function home()
    {
        /**
         * Is used as our homepage. It's job is to render the homepage content
         * and display the latest comic.
         */
        if( ! Auth::is_logged_in() )
        {
            return new RedirectResponse('account.login');
        } else {
            return new RedirectResponse('pages.secure');
        }
    }        

    function secure()
    {
        login_required();

        return new TemplateResponse('secure');
    }
}
?>
