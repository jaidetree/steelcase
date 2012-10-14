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
        <td><input type="text" name="name" value="<?php echo $user->username ?>" /></td>
    </tr>
    <tr>
        <td class="label">Email</td>
        <td><input type="text" name="email" value="<?php echo $user->email ?>" /></td>
    </tr>
    <tr>
        <td class="label">Type</td>
        <td>
            <select name="type">
                <?php foreach( User::$type_choices as $i => $label ): ?>
                    <option <?php is_selected(User::$type_choices, $user->type); ?>><?php echo $label ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="label">Status</td>
        <td>
            <select name="type">
                <?php foreach( User::$status_choices as $i => $label ): ?>
                    <option <?php is_selected(User::$status_choices, $user->status); ?>><?php echo $label ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="label"></td>
        <td><input type="submit"><a href="<?php url('users.index'); ?>">Return</a></td>
    </tr>
</table>
