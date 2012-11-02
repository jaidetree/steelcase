<?php
class PerformanceObjectsController extends Controller
{

    public function index()
    {
        @login_required();

        $performanceobjects = PerformanceObject::find('all', array('order' => 'created_at DESC'));
        return new TemplateResponse('performanceobjects/index', array( 'performanceobjects' => $performanceobjects ));
    }   

    public function show($id)
    {
        @login_required();
        $performanceobject = PerformanceObject::find($id);

        return new TemplateResponse('performanceobjects/show', array('performanceobjects' => $performanceobject));

    }
}
?>