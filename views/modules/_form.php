<?php
/**
 * The preceding underscore (_) in the file name indicates
 * that this file is a partial template. A smaller template 
 * chunck that belongs in something else.
 */
?>
<?php echo render('_status') ?>
<table>
    <tr>
        <td class="label">Name</td>
        <td><input type="text" name="name" value="<?php echo $module->name ?>"/></td>
    </tr>
    <tr>
        <td class="label"></td>
        <td><input type="submit"> <a href="<?php url('modules.index'); ?>">Return</a></td>
    </tr>
</table>
