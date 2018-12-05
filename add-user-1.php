<!--This page allows for adding superadmin-->
<!--Takes superadmin input about information on a new superadmin, passes those input into variables, passes those variables into a fucntion-->
<!--that makes SQL query to the database to insert a new superadmin into the admins table.-->

<!DOCTYPE html>
<html>
    <title>Add User</title>
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
  <a href="/limbo-Alpha/admin.php" class="w3-left w3-button w3-hover-white">Master Admin Dashboard</a>
  <a href="/limbo-Alpha/landing.php" class="w3-right w3-button w3-hover-white">Logout</a>
</nav>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

// calling the function insert_admin_user to insert a new row

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
  	$firstname = $_POST['firstName'] ;
    $lastname = $_POST['lastName'] ;
  	$email = $_POST['email'];
  	$reg_time = $_POST['reg_time'];
  	$pass = $_POST['pass'];
  	$hashpass = hash('ripemd160', $pass); //encrypt the password
    insert_superadmin_user($dbc, $firstname, $lastname, $email, $reg_time, $hashpass);
    echo '<p class="reported-text">New master admin user has been added!</p>';
}



mysqli_close( $dbc ) ;
?>
<!--Get inputs from the user. -->
<h1 class="page-heading">Add New Master Admin User</h1>
<form action="add-user-1.php" method="POST">
  <table class="table-structure">
    <tr>
      <td>First Name: <input type="text" name="firstName" value="<?php if
      (isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
    </tr>
    <tr>
      <td>Last Name: <input type="text" name="lastName" value="<?php if
      (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
    </tr>
    <tr>
      <td>Email: <input type="text" name="email" value="<?php if
      (isset($_POST['email'])) echo $_POST['email']; ?>"></td>
    </tr>
     <tr>
      <td>Date/Time: <input type="text" name="reg_time" value="<?php if
      (isset($_POST['reg_time'])) echo $_POST['reg_time']; ?>" placeholder="YYYY-MM-DD HH:MM:SS"></td>
    </tr>
    <tr>
    <tr>
      <td>Password: <input type="password" name="pass" value="<?php if
      (isset($_POST['pass'])) echo $_POST['pass']; ?>"></td>
    </tr>   
   
  </table>
  <p class="w3-center"><input type="submit" classs="submit-btn" value ="Add User"></p>
</form>

</body>

<?php
# Includes header
require( 'includes/footer.php' );

?>

