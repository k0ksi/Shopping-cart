<?php /*$this->redirect('cart/index'); */?><!--

<div class="container">
    <h2>Your cart</h2>
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
        <?php /*$price = 0; foreach ($this->products as $product) : */?>
            <?php /*$price += (int)$product[2]; */?>
            <tr>
                <td><?/*= htmlspecialchars($product[0]) */?></td>
                <td><?/*= htmlspecialchars($product[1]) */?></td>
                <td><?/*= htmlspecialchars($product[2]) . ' $' */?></td>
                <td><?/*= htmlspecialchars($product[3])*/?></td>
            </tr>
        <?php /*endforeach */?>
        </tbody>
    </table>
    <?php /*echo $price; */?>
</div>
-->