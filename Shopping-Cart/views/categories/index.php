<div class="container">
    <h2><?= htmlspecialchars($this->title) ?></h2>
    <table class="table table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->categories as $category) : ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= htmlspecialchars($category['name']) ?></td>
                <?php if($this->isAdmin || $this->isEditor) :?>
                <td><a href="/categories/delete/<?=$category['id']?> " class="btn btn-sm btn-danger"><span class="glyphicon"></span>Delete</a></td>
                <?php endif; ?>
                <td><a href="/categories/products/<?=$category['id']?> " class="btn btn-sm btn-primary"><span class="glyphicon"></span>Show products</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php if($this->isAdmin || $this->isEditor) :?>
    <a href="/categories/create" class="btn btn-success">Create new</a>
    <?php endif; ?>
</div>