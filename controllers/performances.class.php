<?php
class PerformancesController extends Controller
{

    public function index()
    {
        @login_required();

        $performances = Performance::find('all', array('order' => 'created_at DESC'));
        return new TemplateResponse('performances/index', array( 'performances' => $performances ));
    }   

    public function by_trainee($trainee_id)
    {
        @login_required();

        $trainee = Trainee::find($trainee_id);
        return new TemplateResponse('performances/index', array(
            'performances' => $trainee->performances,
             'context' => " for Trainee ".$trainee->employee_id ));
    }   

    public function by_module($module_id)
    {
        @login_required();

        $module = Module::find($module_id);
        
        return new TemplateResponse('performances/index', array(
            'performances' => $module->performances,
             'context' => " for ".$module->name));
    }   

    public function edit($id)
    {
        @login_required();

        $performance = Performance::find($id);
        $modules = Modules::find('all', array('order' => 'name ASC'));
        $trainees = Trainee::find('all', array('order' => 'employee_id ASC'));

        if( $_POST ) 
        {
            $_POST['score'] = floatval($_POST['score']);
            $_POST['duration'] = floatval($_POST['duration']);
            $_POST['module_id'] = intval($_POST['module_id']);
            $_POST['trainee_id'] = intval($_POST['trainee_id']);

            $performance->score = $_POST['score'];
            $performance->duration = $_POST['duration'];
            $performance->module_id = $_POST['module_id'];
            $performance->trainee_id = $_POST['trainee_id'];

            $performance->save();

            send_message('success', "Performance was successfully updated.");

            return new RedirectResponse('performances.index');
        }
        else
        { 
            return new TemplateResponse('performances/edit', array('performance' => $performance, 'modules' => $modules));
        }
    }

    public function show($id)
    {
        @login_required();
        $performance = Performance::find($id);

        return new TemplateResponse('performances/show', array('performance' => $performance));

    }
}
?>