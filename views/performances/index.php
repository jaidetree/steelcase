<?php echo render('_header') ?>
<h1>Performances Index <?php echo $context ?></h1>
<?php echo render('_status') ?>

<br/>
<div class="page">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="assetlist">
        <thead>
            <tr>
                <th>Trainee</th>
                <th>Module</th>
                <th width="70">Performance Objects</th>
                <th>Score</th>
                <th>Duration</th>
                <th>Time Started</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($performances as $performance): ?>

            <tr>
                <td><?php echo $performance->trainee->employee_id ?></td>
                <td><?php echo $performance->module->name ?></td>
                <td>
                    <a href="<?php url('performanceobjects.by_performance', array($performance->id)) ?>">
                        <?php echo count($performance->performance_objects) ?> Records
                    </a>
                </td>
                <td><?php echo $performance->score ?></td>
                <td><?php echo $performance->duration ?></td>
                <td><?php echo $performance->created_at->format("F j, Y h:i a") ?></td>
                <td class="actions">
                    <a class="delete" href="<?php url('performances.delete', array($performance->id)) ?>"></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script type="text/javascript" charset="utf-8">

    /* Define two custom functions (asc and desc) for string sorting */
    jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    
    jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
        return ((x < y) ?  1 : ((x > y) ? -1 : 0));
    };

    /* Build the DataTable with third column using our custom sort functions */
    jQuery('#assetlist').dataTable( {
        "sPaginationType": "full_numbers",
        "aaSorting": [ [0,'asc'] ],
        "aoColumnDefs": [
                { "sType": 'string-case', "aTargets": [ 2 ] }
            ],
        "aoColumns": [
                null, null,
                null, null,
                null, null, { "bSortable": false }
            ],
        "fnDrawCallback": function( oSettings ) {
            $('table a.delete').unbind("click")
            $('table a.delete').click(delete_item);
          }
    } );    
    
</script>

<?php echo render('_footer') ?>