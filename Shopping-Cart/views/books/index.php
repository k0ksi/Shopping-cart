<h1>Books</h1>
<table border="1px">
    <tr>
        <th>
            Id
        </th>
        <th>
            Title
        </th>
    </tr>
    <?php foreach ($this->books as $book) : ?>
        <tr>
            <td>
                <?php echo $book[0] ?>
            </td>
            <td>
                <?php echo $book[1] ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/books/index/<?= $this->page - 1 < 0 ? 0 : $this->page - 1 ?>/<?= $this->pageSize ?>">Previous</a>
<a href="/books/index/<?= $this->page + 1 > $this->maxPageSize ? $this->maxPageSize : $this->page + 1 ?>/<?= (int)$this->pageSize ?>">Next</a>