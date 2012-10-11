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
        <td class="label">Term</td>
        <td><input type="text" name="name" value="<?php echo $term->name ?>"/></td>
    </tr>
    <tr>
        <td class="label">Definition</td>
        <td><textarea name="description"><?php echo $term->description ?></textarea></td>
    </tr>
    <tr>
        <td class="label"></td>
        <td><input type="submit"> <a href="<?php url('glossary.index'); ?>">Return</a></td>
    </tr>
</table>
