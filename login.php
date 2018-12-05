<!--This is the login page-->
<!--It takes user input, generate POST requests,-->
<!--passes those requests into variables and validates -->
<!--them according to email and password data in users-->
<!--and admins table then redirect to either the admin-->
<!--user page or the superadmin page accordingly-->

<!DOCTYPE html>
<html>
  <title>Login</title>
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
  $password = $_POST['pass'] ;
  $hashpass = hash('ripemd160', $password);
  
    $pid = validate($email, $hashpass);
    
    if($pid == -1)
      echo '<p style="color:red;" class="w3-center" >User Login failed! Please try again.</P>' ;

    else
      load('admin.php', $pid);
      

}

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

	$email = $_POST['email'] ;
  $password = $_POST['pass'] ;
  $hashpass = hash('ripemd160', $password);
  
    $pid = validatetwo($email, $hashpass);
    
    if($pid == -1)
      echo '<p style="color:red;" class="w3-center" >Admin Login failed! Please try again.</P>' ;

    else 
      load('admin-1.php', $pid);
      
}
?>

<!--getting user inputs-->

<h1 class="page-heading">Login</h1>
<form action="login.php" method="POST">
  <table class="table-structure">
    <tr>
      <td>Email:<input style="padding: 8px 10px;" type="email" name="email" required></td>
    </tr>
    <tr>
     <td>Password:<input style="padding: 8px 10px;" type="password" name="pass" required></td>
    </tr>
    
      
  </table>
    <p class="w3-center"><input type="submit" class="login-btn" value="Login"></p>
</form>


<?php
# Includes header
require( 'includes/footer.php' ) ;

?>
