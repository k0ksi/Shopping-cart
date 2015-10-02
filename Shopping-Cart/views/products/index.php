<div class="container">
    <h2><?= htmlspecialchars($this->title) ?></h2>
    <table class="table table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->products as $product) : ?>
            <tr>
                <td>
                    <?php echo $product[0] ?>
                </td>
                <td>
                    <?php echo $product[1] ?>
                </td>
                <td>
                    <?php echo $product[2] . ' $' ?>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <a href="/products/create" class="btn btn-success button-paging">Create new</a>
    <a href="/products/index/<?= $this->page - 1 < 0 ? 0 : $this->page - 1 ?>/<?= $this->pageSize ?>" class="btn btn-primary button-paging">Previous</a>
    <a href="/products/index/<?= $this->page + 1 > $this->maxPageSize ? $this->maxPageSize : $this->page + 1 ?>/<?= (int)$this->pageSize ?>" class="btn btn-primary button-paging">Next</a>
</div>