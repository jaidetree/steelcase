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
        <td class="label">Employee ID</td>
        <td><input type="text" name="employee_id" value="<?php echo $trainee->employee_id ?>"/></td>
    </tr>
    <tr>
        <td class="label">Status</td>
        <td><textarea name="status"><?php echo $trainee->status ?></textarea></td>
    </tr>
    <tr>
        <td class="label"></td>
        <td><input type="submit"> <a href="<?php url('trainees.index'); ?>">Return</a></td>
    </tr>
</table>
