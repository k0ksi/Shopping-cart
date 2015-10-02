<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->categories as $category) : ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= htmlspecialchars($category['name']) ?></td>
            <td><a href="/categories/delete/<?=$category['id']?> ">[Delete]</a></td>
            <td><a href="/categories/products/<?=$category['id']?> ">[Show Products]</a></td>
        </tr>
    <?php endforeach ?>
</table>

<a href="/categories/create">[New]</a>
