<!DOCTYPE html>
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
  <link rel="icon" type="image/png" href="favicon.png">
</head>

<body>
  <?php session_start(); ?>
  <?php include_once 'name.php' ?>
  <nav class="navbar fixed-top navbar-light" style="background-color: #3EA055;">
    <a class="navbar-brand" href="index.html" ><img src="comet.png" style="height: 40px; width: 200px;" alt="UTD Comet Icon"></a>
    <a href="basicSearch.php">Basic Search</a>
    <a href="adv_search.php">Advanced Search</a>
    <a href="checkouts.php">Checkout History</a>
    <a href="holds.php">Active Holds</a>
    <a href="logout.php">Logout</a>
  </nav>
  <div class='container'>
  <h2>Active Holds</h2>
  <ul>
    <?php include_once("holds_query.php") ?>
  </ul>
  </div>
</body>
</html>
