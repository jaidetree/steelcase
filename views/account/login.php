<?php echo render('_header') ?>
<h1>Login</h1>
<?php echo render('_status') ?>
<form method="post" action="<?php url('account.login') ?>">
    <fieldset>
        <ul>
            <li>
                <label>Username/Email:</label>
                <input type="text" name="username" value="<?php echo $_POST['username'] ?>">
            </li>
            <li>
                <label>Password:</label>
                <input type="password" name="password">
            </li>
            <li class="action">
                <input type="submit" name="login" value="Login">
            </li>
        </ul>
    </fieldset>
</form>
<?php echo render('_footer') ?>