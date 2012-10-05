<?php
class GlossaryController extends Controller
{
    public function index()
    {
        $terms = Glossary::find('all', array('order' => 'name ASC'));
        return new TemplateResponse('glossary/index', array( 'terms' => $terms ));
    }   
}
?>