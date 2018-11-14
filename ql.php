<!--
# Name: Name Hoang, Joe Kariuki, Tawan Scott
-->

<?php
# Includes header
require( 'includes/header.php' ) ;
?>

<title>Lost Something</title>

<?php

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;


# Show the quick links records
show_records_ql($dbc);

# Close the connection
mysqli_close( $dbc ) ;
?>

<?php
# Includes header
require( 'includes/footer.php' ) ;

?>