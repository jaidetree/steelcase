<?php echo render('_header') ?>
<h1>Glossary Add Item</h1>
<form action="<?php url('glossary.add',array("new")); ?>" method="post">
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
            <td><input type="submit"></td>
        </tr>
    </table>
</form>
<?php echo render('_footer') ?>