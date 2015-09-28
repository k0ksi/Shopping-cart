<h1>Create New Category</h1>

<form method="post" action="/categories/create">
    Name: <input type="text" name="category_name" value="<?php echo $this->getFieldValue('category_name') ?>">
    <?php echo $this->getValidationError('category_name') ?>
    <br/>
    <input type="submit" value="Create">
</form>