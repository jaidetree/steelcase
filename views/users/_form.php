<?php
/**
 * The preceding underscore (_) in the file name indicates.
 * That this file is a partial template. A smaller template chunck
 * that belongs in something else.
 */
?>
<?php echo render('_status') ?>
<table>
    <tr>
        <td class="label">Name</td>
        <td><input type="text" name="username" value="<?php echo $user->username ?>" /></td>
    </tr>
    <tr>
        <td class="label">Email</td>
        <td><input type="text" name="email" value="<?php echo $user->email ?>" /></td>
    </tr>
    <?php if( ! $user->id ): ?>
        <tr>
            <td class="label">Password</td>
            <td><input type="password" name="password" value="<?php echo $_POST['password'] ?>" /></td>
        </tr>
        <tr>
            <td class="label">Confirm</td>
            <td><input type="password" name="confirm" value="<?php echo $_POST['confirm'] ?>" /></td>
        </tr>
    <?php endif; ?>
    <?php if( Auth::user('type') <= 1 ): ?>
        <tr>
            <td class="label">Type</td>
            <td>
                <select name="type">
                    <?php foreach( User::$type_choices as $i => $label ): ?>
                        <?php if($i == 0 && ! Auth::user('type') == 0 ): continue; endif ?>
                        <option value="<?php echo $i ?>" <?php is_selected($i, $user->type); ?>><?php echo $label ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td class="label">Status</td>
        <td>
            <select name="status">
                <?php foreach( User::$status_choices as $i => $label ): ?>
                    <option value="<?php echo $i ?>" <?php is_selected($i, $user->status); ?>><?php echo $label ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="label"></td>
        <td><input type="submit"><a href="<?php url('users.index'); ?>">Return</a></td>
    </tr>
</table>
