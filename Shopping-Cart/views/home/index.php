<h1 class="home-header">We're very glad to have you hear!</h1>
<h2 class="home-header">Enjoy your stay!</h2>
<?php if(!$this->isLoggedIn) :?>
    <div id="login-overlay" class="modal-dialog">
        <div class="">
            <div class="modal-header">
                <a href="/account/login" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                <a href="/account/register" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-registration-mark"></span> Register</a>
            </div>
        </div>
    </div>
<?php endif; ?>