<?php echo render('_header') ?>
<h1>Edit Trainee <?php echo $trainee->employee_id ?></h1>
<form action="<?php url('trainees.edit',array($trainee->id)); ?>" method="post">
    <?php echo render('trainees/_form', array('trainee' => $trainee)) ?>
</form>
<?php echo render('_footer') ?>