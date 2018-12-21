<!--This page is the user admin page which has the listing of all items-->
<!--From here an user admin can choose to delete or edit an item-->

<!DOCTYPE html>
<html>
  <title>Admin Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css" >
  <body>

<nav class="w3-bar w3-color">
  <a href="/limbo-Alpha/index.php" class="w3-left w3-button w3-hover-white">Limbo</a>
  <a href="/limbo-Alpha/lost.php" class="w3-left w3-button w3-hover-white">Lost Items</a>
  <a href="/limbo-Alpha/found.php" class="w3-left w3-button w3-hover-white">Found Items</a>
  <a href="/limbo-Alpha/ql.php" class="w3-left w3-button w3-hover-white">Quick Links</a>
  <a href="/limbo-Alpha/admin-1.php" class="w3-left w3-button w3-hover-white">Admin Dashboard</a>
  <a href="/limbo-Alpha/index.php" class="w3-right w3-button w3-hover-white">Logout</a>
</nav>



<?php

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

// calling the functions from helpers.php according to the id that the user input


// If the admin user press delete, a POST request with the id of the item to be deleted is generated 
// and passed into a function that makes a query to remove that item from the stuff table
if(isset($_POST['id'])) {
          delete_stuff_record($dbc, $_POST['id']);
}

//Display the stuff table
show_admin_normal($dbc);


mysqli_close( $dbc ) ;
?>

<!--Helped info for how to delete an item-->

<div class="w3-container w3-center">
  <p class="helper-text"><i class="fas fa-exclamation-circle" style="padding-right: 10px;"></i>You can delete an item by to its ID number</p>
</div>

<!--Get admin user input to delete an item-->
<div class="w3-cell-row">
  <form action="admin-1.php" method="post" class="table-structure w3-cell">
    <p class="w3-padding-16">Item ID number: <input class="admin-input" type="int" name="id"/><input type="submit" value="Delete" class="report-btn"/></p>
  </form>
</div>
  



</body>

<?php
# Includes header
require( 'includes/footer.php' );

?>