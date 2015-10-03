<div class="container">
    <h2>My products</h2>
    <table class="table table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
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
                <td>
                    <?php echo $product[3]?>
                </td>
                <?php if($this->isAdmin || $this->isEditor) :?>
                    <td><a href="/products/delete/<?=$product[0]?> " class="btn btn-sm btn-danger"><span class="glyphicon"></span>Delete</a></td>
                <?php endif; ?>
                <td>
                    <form id="form-add-cart" name="add-to-cart-form" method="post" action="/cart/add">
                        <a href="/cart/add/<?=$product[0]?> " class="btn btn-sm btn-success" name="add-to-cart"><span class="glyphicon"></span>Add to cart</a>
                    </form>
                </td>
                <?php if($this->isAdmin || $this->isEditor) :?>
                    <td><a href="/products/editCategory/<?=$product[0]?> " class="btn btn-sm btn-warning"><span class="glyphicon"></span>Edit category</a></td>
                    <td><a href="/products/editQuantity/<?=$product[0]?> " class="btn btn-sm btn-info"><span class="glyphicon"></span>Edit quantity</a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php if($this->isAdmin || $this->isEditor) :?>
        <a href="/products/create" class="btn btn-success button-paging">Create new</a>
    <?php endif; ?>
    <a href="/account/profile/<?= $this->page - 1 < 0 ? 0 : $this->page - 1 ?>/<?= $this->pageSize ?>" class="btn btn-primary button-paging">Previous</a>
    <a href="/account/profile/<?= $this->page + 1 > $this->maxPageSize ? $this->maxPageSize : $this->page + 1 ?>/<?= (int)$this->pageSize ?>" class="btn btn-primary button-paging">Next</a>
</div>