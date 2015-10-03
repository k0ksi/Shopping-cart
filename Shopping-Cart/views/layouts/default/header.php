<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/styles.css" />
    <link rel="stylesheet" href="/content/bootstrap.min.css" />
    <title>
        <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
    </title>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img src="/content/images/site-logo.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/categories">Categories</a></li>
                <?php if($this->isLoggedIn) : ?>
                    <li><a href="/products">Products</a></li>
                <?php endif; ?>
                <?php if($this->isAdmin) : ?>
                    <li><a href="/users">Users</a></li>
                <?php endif; ?>
                <?php if($this->isAdmin || $this->isEditor) : ?>
                    <li><a href="/account/profile">Profile</a></li>
                <?php endif; ?>
            </ul>
                <?php if($this->isLoggedIn) : ?>
                    <div id='logged-in-info'>
                        <div id="logged-in-info-span">Hello, <?php echo $_SESSION['username']; ?></div>
                        <form action="/account/logout">
                            <button type="submit" class="btn btn-default">Logout</button>
                        </form>
                    </div>
                <?php endif; ?>
        </div>
    </div>
</nav>

<?php include('messages.php'); ?>