<!DOCTYPE html>
<html>
  <title>Limbo</title>
<?php
# Includes header
require( 'includes/header.php' ) ;

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Connect to MySQL server and the database
require( 'includes/login_tools.php' ) ;

// if statement to validate the email and password which is being referenced from the user table 

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

	$email = $_POST['email'] ;
  $pass = $_POST['pass'] ;
  
    $pid = validate($email, $pass);
    
    if($pid == -1)
      echo '<p style="color:red;" class="w3-center" >Login failed please try again.</P>' ;

    else
      load('admin.php', $pid);
}
?>

<!--getting user inputs-->

<h1 class="page-heading">Login</h1>
<form action="login.php" method="POST">
<table class="table-structure">
<tr>
<td>Email:</td><td><input type="text" name="email"></td>
<td>Password:</td><td><input type="password" name="pass"></td>
</tr>
</table>
  <p class="w3-center"><input type="submit" class="login-btn"></p>
</form>

<?php
# Includes header
require( 'includes/footer.php' ) ;

?>
