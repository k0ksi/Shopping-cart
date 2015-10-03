<?php $_SESSION['xsrf-token'] = uniqid(); ?>

<div id="login-overlay" class="modal-dialog">
    <div class="">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Change product quantity</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-6">
                    <div class="well">
                        <form action="/products/editQuantity" method="post">
                            <div class="form-group">
                                <label for="name" class="control-label">Quantity</label>
                                <input type="text" class="form-control" id="name" name="quantity" value="<?php echo $this->getFieldValue('quantity') ?>" required="" title="Please enter quantity" placeholder="">
                                <?php echo $this->getValidationError('quantity') ?>
                                </br>
                                <label for="name" class="control-label">Product ID</label>
                                <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $this->getFieldValue('product_id') ?>" required="" title="Please enter product id" placeholder="">
                                <?php echo $this->getValidationError('product_id') ?>
                            </div>
                            <input type="hidden" name="xsrf-token" value="<?= $_SESSION['xsrf-token'] ?>"/>
                            <button type="submit" class="btn btn-success btn-block">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>