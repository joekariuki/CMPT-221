<!DOCTYPE html>
<html>
  <title>Admin Dashboard</title>
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
  <a href="/limbo-Alpha/admin-1.php" class="w3-left w3-button w3-hover-white">Admin Dashboard</a>
  <a href="/limbo-Alpha/landing.php" class="w3-right w3-button w3-hover-white">Logout</a>
</nav>



<?php

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

// calling the functions from helpers.php according to the id that the user input



if(isset($_POST['id'])) {
          delete_stuff_record($dbc, $_POST['id']);
}


show_admin_normal($dbc);


mysqli_close( $dbc ) ;
?>

 <!--getting user inputs -->
 
 

<div class="w3-cell-row">
  
  <form action="admin-1.php" method="post" class="table-structure w3-cell">
    <p class="w3-padding-16">Item ID number: <input type="int" name="id"/><input type="submit" value="Delete" class="w3-color w3-round delete"/></p>
  </form>

</div>
  



</body>

<?php
# Includes header
require( 'includes/footer.php' );

?>