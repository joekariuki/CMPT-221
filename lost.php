<!--This page display the lost item records-->

<!DOCTYPE html>
<html>
<title>Lost Items</title>

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


<p class="w3-center report-text">You can report the found item below.</p>
<div class="w3-center w3-container report">
    <a class="report-btn" href="/limbo-Alpha/found-1.php">Report found item</a>
</div>

<?php

# includes footer template
require( 'includes/footer.php' ) ;

?>
