<?php echo render('_header') ?>
<h1>Performances Index</h1>
<div class="add-new"><a href="<?php url('performances.edit') ?>">Edit Performance</a> <a href="<?php url('performances.index') ?>">Performances Index</a></div>
<?php echo render('_status') ?>

<table cellpadding="0" cellspacing="0" border="0" class="display">
    <tbody>
        <tr>
            <td>Trainee</td>
            <td><?php echo $performance->trainee ?></td>
        </tr>
        <tr>
            <td>Module</td>
            <td><?php echo $performance->module->name ?></td>
        </tr>
        <tr>
            <td>Score</td>
            <td><?php echo $performance->score ?></td>
        </tr>
        <tr>
            <td>Duration</td>
            <td><?php echo $performance->duration ?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><?php echo $performance->created_at->format("F j, Y h:i a") ?></td>
        </tr>
    </tbody>
</table>

<?php echo render('_footer') ?>