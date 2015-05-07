<!DOCTYPE html>
<html>
<head>
    <title>Home </title>
     <link rel="stylesheet" href="https://bootswatch.com/cyborg/bootstrap.min.css"/>
<!--    <link rel="stylesheet" href="http://bootswatch.com/paper/bootstrap.css"/>
-->    <meta charset="UTF-8">
</head>
<body>
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/demos/">
                <img class="col-md-10" src="content/images/site-logo.png"">
            </a>
        </div>
        <div id="navbar-main" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php foreach($this->categories as $category): ?>
                        <li><a href="<?php echo("/demos/questions/categoryId/" .$category['Id'])?>">
                                <?php echo($category["Catagory"]); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/demos">Home</a></li>
                <?php if($this->isLoggedIn) : ?>
                    <li><a href="/demos/questions/create">Add Question</a></li>
                    <li><a>Username: <?php echo($_SESSION['username']); ?> </a> </li>
                    <li><a href="/demos/account/logout">Logout</a></li>
                <?php endif; ?>
                <?php if(!$this->isLoggedIn) : ?>
                    <li><a href="/demos/account/login">Login</a></li>
                    <li><a href="/demos/account/register">Sing Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<main class="container">
    <?php include_once('messages.php'); ?>
