<!--This is the page that the superadmin use to edit an item -->
<!--It takes the inputs and puts them into POST requests which then trigger a query that modify the stuff table-->

<!DOCTYPE html>
<html>
    <title>Edit Item</title>
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
  <a href="/limbo-Alpha/landing.php" class="w3-right w3-button w3-hover-white">Logout</a>
</nav>
<?php

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

// series of if statements for updating the table row according to id
if( isset($_POST['newName']) ) {

    $id = $_GET['id'];
    $newName = $_POST['newName'];
    $query = "UPDATE stuff SET name='$newName' WHERE id='$id'";
	show_query($query);
	
	$results = mysqli_query( $dbc , $query) ;

}

if( isset($_POST['newDescription']) ) {

    $id = $_GET['id'];
    $newDescription = $_POST['newDescription'];
    $query2 = "UPDATE stuff SET description='$newDescription' WHERE id='$id'" ;
	show_query($query2);
	
	$results = mysqli_query( $dbc , $query2 ) ;

}

if( isset($_POST['newLocation']) ) {

    $id = $_GET['id'];
    $newLocation = $_POST['newLocation'];
    $query3 = "UPDATE stuff SET location_name='$newLocation' WHERE id='$id'" ;
	show_query($query3);
	
	$results = mysqli_query( $dbc , $query3 ) ;

}

if( isset($_POST['newStatus']) ) {

    $id = $_GET['id'];
    $newStatus = $_POST['newStatus'];
    $query4 = "UPDATE stuff SET status='$newStatus' WHERE id='$id'" ;
	show_query($query4);
	
	$results = mysqli_query( $dbc , $query4 ) ;

}

if( isset($_POST['newReward']) ) {

    $id = $_GET['id'];
    $newReward = $_POST['newReward'];
    $query5 = "UPDATE stuff SET reward='$newReward' WHERE id='$id'" ;
	show_query($query5);
	
	$results = mysqli_query( $dbc , $query5 ) ;

}

if( isset($_POST['newAmount']) ) {

    $id = $_GET['id'];
    $newAmount = $_POST['newAmount'];
    $query6 = "UPDATE stuff SET reward_amount='$newAmount' WHERE id='$id'" ;
	show_query($query6);
	
	$results = mysqli_query( $dbc , $query6 ) ;

}

if( isset($_POST['newEmail']) ) {

    $id = $_GET['id'];
    $newEmail = $_POST['newEmail'];
    $query7 = "UPDATE stuff SET contact_email='$newEmail' WHERE id='$id'" ;
	show_query($query7);
	
	$results = mysqli_query( $dbc , $query7 ) ;

}

if( isset($_POST['newNumber']) ) {

    $id = $_GET['id'];
    $newNumber = $_POST['newNumber'];
    $query8 = "UPDATE stuff SET contact_phone='$newNumber' WHERE id='$id'" ;
	show_query($query8);
	
	$results = mysqli_query( $dbc , $query8 ) ;

}

if( isset($_POST['newLink']) ) {

    $id = $_GET['id'];
    $newLink = $_POST['newLink'];
    $query9 = "UPDATE stuff SET image_link ='$newLink' WHERE id='$id'" ;
	show_query($query9);
	
	$results = mysqli_query( $dbc , $query9 ) ;

}

if(isset($_GET['id'])) {
          show_record($dbc, $_GET['id']);
}

# Close the connection
mysqli_close( $dbc ) ;

?>

<!--getting user inputs-->

<form action="" method="POST" >
    <table class="table-structure">
        <tr>
          <td>Name: <input type="text" name="newName" placeholder="Item Name" required/><span class="required">*</span></td>
        </tr>
        <tr>
          <td>Description: <input type="text" name="newDescription" placeholder="Information about the item"/><span class="required">*</span> </td>
        </tr>
        <tr>
          <td>Location: 
            <select name="location_name" required>
               <option value="Byrne House">Byrne House</option>
               <option value="Buidling D">Building D</option>
               <option value="Cannavino Library">Cannavino Library</option>
               <option value="Champagnat Hall">Champagnat Hall</option>
               <option value="Chapel">Chapel</option>
               <option value="Cornell Boathouse">Cornell Boathouse</option>
               <option value="Donnelly Hall">Donnelly Hall</option>
               <option value="Dyson Center">Dyson Center</option>
               <option value="Fern Tor">Fern Tor</option>
               <option value="Fontaine  Hall">Fontaine  Hall</option>
               <option value="Foy Townhouses">Foy Townhouses</option>
               <option value="Fulton Street Townhouses (Lower)">Fulton Street Townhouses (Lower)</option>
               <option value="Fulton Street Townhouses (Upper)">Fulton Street Townhouses (Upper)</option>
               <option value="Greystone Hall">Greystone Hall</option>
               <option value="Hancock Center">Hancock Center</option>
               <option value="Kieran Gatehouse">Kieran Gatehouse</option>
               <option value="Kirk House">Kirk House</option>
               <option value="Lavelle Hall">Lavelle Hall</option>
               <option value="Leo Hall">Leo Hall</option>
               <option value="Longview Park">Longview Park</option>
               <option value="Lowell Thomas">Lowell Thomas</option>
               <option value="Lower New Townhouses">Lower New Townhouses</option>
               <option value="Marian Hall">Marian Hall</option>
               <option value="Marist Boathouse">Marist Boathouse</option>
               <option value="McCann Center">McCann Center</option>
               <option value="Marian Hall">Marian Hall</option>
               <option value="Mid-Rise Hall">Mid-Rise Hall</option>
               <option value="O'Shea Hall">O'Shea Hall</option>
               <option value="St. Anns Hermitage">St. Anns Hermitage</option>
               <option value="St.Peters">St.Peters</option>
               <option value="Science and Allied Health Building">Science and Allied Health Building</option>
               <option value="Sheahan Hall">Sheahan Hall</option>
               <option value="Steel Plant Studios and Gallery">Steel Plant Studios and Gallery</option>
               <option value="Student Center/Music Building">Student Center/Music Building</option>
               <option value="Ward Hall">Ward Hall</option>
               <option value="West Cedar Townhouses (Lower)">West Cedar Townhouses (Lower)</option>
               <option value="West Cedar Townhouses (Upper)">West Cedar Townhouses (Upper)</option>
               <option value="Rotunda">Rotunda</option>
            </select>
            <span class="required">*</span></td>
        </tr>
        <tr>
          <td>Status: <input type="text" name="newStatus" placeholder="found/lost" required/><span class="required">*</span></td>
        </tr>
        <tr>
          <td>Reward: <input type="text" name="newReward" placeholder="yes/no"/><span class="required">*</span></td>
        </tr>
        <tr>
          <td>Reward Amount: <input type="int" name="newAmount"/><span class="required">*</span></td>
        </tr>
        <tr>
          <td>Email: <input type="text" name="newEmail" placeholder="a@bcd.com" required/><span class="required">*</span></td>
        </tr>
        <tr>
          <td>Phone Number: <input type="int" name="newNumber"placeholder="8450000000" required/>*</span></td>
        </tr>
        <tr>
          <td>Image Link: <input type="text" name="newLink"placeholder="mothslovelamps.com/meme" required/><span class="required">*</span></td>
        </tr>
    </table>
        <p class="w3-center w3-container"><input type="submit"  class="update-btn" value ="Update Item"></p>
</form>

<?php
# Includes header
require( 'includes/footer.php' ) ;

?>