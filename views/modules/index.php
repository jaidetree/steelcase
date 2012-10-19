<?php echo render('_header') ?>
<h1>Modules Index</h1>
<div class="add-new"><a href="<?php url('modules.add') ?>">Add Module</a></div>
<?php echo render('_status') ?>

<div class="page">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="assetlist">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($modules as $module): ?>
            <tr>
                <td><?php echo $module->id ?></td>
                <td><?php echo $module->name ?></td>
                <td class="actions">
                    <a class="edit" href="<?php url('modules.edit', array($module->id)) ?>"></a>
                    <a class="delete" href="<?php url('modules.delete', array($module->id)) ?>"></a>
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
                null, 
                null, 
                { "bSortable": false }
            ]
    } );    
    
</script>

<?php echo render('_footer') ?>