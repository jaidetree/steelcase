<?php echo render('_header') ?>
<h1>Glossary Add Item</h1>
<form action="<?php url('users.add',array("new")); ?>" method="post">
    <?php echo render('users/_form', array('user' => $user)) ?>
</form>
<?php echo render('_footer') ?>