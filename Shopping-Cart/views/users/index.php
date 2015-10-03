<div class="container">
    <h2><?= htmlspecialchars($this->title) ?></h2>
    <table class="table table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->users as $user) : ?>
            <tr>
                <td>
                    <?php echo $user[0] ?>
                </td>
                <td>
                    <?php echo $user[1] ?>
                </td>
                <?php if($this->isAdmin) :?>
                    <td><a href="/users/delete/<?=$user[0]?> " class="btn btn-sm btn-danger"><span class="glyphicon"></span>Remove user</a></td>
                    <td><a href="/users/edit/<?=$user[0]?> " class="btn btn-sm btn-warning"><span class="glyphicon"></span>Edit rights</a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <a href="/users/index/<?= $this->page - 1 < 0 ? 0 : $this->page - 1 ?>/<?= $this->pageSize ?>" class="btn btn-primary button-paging">Previous</a>
    <a href="/users/index/<?= $this->page + 1 > $this->maxPageSize ? $this->maxPageSize : $this->page + 1 ?>/<?= (int)$this->pageSize ?>" class="btn btn-primary button-paging">Next</a>
</div>