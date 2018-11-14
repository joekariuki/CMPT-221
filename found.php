<!DOCTYPE html>
<html>
  <title>Found Items</title>
  

<?php
# Includes header
require( 'includes/header.php' ) ;

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;


# Show the records
show_found_records_brief($dbc);

# Close the connection
mysqli_close( $dbc ) ;
?>
<!--link for the user to go to the report found item page-->
<div class="report-lost">
    <a href="/limbo-Alpha/found-1.php">Report found item</a>
</div>

<?php
# Includes header
require( 'includes/footer.php' ) ;

?>

