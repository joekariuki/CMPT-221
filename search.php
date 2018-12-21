<!--This page displays the search results-->

<?php

require( 'includes/header.php' ) ;

require( 'includes/connect_db.php' ) ;

require( 'includes/helpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
  	$searchword =  $_POST['searchword'];
  	
  	search($dbc, $searchword);
  	
}

mysqli_close( $dbc ) ;
?>

