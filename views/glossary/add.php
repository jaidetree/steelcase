<?php echo render('_header') ?>
<h1>Glossary Add Item</h1>
<form action="<?php url('glossary.add',array("new")); ?>" method="post">
    <?php echo render('glossary/_form', array('term' => $term)) ?>
</form>
<?php echo render('_footer') ?>