<?php
class UsersController extends Controller
{
    public function index()
    {
        @login_required();

        $terms = User::find('all', array('order' => 'name ASC'));
        return new TemplateResponse('users/index', array( 'terms' => $terms ));
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
            $_POST['name'] = strip_tags($_POST['name']);
            $_POST['slug'] = slugify($_POST['name']);
            $_POST['description'] = strip_tags($_POST['description']);
            $_POST['created_at'] = time();
            $_POST['user_id'] = Auth::user('id');
            $term = new User($_POST);
            $term->save();

            send_message('success', "User was successfully created.");

            return new RedirectResponse('users.index');
        }else{
            /**
             * No post data so show the add form.
             */
            return new TemplateResponse('users/add');
        }
    }

    public function edit($user_id)
    {
        @login_required();

        $user = User::find_by_id($user_id);
        if( $_POST ) 
        {

            $user->name = strip_tags($_POST['name']);
            $user->slug = slugify($_POST['name']);
            $user->description = strip_tags($_POST['description']);
            $user->updated_at = time();
            $user->user_id = Auth::user('id');

            $user->save();

            send_message('success', "Term was successfully updated.");

            return new RedirectResponse('users.edit', array( $term->slug ));
        }
        else
        { 
            return new TemplateResponse('users/edit', array('term' => $term));
        }
    }

    public function delete($id)
    {
        if( $_SERVER['REQUEST_METHOD'] !== "DELETE") 
        {
            return new Error404Response();
        }
        if( Auth::is_logged_in() ) 
        {

            $user = User::find_by_id($id);
            $user->status = 3;
            $user->save();
            return new JSONResponse(array( 'status' => 'success' ));
        }
        else 
        {
            return new JSONResponse(array( 'status' => 'fail', 'message' => 'You are not logged in!'));
        }

    }
}
?>