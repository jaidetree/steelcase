<?php echo render('_header') ?>
<h1>Add Module</h1>
<form action="<?php url('modules.add',array("new")); ?>" method="post">
    <?php echo render('modules/_form', array('module' => $module)) ?>
</form>
<?php echo render('_footer') ?>