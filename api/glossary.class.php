<?php
namespace API;
class Glossary extends Module
{
    public function get($data)
    {
        $this->token_required($data['token']);

        $terms = array();
        foreach( \Glossary::find('all', array('order' => 'slug ASC')) as $term )
        {
            $terms[] = array( 
                'term' => $term->name, 
                'definition' => $term->description,
                'slug' => $term->slug
            );
        }
        $this->respond($terms, 'Terms retrieved.');
    }
}
?>