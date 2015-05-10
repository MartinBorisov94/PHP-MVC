<!DOCTYPE html>
<html>
<head>
    <title>Home </title>
     <link rel="stylesheet" href="https://bootswatch.com/cyborg/bootstrap.min.css"/>
    <meta charset="UTF-8">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
    <div class="container-fluid">
        <div class="nav navbar-header">
            <button data-target="#bs-example-navbar-collapse-2" data-toggle="collapse" class="navbar-toggle collapsed" type="button" aria-expanded="false">
                <span class="sr-only"><a href="/demos">Home</a></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <li><a class="navbar-brand" href="/demos">Home</a></li>

        </div>


        <div id="bs-example-navbar-collapse-2" class="navbar-collapse collapse " aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav navbar-right">
                <?php if($this->isLoggedIn) : ?>
                    <li><a href="/demos/questions/create">Add Question</a></li>
                    <li><a href="/demos/account/user">Username: <?php echo(htmlentities($_SESSION['username'])); ?> </a> </li>
                    <li><a href="/demos/account/logout">Logout</a></li>
                <?php endif; ?>
                <?php if(!$this->isLoggedIn) : ?>
                    <li><a href="/demos/account/login">Login</a></li>
                    <li><a href="/demos/account/register">Sing Up</a></li>
                <?php endif; ?>

            </ul>


        </div>
    </div>
</nav>

<main class="container">
        <?php include_once('messages.php');




