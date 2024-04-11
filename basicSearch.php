<?php session_start(); ?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap.min.css">
  <link href="style_home.css" type="text/css" rel="stylesheet">

  <!-- Browser Tab title -->
  <title>UTD Library</title>
</head>

<body>
  <nav class="navbar fixed-top navbar-light" style="background-color: #3EA055;">
    <a class="navbar-brand" href="index.html" ><img src="comet.png" style="height: 40px; width: 200px;" alt="UTD Comet Icon"></a>
    <a href="basicSearch.php">Basic Search</a>
    <a href="adv_search.html">Advanced Search</a>
    <a href="checkouts.php">Checkout History</a>
    <a href="holds.php">Active Holds</a>
    <a href="logout.php">Logout</a>
  </nav>
  <?php include_once 'name.php' ?>
  <div class="container  col-lg-4 col-lg-offset-4" style="padding-top: 50px; text-align: center;">
    <h2><b>Search the Catalog</b></h2><hr><br>
    <div class="container">
      
      <form action="./basicSearch.php" method="get">
        <div class="input-group mb-3 text-center">
          <input type="text" class="form-control" placeholder="Author, Title, Year, etc." name="input" aria-label="input" aria-describedby="input">
        </div>
        <br>
        <button type="submit" class="button btn-success btn-lg btn-block">Search</button>
      </form>
    </div>
  </div>
</body>
</html>