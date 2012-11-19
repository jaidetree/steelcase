<?php echo render('_header') ?>
<h1>Login</h1>
<?php echo render('_status') ?>

<style>

    .login.content {
        width: 500px;
        float: none;
        margin-right: auto;
        margin-left: auto;
        margin-top: 140px;
        background-color: white;
    }

</style>

<form method="post" action="<?php url('account.login') ?>">
    <fieldset>
        <ul>
            <li>
                <label>Admin User:</label>
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