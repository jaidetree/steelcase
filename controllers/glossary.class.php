<?php
class GlossaryController extends Controller
{
    public function index()
    {
        $terms = Glossary::find('all', array('order' => 'name ASC'));
        return new TemplateResponse('glossary/index', array( 'terms' => $terms ));
    }   

    public function edit($slug)
    {
        $term = Glossary::find_by_slug($slug);

        return new TemplateResponse('glossary/edit', array( 'term' => $term ));
    }
}
?>