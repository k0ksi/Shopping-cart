<h1>Products</h1>
<table border="1px">
    <tr>
        <th>
            Id
        </th>
        <th>
            Title
        </th>
    </tr>
    <?php foreach ($this->products as $product) : ?>
        <tr>
            <td>
                <?php echo $product[0] ?>
            </td>
            <td>
                <?php echo $product[1] ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/products/index/<?= $this->page - 1 < 0 ? 0 : $this->page - 1 ?>/<?= $this->pageSize ?>">Previous</a>
<a href="/products/index/<?= $this->page + 1 > $this->maxPageSize ? $this->maxPageSize : $this->page + 1 ?>/<?= (int)$this->pageSize ?>">Next</a>