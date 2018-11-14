<?php 
# CONNECT TO limbo.sql database.

$dbc = @mysqli_connect ( 'localhost', 'root', '', 'limbo_db' )


OR die ( mysqli_connect_error() ) ;


# Set encoding to match PHP script encoding.

mysqli_set_charset( $dbc, 'utf8' ) ;