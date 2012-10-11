<?php echo render('_header') ?>
<h1>Glossary Edit Item <?php echo $term->name ?></h1>
<form action="<?php url('glossary.edit',array($term->slug)); ?>" method="post">
    <?php echo render('glossary/_form', array('term' => $term)) ?>
</form>
<?php echo render('_footer') ?>