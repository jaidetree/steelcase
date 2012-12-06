<?php
class GlossaryController extends Controller
{
    public function index()
    {
        @login_required();

        $terms = Glossary::find('all', array('order' => 'name ASC'));
        return new TemplateResponse('glossary/index', array( 'terms' => $terms ));
    }   

    public function add()
    {
        @login_required();
        /**
         * Do we have post data?
         * @todo Show error messages using our error messages.
         */
        if( $_POST ) 
        {
            /**
             * Let's validate/sanitize the post data.
             * Needs to be streamlined in some way.
             */
            $term = new Glossary();

            $term->name = strip_tags($_POST['name']);
            $term->slug = slugify($_POST['name']);
            $term->description = strip_tags($_POST['description']);
            $term->user_id = Auth::user('id');

            $term->save();

            send_message('success', "Term was successfully created.");

            return new RedirectResponse('glossary.index');
        }else{
            /**
             * No post data so show the add form.
             */
            return new TemplateResponse('glossary/add');
        }
    }

    public function edit($slug)
    {
        @login_required();

        $term = Glossary::find_by_slug($slug);
        if( $_POST ) 
        {
            $term->name = strip_tags($_POST['name']);
            $term->slug = slugify($_POST['name']);
            $term->description = strip_tags($_POST['description']);
            $term->updated_at = time();
            $term->user_id = Auth::user('id');
            $term->save();

            send_message('success', "Term was successfully updated.");

            return new RedirectResponse('glossary.index', array( $term->slug ));
        }
        else
        { 
            return new TemplateResponse('glossary/edit', array('term' => $term));
        }
    }

    public function delete($slug)
    {
        if( $_SERVER['REQUEST_METHOD'] !== "DELETE") 
        {
            return new Error404Response();
        }
        if( Auth::is_logged_in() ) 
        {
            $term = Glossary::find_by_slug($slug);
            $term->delete(); 
            return new JSONResponse(array( 'status' => 'success' ));
        }
        else 
        {
            return new JSONResponse(array( 'status' => 'fail', 'message' => 'You are not logged in!'));
        }

    }
}
?>