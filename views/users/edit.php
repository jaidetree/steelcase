<?php echo render('_header') ?>
<h1>User Edit <?php echo $term->name ?></h1>
<form action="<?php url('users.edit',array($user->id)); ?>" method="post">
    <?php echo render('users/_form', array('user' => $user)) ?>
</form>
<?php echo render('_footer') ?>