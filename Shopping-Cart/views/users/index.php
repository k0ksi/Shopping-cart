
Hello, I am the Users index view.

<table border="1px">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach($this->users as $user) : ?>
        <tr>
            <td><?=htmlspecialchars($user['id']) ?></td>
            <td><?=htmlspecialchars($user['name']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

