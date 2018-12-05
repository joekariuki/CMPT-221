<!--This is the quicklinks page which display brief information-->
<!--about every item, lost or found, in the stuff table-->

<?php
# Includes header
require( 'includes/header.php' ) ;
?>

<title>Quick Links</title>

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