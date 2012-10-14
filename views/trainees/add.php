<?php echo render('_header') ?>
<h1>Add Trainee</h1>
<form action="<?php url('trainees.add',array("new")); ?>" method="post">
    <?php echo render('trainees/_form', array('trainee' => $term)) ?>
</form>
<?php echo render('_footer') ?>