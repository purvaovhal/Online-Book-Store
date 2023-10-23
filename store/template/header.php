<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
    <style>
 /* .jumbotron{
    background-image: url("bg12.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
  } */

  /* Example styles for making the line more attractive */
 .jumbotron h1 {
    font-family: "Helvetica Neue", Arial, sans-serif;
    font-weight: bold;
    font-size: 55px;
    color: #333;
    text-align: left;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-top: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
  }
</style>



  </head>

  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a class="navbar-brand" href="index.php" style="font-size: 28px; font-weight: bold; color: #fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">CSE Bookstore</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="books.php" style="color: #fff;"><span class="glyphicon glyphicon-book"></span>&nbsp; Books</a></li>
        <li><a href="contact.php" style="color: #fff;"><span class="glyphicon glyphicon-envelope"></span>&nbsp; Contact</a></li>
        <li><a href="cart.php" style="color: #fff;"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; My Cart</a></li>
      </ul>
    </div>
  </div>
</nav>




    <?php
      if(isset($title) && $title == "Index") {
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>The Book Enclave</h1>
        <p class="lead">This book store is a paradise for readers</p>
        <p>Search and buy books</p>
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">