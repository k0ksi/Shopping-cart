<h1>Create new category</h1>

<div id="login-overlay" class="modal-dialog">
    <div class="">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Create category</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-6">
                    <div class="well">
                        <form method="post" action="/categories/create">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input type="text" class="form-control" id="name" name="category_name" value="<?php echo $this->getFieldValue('category_name') ?>" required="" title="Please enter category name" placeholder="">
                                <?php echo $this->getValidationError('category_name') ?>
                                <br/>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>