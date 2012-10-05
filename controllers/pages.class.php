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
        return new TemplateResponse('home');
    }        

    function secure()
    {
        login_required();

        return new TemplateResponse('secure');
    }
}
?>
