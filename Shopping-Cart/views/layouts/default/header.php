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
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/makeusabrew/bootbox/f3a04a57877cab071738de558581fbc91812dce9/bootbox.js"></script>-->
<!--    <header>
        <a href="/"><img src="/content/images/site-logo.png"></a>

        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/categories">Categories</a></li>
            <?php /*if($this->isLoggedIn) : */?>
                <li><a href="/products">Products</a></li>
            <?php /*endif; */?>
        </ul>
        <?php /*if($this->isLoggedIn) : */?>
        <div id='logged-in-info'>
            <span>Hello, <?php /*echo $_SESSION['username']; */?></span>
            <form action="/account/logout">
                <input type="submit" value="Logout"/>
            </form>
        </div>
        <?php /*endif; */?>
    </header>-->


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
            </ul>
                <?php if($this->isLoggedIn) : ?>
                    <div id='logged-in-info'>
                        <div id="logged-in-info-span">Hello, <?php echo $_SESSION['username']; ?></div>
                        <form action="/account/logout">
                            <button type="submit" class="btn btn-default">Logout</button>
                        </form>
                    </div>
                <?php endif; ?>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

<?php include('messages.php'); ?>