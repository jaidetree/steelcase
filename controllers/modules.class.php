<?php
class ModulesController extends Controller
{

    public function index()
    {
        @login_required();

        $modules = Module::find('all', array('order' => 'id DESC'));
        return new TemplateResponse('modules/index', array( 'modules' => $modules ));
    }   

    public function add($id)
    {
        @login_required();


        if( $_POST ) 
        {
            $_POST['name'] = strip_tags($_POST['name']);

            $module = new Module();
            $module->name = $_POST['name'];
            $module->save();

            send_message('success', "Module was successfully created.");

            return new RedirectResponse('modules.index');
        }
        else
        { 
            return new TemplateResponse('modules/add');
        }
    }
    public function edit($id)
    {
        @login_required();

        $module = Module::find($id);

        if( $_POST ) 
        {
            $_POST['name'] = strip_tags($_POST['name']);

            $module->name = $_POST['name'];
            $module->save();

            send_message('success', "Module was successfully updated.");

            return new RedirectResponse('modules.index');
        }
        else
        { 
            return new TemplateResponse('modules/edit', array('module' => $module));
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

            $module = Module::find($id);
            $module->delete(); 
            return new JSONResponse(array( 'status' => 'success' ));
        }
        else 
        {
            return new JSONResponse(array( 'status' => 'fail', 'message' => 'You are not logged in!'));
        }

    }
}
?>