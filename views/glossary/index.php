<?php echo render('_header') ?>
<h1>Glossary Index</h1>
<div class="add-new"><a href="<?php url('glossary.add') ?>">Add new glossary item</a></div>
<?php echo render('_status') ?>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="assetlist">
    <thead>
        <tr>
            <th>Term</th>
            <th>Definition</th>
            <th>User</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($terms as $term): ?>
        <tr>
            <td><?php echo $term->name ?></td>
            <td><?php echo $term->description ?></td>
            <td><?php echo $term->user->username ?></td>
            <td><?php echo $term->created_at->format("F j, Y") ?></td>
            <td><?php echo $term->updated_at->format("F j, Y") ?></td>
            <td class="actions">
                <a class="edit" href="<?php url('glossary.edit', array($term->slug)) ?>"></a>
                <a class="delete" href="<?php url('glossary.delete', array($term->slug)) ?>" class="delete"></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

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
                null, { "bSortable": false }
            ]
    } );    
    
</script>

<?php echo render('_footer') ?>