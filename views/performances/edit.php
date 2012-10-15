<?php echo render('_header') ?>
<h1>Performance Edit <?php echo $performance->id ?></h1>
<form action="<?php url('performances.edit',array($performance->id)); ?>" method="post">
    <?php echo render('performances/_form', array('performance' => $performance, 'trainees' => $trainees, 'modules' => $modules)) ?>
</form>
<?php echo render('_footer') ?>