<?php $_SESSION['xsrf-token'] = uniqid(); ?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">?</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Register</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-6">
                    <div class="well">
                        <form id="loginForm" method="POST" action="/account/register" novalidate="novalidate">
                            <div class="form-group">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                <span class="help-block"></span>
                            </div>
                            <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                            <input type="hidden" name="xsrf-token" value="<?= $_SESSION['xsrf-token'] ?>"/>
                            <button type="submit" class="btn btn-success btn-block">Register</button>
                        </form>
                    </div>
                </div>
                <div class="col-xs-6">
                    <p class="lead">Login now for <span class="text-success">FREE</span></p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-check text-success"></span> Already have an account?</li>
                        <li><span class="fa fa-check text-success"></span> No need for another?</li>
                        <li><span class="fa fa-check text-success"></span> Don't hesitate</li>
                        <li><a href="/account/login/"><u>Just login with the old one</u></a></li>
                    </ul>
                    <p><a href="/account/login" class="btn btn-info btn-block">Login with existing account</a></p>
                </div>
            </div>
        </div>
    </div>
</div>