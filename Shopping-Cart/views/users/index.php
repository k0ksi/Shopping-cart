<h1><?= htmlspecialchars($this->title); ?></h1>

<table border="1px">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach($this->authors as $author) : ?>
        <tr>
            <td><?=$author['id'] ?></td>
            <td><?=htmlspecialchars($author['name']) ?></td>
            <td><a href="/users/delete/<?= $author['id']?>"/>[Delete]</td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/users/create">[Register]</a>
