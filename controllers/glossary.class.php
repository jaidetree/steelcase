<?php
class GlossaryController extends Controller
{
    public function index()
    {
        $terms = Glossary::find('all', array('order' => 'name ASC'));
        return new TemplateResponse('glossary/index', array( 'terms' => $terms ));
    }   

    public function add()
    {

        $term = new Glossary();

        $term->name = "";
        $term->slug = "new";
        $term->description = "";
        $term->save();

        $term = Glossary::find_by_slug($slug);

        return new TemplateResponse('glossary/edit', array( 'term' => $term ));
    }

    public function edit($slug)
    {
        $term = Glossary::find_by_slug($slug);

        return new TemplateResponse('glossary/edit', array( 'term' => $term ));
    }

    public function delete($slug)
    {
        $term = Glossary::find_by_slug($slug);

        $term->delete(); 

        $terms = Glossary::find('all', array('order' => 'name ASC'));
        return new TemplateResponse('glossary/index', array( 'terms' => $terms ));
    }
    public function update($slug)
    {

        $term = Glossary::find_by_slug($slug);

        $term->name = $_POST['name'];
        $term->description = $_POST['description'];
        $term->save();

        $terms = Glossary::find('all', array('order' => 'name ASC'));
        return new TemplateResponse('glossary/index', array( 'terms' => $terms ));
    }
}
?>