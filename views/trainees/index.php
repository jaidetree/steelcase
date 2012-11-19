<?php echo render('_header') ?>
<h1>Trainee Index</h1>
<div class="add-new"><a href="<?php url('trainees.add') ?>">Add new trainee</a></div>
<?php echo render('_status') ?>

<div class="page">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="assetlist">
        <thead>
            <tr>
                <th>Trainee ID</th>
                <th>Created At</th>
                <th width="70">Performance</th>
                <th>Last Login At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($trainees as $trainee): ?>
            <tr>
                <td><?php echo $trainee->employee_id ?></td>
                <td><?php echo $trainee->created_at->format("F j, Y") ?></td>
                <td>
                    <a href="<?php url('performances.by_trainee', array($trainee->id)) ?>">
                        <?php echo count($trainee->performances) ?> Records
                    </a>
                </td>
                <td><?php echo $trainee->last_visited_at() ?></td>
                <td><?php echo $trainee->status ?></td>
                <td class="actions">
                    <a class="edit" href="<?php url('trainees.edit', array($trainee->id)) ?>"></a>
                    <a class="delete" href="<?php url('trainees.delete', array($trainee->id)) ?>" class="delete"></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div align="right"> <img width="50%" src="../../static/images/images/user.png">
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
                { "bSortable": false }
            ]
    } );    
    
</script>

<?php echo render('_footer') ?>