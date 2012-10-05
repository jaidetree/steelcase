<?php echo render('_header') ?>
<h1>Glossary Edit Item <?php echo $term->name ?></h1>
<form action="<?php url('glossary.edit',array($term->slug)); ?>" method="post">
    <table>
        <tr>
            <td class="label">Term</td>
            <td><input name="name" value="<?php echo $term->name ?>"/></td>
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