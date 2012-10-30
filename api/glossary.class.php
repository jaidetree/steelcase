<?php
namespace API;
class Glossary extends Module
{
    public function get($data)
    {
        $this->token_required($data['token']);
        $terms = array();
        foreach( \Glossary::all() as $term )
        {
            $terms[] = array( 
                'term' => $term->name, 
                'definition' => $term->description
            );
        }
        $this->respond($terms, 'Terms retrieved.');
    }
}
?>