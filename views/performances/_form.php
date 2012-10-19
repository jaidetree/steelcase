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
        <td class="label">Trainee</td>
        <td>
            <select name="trainee_id">
                <?php foreach($trainees as $trainee): ?>
                    <option value="<?php echo $trainee->id ?>"<?php is_selected($trainee->id, $performance->trainee->id) ?>><?php echo $trainee->employee_id ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="label">Module</td>
        <td>
            <select name="module_id">
                <?php foreach($modules as $module): ?>
                    <option value="<?php echo $module->id ?>"<?php is_selected($module->id, $performance->module->id) ?>><?php echo $module->name ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="label">Score</td>
        <td><input type="text" name="score" value="<?php echo $performance->score ?>" /></td>
    </tr>
    <tr>
        <td class="label">Duration</td>
        <td><input type="text" name="duration" value="<?php echo $peformance->duration ?>" /></td>
    </tr>
    <tr>
        <td class="label"></td>
        <td><input type="submit"><a href="<?php url('performances.index'); ?>">Return</a></td>
    </tr>
</table>
