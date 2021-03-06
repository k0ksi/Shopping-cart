<div class="container">
    <h2>Products</h2>
    <table class="table table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->products as $product) : ?>
            <tr>
                <td><?= htmlspecialchars($product[0]) ?></td>
                <td><?= htmlspecialchars($product[1]) ?></td>
                <td><?= htmlspecialchars($product[2]) . ' $' ?></td>
                <td><?= ($product[3])?></td>
                <td>
                    <form id="form-add-cart" name="add-to-cart-form" method="get" action="/cart/add">
                        <a href="/cart/add/<?=$product[4]?> " type="submit" class="btn btn-sm btn-success" name="add-to-cart"><span class="glyphicon"></span>Add to cart</a>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>