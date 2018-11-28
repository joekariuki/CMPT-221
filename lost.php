<!--
# Name: Name Hoang, Joe Kariuki, Tawan Scott
-->

<!DOCTYPE html>
<html>
<title>Lost Something</title>

<?php
# Includes header
require( 'includes/header.php' ) ;

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;


# Show the lost records
show_lost_records($dbc);

# Close the connection
mysqli_close( $dbc ) ;
?>


<div class="w3-center w3-container report">
    <a class="report-btn" href="/limbo-Alpha/lost-1.php">Report lost item</a>
</div>

<?php

# includes footer template
require( 'includes/footer.php' ) ;

?>
