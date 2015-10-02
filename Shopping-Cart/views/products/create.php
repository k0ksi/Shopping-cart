<div id="login-overlay" class="modal-dialog">
    <div class="">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Create product</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-6">
                    <div class="well">
                        <form method="post" action="/products/create">
                            <div class="form-group">
                                <label for="product_name" class="control-label">Name</label>
                                <input type="text" class="form-control" id="name" name="product_name" value="<?php echo $this->getFieldValue('product_name') ?>" required="" title="Please enter product name" placeholder="">
                                <?php echo $this->getValidationError('product_name') ?>
                                <label for="name" class="control-label">Description</label>
                                <input type="text" class="form-control" id="name" name="description" value="<?php echo $this->getFieldValue('description') ?>" required="" title="Please enter description name" placeholder="">
                                <?php echo $this->getValidationError('description') ?>
                                <label for="name" class="control-label">Price</label>
                                <input type="text" class="form-control" id="name" name="price" value="<?php echo $this->getFieldValue('price') ?>" required="" title="Please enter price name" placeholder="">
                                <?php echo $this->getValidationError('price') ?>
                                <label for="name" class="control-label">Quantity</label>
                                <input type="text" class="form-control" id="name" name="quantity" value="<?php echo $this->getFieldValue('quantity') ?>" required="" title="Please enter quantity name" placeholder="">
                                <?php echo $this->getValidationError('quantity') ?>
                                <label for="name" class="control-label">Category</label>
                                <input type="text" class="form-control" id="name" name="category" value="<?php echo $this->getFieldValue('category') ?>" required="" title="Please enter category name" placeholder="">
                                <?php echo $this->getValidationError('category') ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>