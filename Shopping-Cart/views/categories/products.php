<!--<h1><?/*= htmlspecialchars($this->title) */?></h1>
-->
<div class="container">
    <h2>Products</h2>
    <table class="table table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->products as $product) : ?>
            <tr>
                <td><?= htmlspecialchars($product[0]) ?></td>
                <td><?= htmlspecialchars($product[1]) ?></td>
                <td><?= htmlspecialchars($product[2]) . ' $' ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<!--

<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
    <?php /*foreach ($this->products as $product) : */?>
        <tr>
            <td><?/*= htmlspecialchars($product[0]) */?></td>
            <td><?/*= htmlspecialchars($product[1]) */?></td>
            <td><?/*= htmlspecialchars($product[2]) . ' $' */?></td>
        </tr>
    <?php /*endforeach */?>
</table>-->