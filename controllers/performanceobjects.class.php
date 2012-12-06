<?php
class PerformanceObjectsController extends Controller
{

    public function index()
    {
        @login_required();

        $performanceobjects = PerformanceObject::find('all', array('order' => 'performance_id DESC'));
        return new TemplateResponse('performanceobjects/index', array( 'performanceobjects' => $performanceobjects ));
    }   

    public function by_performance($performance_id)
    {
        @login_required();

        $performance = Performance::find($performance_id);
        return new TemplateResponse('performanceobjects/index', array(
             'performanceobjects' => $performance->performance_objects,
             'context' => " for Trainee ".$performance->trainee->employee_id."'s  ".$performance->module->name." performance" ));
    }   

    public function show($id)
    {
        @login_required();
        $performanceobject = PerformanceObject::find($id);

        return new TemplateResponse('performanceobjects/show', array('performanceobjects' => $performanceobject));

    }
    public function delete($id)
    {
        if( $_SERVER['REQUEST_METHOD'] !== "DELETE") 
        {
            return new Error404Response();
        }
        if( Auth::is_logged_in() ) 
        {
            $performanceobject = PerformanceObject::find($id);
            $performanceobject->delete(); 
            return new JSONResponse(array( 'status' => 'success' ));
        }
        else 
        {
            return new JSONResponse(array( 'status' => 'fail', 'message' => 'You are not logged in!'));
        }

    }
}
?>