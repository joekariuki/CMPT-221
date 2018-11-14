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

# Report a lost item
    
if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
  	$name = $_POST['name'] ;
    $location = $_POST['location_name'] ;
  	$desciption = $_POST['description'];
  	$create_date = $_POST['create_date'];
  	$contact_email = $_POST['contact_email'];
  	$contact_phone = $_POST['contact_phone'];
  	$reward = $_POST['reward'];
  	$reward_amount = $_POST['reward_amount'];
    insert_lost_record($dbc,$name,$location, $description, 'lost', $create_date, $contact_email, $contact_phone, $reward, $reward_amount);
    echo '<p class="reported-text">Item has been reported lost!</p>';
}



?>
<!--Get inputs from the user. -->
<h1 class="page-heading">Report Lost Item</h1>
<form action="lost-1.php" method="POST">
  <table class="table-structure">
    <tr>
      <td>Item: <input type="text" name="name" value="<?php if
      (isset($_POST['name'])) echo $_POST['name']; ?>" placeholder="Item Name" required><span style="color: red;">*</span>
    </tr>
    <tr>
      <td>Location: <input type="text" name="location_name" value="<?php if
      (isset($_POST['location_name'])) echo $_POST['location_name']; ?>" placeholder="Where did you lose the item?" required><span style="color: red;">*</span></td>
    </tr>
    <tr>
      <td>Description: <input type="text" name="description" value="<?php if
      (isset($_POST['description'])) echo $_POST['description']; ?>" placeholder="Additional Details"></td>
    </tr>
    <tr>
    <tr>
      <td>Date/Time: <input type="text" name="create_date" value="<?php if
      (isset($_POST['create_date'])) echo $_POST['create_date']; ?>" placeholder="YYYY-MM-DD HH:MM:SS" required><span style="color: red;">*</span></td>
    </tr>
    <tr>
      <td>Contact email: <input type="email" name="contact_email" value="<?php if
      (isset($_POST['contact_email'])) echo $_POST['contact_email']; ?>" placeholder="a@bcd.com" required><span style="color: red;">*</span></td>
    </tr>   
    <tr>
      <td>Contact Phone Number: <input type="number" name="contact_phone" value="<?php if
      (isset($_POST['contact_phone'])) echo $_POST['contact_phone']; ?>" placeholder="8450000000" minlength="10" maxlength="10" required><span style="color: red;">*</span></td>
    </tr>
    <tr>
      <td>Reward: <input type="text" name="reward" value="<?php if
      (isset($_POST['reward'])) echo $_POST['reward']; ?>" placeholder="yes or no"></td>
    </tr>    
    <tr>
      <td>Reward Amount: <input type="number" name="reward_amount" value="<?php if
      (isset($_POST['reward_amount'])) echo $_POST['reward_amount']; ?>" placeholder=" 200"></td>
    </tr>
  </table>
  <!-- create class for submit-btn -->
    <p class="w3-center submit-btn"><input type="submit" value ="Submit Report"></p>
</form>
</body>

<?php
# Includes header
require( 'includes/footer.php' ) ;

?>
