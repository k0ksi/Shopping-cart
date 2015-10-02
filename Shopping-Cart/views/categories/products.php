<!--<h1><?/*= htmlspecialchars($this->title) */?></h1>
-->
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
    <?php foreach ($this->products as $product) : ?>
        <tr>
            <td><?= htmlspecialchars($product[0]) ?></td>
            <td><?= htmlspecialchars($product[1]) ?></td>
            <td><?= htmlspecialchars($product[2]) . ' $' ?></td>
        </tr>
    <?php endforeach ?>
</table>