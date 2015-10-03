<?php $_SESSION['xsrf-token'] = uniqid(); ?>

<div id="login-overlay" class="modal-dialog">
    <div class="">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Change user roles</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-6">
                    <div class="well">
                        <form action="/users/edit" method="post">
                            <div class="form-group">
                                <label for="name" class="control-label">User roles</label>
                                <input type="text" class="form-control" id="name" name="user_roles" value="<?php echo $this->getFieldValue('user_roles') ?>" required="" title="Please enter user roles separated by space" placeholder="">
                                <?php echo $this->getValidationError('user_roles') ?>
                                </br>
                                <label for="name" class="control-label">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $this->getFieldValue('user_id') ?>" required="" title="Please enter user id" placeholder="">
                                <?php echo $this->getValidationError('user_id') ?>
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