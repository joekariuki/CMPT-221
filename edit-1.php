<!--This is the page that the superadmin use to edit an admin user -->
<!--It takes the inputs and puts them into POST requests which then trigger a query that modify the users table-->

<!DOCTYPE html>
<html>
    <title>Update User</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" type="text/css" href="css/style.css" >
  <body>


<nav class="w3-bar w3-color">
  <a href="/limbo-Alpha/index.php" class="w3-left w3-button w3-hover-white">Limbo</a>
  <a href="/limbo-Alpha/lost.php" class="w3-left w3-button w3-hover-white">Lost Items</a>
  <a href="/limbo-Alpha/found.php" class="w3-left w3-button w3-hover-white">Found Items</a>
  <a href="/limbo-Alpha/ql.php" class="w3-left w3-button w3-hover-white">Quick Links</a>
  <a href="/limbo-Alpha/index.php" class="w3-right w3-button w3-hover-white">Logout</a>
</nav>
    
<?php

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

// series of if statements for updating the table row according to id

if( isset($_POST['newName']) ) {

    $id = $_GET['user_id'];
    $newName = $_POST['newName'];
    $query = "UPDATE users SET first_name='$newName' WHERE user_id='$id'";
	show_query($query);
	
	$results = mysqli_query( $dbc , $query) ;

}

if( isset($_POST['newLast']) ) {

    $id = $_GET['user_id'];
    $newLast = $_POST['newLast'];
    $query2 = "UPDATE users SET last_name='$newLast' WHERE user_id='$id'" ;
	show_query($query2);
	
	$results = mysqli_query( $dbc , $query2 ) ;

}

if( isset($_POST['newEmail']) ) {

    $id = $_GET['user_id'];
    $newEmail = $_POST['newEmail'];
    $query3 = "UPDATE users SET email='$newEmail' WHERE user_id='$id'" ;
	show_query($query3);
	
	$results = mysqli_query( $dbc , $query3 ) ;

}

if( isset($_POST['newPass']) ) {

    $id = $_GET['user_id'];
    $newPass = hash('ripemd160',($_POST['newPass'])); //encrypt the password
    $query4 = "UPDATE users SET pass='$newPass' WHERE user_id='$id'" ;
	show_query($query4);
	
	$results = mysqli_query( $dbc , $query4 ) ;

}

if(isset($_GET['user_id'])) {
    
          show_user_record($dbc, $_GET['user_id']);
}


# Close the connection
mysqli_close( $dbc ) ;

?>

<!--getting user inputs-->

<form action="" method="POST">
    <table class="table-structure">
        <tr>
          <td>First Name:<input type="text" name="newName" required/><span class="required">*</span></td>
        </tr>
        <tr>
          <td>Last Name: <input type="text" name="newLast" required/><span class="required">*</span> </td>
        </tr>
        <tr>
          <td>Email: <input type="email" name="newEmail" placeholder="a@bcd.com" required/><span class="required">*</span> </td>
        </tr>
        <tr>
          <td>Password: <input type="password" name="newPass" required/><span class="required">*</span></td>
        </tr>
    </table>
    <p class="w3-center w3-container"><input type="submit"  class="update-btn" value ="Update Admin"></p>
</form>

<?php
# Includes header
require( 'includes/footer.php' );

?>