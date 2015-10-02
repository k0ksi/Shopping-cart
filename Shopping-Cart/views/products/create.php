<h1>Create New Product</h1>

<form method="post" action="/products/create">
    Name: <input type="text" name="product_name" value="<?php echo $this->getFieldValue('product_name') ?>">
    <?php echo $this->getValidationError('product_name') ?>
    <br/>
    Description: <input type="text" name="description" value="<?php echo $this->getFieldValue('description') ?>">
    <?php echo $this->getValidationError('description') ?>
    <br/>
    Price: <input type="text" name="price" value="<?php echo $this->getFieldValue('price') ?>">
    <?php echo $this->getValidationError('price') ?>
    <br/>
    Quantity: <input type="text" name="quantity" value="<?php echo $this->getFieldValue('quantity') ?>">
    <?php echo $this->getValidationError('quantity') ?>
    <br/>
    Category: <input type="text" name="category" value="<?php echo $this->getFieldValue('category') ?>">
    <?php echo $this->getValidationError('category') ?>
    <br/>
    <input type="submit" value="Create">
</form>