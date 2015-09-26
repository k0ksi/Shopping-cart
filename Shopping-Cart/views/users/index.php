<h1><?= htmlspecialchars($this->title); ?></h1>

<table border="1px">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach($this->users as $user) : ?>
        <tr>
            <td><?=$user['id'] ?></td>
            <td><?=htmlspecialchars($user['name']) ?></td>
            <td><a href="/users/delete/<?= $user['id']?>"/>[Delete]</td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/users/create">[Register]</a>
