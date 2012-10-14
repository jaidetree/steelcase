<?php
class TraineesController extends Controller
{
    public function index()
    {
        @login_required();

        $trainees = Trainee::find('all', array('order' => 'employee_id ASC'));
        return new TemplateResponse('trainees/index', array( 'trainees' => $trainees ));
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
            $_POST['employee_id'] = strip_tags($_POST['employee_id']);
            $_POST['created_at'] = time();
            $_POST['status'] = strip_tags($_POST['status']);

            $trainee = new Trainee($_POST);
            $trainee->save();

            send_message('success', "Trainee was successfully created.");

            return new RedirectResponse('trainees.index');
        }else{
            /**
             * No post data so show the add form.
             */
            return new TemplateResponse('trainees/add');
        }
    }

    public function edit($id)
    {
    
        @login_required();

        $trainee = Trainee::find($id);
        if( $_POST ) 
        {

            $trainee->employee_id = strip_tags($_POST['employee_id']);
            $trainee->status = strip_tags($_POST['status']);

            $trainee->save();

            send_message('success', "Trainee was successfully updated.");

            return new RedirectResponse('trainees.index', array( $trainee->id ));
        }
        else
        { 
            return new TemplateResponse('trainees/edit', array('trainee' => $trainee));
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
            $trainee = Trainee::find($id);
            $trainee->delete(); 
            return new JSONResponse(array( 'status' => 'success' ));
        }
        else 
        {
            return new JSONResponse(array( 'status' => 'fail', 'message' => 'You are not logged in!'));
        }

    }
}
?>