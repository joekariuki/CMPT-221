<!--This is the landing page of our Limbo program, it features the navgation bars with links to other pages and a search bar-->

<!DOCTYPE html>
<html>
<title>Limbo</title>
<?php
# Includes header
require( 'includes/header.php' ) ;

?>

<div class="w3-center">
  <img  style="height: 100px; width: 100px; margin-top:20px" src="https://goredfoxes.com/images/logos/site/site.png"> 
</div>


<header class="w3-container w3-center w3-padding-16 w3-white">
  <h1 class="w3-xxlarge"><b>Welcome to Limbo Lost and Found System!</b></h1>
</header>

<form action="search.php"  method="post" id="searchform"> 
  <table class="search-table">
    <tr>
      <td><input type="search" name="searchword" value="<?php if
      (isset($_POST['searchword'])) echo $_POST['searchword']; ?>">
      <td><input type="submit" class="submit-btn" value="Search"></td>
    </tr>
  </table>
</form> 

<div class="w3-center landing-image">
  <img src="https://jobs.marist.edu/images/1.jpg" class="w3-round w3-card"> 
</div>

<div class="w3-row">
  <div class="w3-container w3-center  w3-padding-32 w3-white w3-half">
    <h1 class="w3-xlarge">Have you lost something?</h1>
    <a href="/limbo-Alpha/lost.php" class="w3-button w3-color w3-round" >Click Here</a>
  </div>


	    
  <div class="w3-container w3-center w3-padding-32 w3-white w3-half">
    <h1 class="w3-xlarge">Have you found something?</h1>
    <a href="/limbo-Alpha/found.php" class="w3-button w3-color w3-round" >Click Here</a>
  </div>
</div>



<?php
# Includes header
require( 'includes/footer.php' ) ;

?>
