<?php echo render('_header') ?>
<h1>Glossary Index</h1>
<table>
    <tr>
        <th>Term</th>
        <th>Slug</th>
        <th>Definition</th>
        <th>User</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php foreach($terms as $term): ?>
    <tr>
        <td><?php echo $term->name ?></td>
        <td><?php echo $term->slug ?></td>
        <td><?php echo $term->description ?></td>
        <td><?php echo $term->user_id ?></td>
        <td><?php echo $term->created_at->format("F j, Y") ?></td>
        <td><?php echo $term->updated_at->format("F j, Y") ?></td>
        <td><a href="<?php url('glossary.edit', array($term->slug)) ?>">Edit</a></td>
        <td><a href="<?php url('glossary.delete', array($term->slug)) ?>">&times;</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php echo render('_footer') ?>