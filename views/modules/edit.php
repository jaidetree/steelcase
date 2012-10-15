<?php echo render('_header') ?>
<h1>Edit Module <?php echo $module->name ?></h1>
<form action="<?php url('module.edit',array($module->id)); ?>" method="post">
    <?php echo render('modules/_form', array('module' => $module)) ?>
</form>
<?php echo render('_footer') ?>