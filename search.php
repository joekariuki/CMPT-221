<!--This page displays the search results-->

<!DOCTYPE html>
<html>
  <title>Search</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" type="text/css" href="css/style.css" >
  <body>


<nav class="w3-bar w3-color">
  <a href="/limbo-Alpha/landing.php" class="w3-left w3-button w3-hover-white">Limbo</a>
  <a href="/limbo-Alpha/lost.php" class="w3-left w3-button w3-hover-white">Lost Items</a>
  <a href="/limbo-Alpha/found.php" class="w3-left w3-button w3-hover-white">Found Items</a>
  <a href="/limbo-Alpha/ql.php" class="w3-left w3-button w3-hover-white">Quick Links</a>
  <a href="/limbo-Alpha/login.php" class="w3-right w3-button w3-hover-white">Login</a>
</nav>

<?php

require( 'includes/connect_db.php' ) ;

require( 'includes/helpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
  	$searchword =  $_POST['searchword'];
  	
  	search($dbc, $searchword);
  	
}

mysqli_close( $dbc ) ;
?>

