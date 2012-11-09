<?php echo render('_header') ?>
<h1>Performances Index</h1>
<?php echo render('_status') ?>

<br/>
<div class="page">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="assetlist">
        <thead>
            <tr>
                <th>Trainee</th>
                <th>Module</th>
                <th>Score</th>
                <th>Duration</th>
                <th>Time Started</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($performances as $performance): ?>

            <tr>
                <td><?php echo $performance->trainee->employee_id ?></td>
                <td><?php echo $performance->module->name ?></td>
                <td><?php echo $performance->score ?></td>
                <td><?php echo $performance->duration ?></td>
                <td><?php echo $performance->created_at->format("F j, Y h:i a") ?></td>
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
                null, null, { "bSortable": false }
            ]
    } );    
    
</script>

<?php echo render('_footer') ?>