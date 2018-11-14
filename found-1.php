<!DOCTYPE html>
<html>
<title>Report Lost Item</title>

<?php
# Includes header
require( 'includes/header.php' ) ;

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;


# Includes these helper functions
require( 'includes/helpers.php' ) ;
    
if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
  	$name = $_POST['name'] ;
    $location = $_POST['location_name'] ;
  	$desciption = $_POST['description'];
  	$create_date = $_POST['create_date'];
  	$contact_email = $_POST['contact_email'];
  	$contact_phone = $_POST['contact_phone'];
    insert_found_record($dbc, $name, $location, $description, 'found', $create_date, $contact_email, $contact_phone);
    echo '<p class="reported-text">Item has been reported found!</p>';
}



?>
<!--Get inputs from the user. -->
<h1 class="page-heading">Report Found Item</h1>
<form action="found-1.php" method="POST">
  <table class="table-structure">
    <tr>
      <td>Item: <input type="text" name="name" value="<?php if
      (isset($_POST['name'])) echo $_POST['name']; ?>" placeholder="Item Name" required><span style="color: red;">*</span>
    </tr>
    <tr>
      <td>Location: <input type="text" name="location_name" value="<?php if
      (isset($_POST['location_name'])) echo $_POST['location_name']; ?>" placeholder="Where did you find the item?" required><span style="color: red;">*</span></td>
    </tr>
    <tr>
      <td>Description: <input type="text" name="description" value="<?php if
      (isset($_POST['description'])) echo $_POST['description']; ?>" placeholder="Additional details"></td>
    </tr>
     <tr>
      <td>Date/Time: <input type="text" name="create_date" value="<?php if
      (isset($_POST['create_date'])) echo $_POST['create_date']; ?>" placeholder="YYYY-MM-DD HH:MM:SS" required><span style="color: red;">*</span></td>
    </tr>
    <tr>
    <tr>
      <td>Contact email: <input type="email" name="contact_email" value="<?php if
      (isset($_POST['contact_email'])) echo $_POST['contact_email']; ?>" placeholder="a@bcd.com" required><span style="color: red;">*</span></td>
    </tr>   
    <tr>
      <td>Contact Phone Number: <input type="number" name="contact_phone" value="<?php if
      (isset($_POST['contact_phone'])) echo $_POST['contact_phone']; ?>" placeholder="8450000000" minlength="10" maxlength="10" required><span style="color: red;">*</span></td>
    </tr>
  </table>
  <p class="w3-center submit-btn"><input type="submit" value ="Submit Report"></p>
</form>

<?php
# Includes header
require( 'includes/footer.php' ) ;

?>