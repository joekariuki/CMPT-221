
<?php
# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Loads a specified or default URL.
function load( $page, $pid)
{
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL and the print id.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page . '?id=' . $pid;

  # Execute redirect then quit.
  session_start( );

  header( "Location: $url" ) ;

  exit() ;
}

# Validates the input when logging in as a superadmin (so we check from the admins table)
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validate($email, $password)
{
  global $dbc;
  

  if(empty($email)||empty($password))
    return -1 ;

  # Make the query
  $query = "SELECT email, pass FROM admins WHERE (email='" . $email . "' && pass='" . $password . "')" ;
  show_query($query) ;
  
  # Execute the query
  $results = mysqli_query( $dbc, $query ) ;
  check_results($results);

  
  # If we get no rows, the login failed
  if (mysqli_num_rows( $results ) == 0 )
  return -1 ;
  // else 
  // $pid = 1
  # We have at least one row, so get the frist one and return it
  $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

  $pid = $row [ 'id' ] ;

  return intval($pid) ;
}

# Validates the input when logging in as an admin user (so we check from the users table)
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validatetwo($email = 'email', $password = 'pass')
{
  global $dbc;

  if(empty($email)||empty($password))
    return -1 ;

  # Make the query
  $query = "SELECT email, pass FROM users WHERE (email='" . $email . "' && pass='" . $password . "')" ;
  show_query($query) ;
  
  # Execute the query
  $results = mysqli_query( $dbc, $query ) ;
  check_results($results);

  
  # If we get no rows, the login failed
  if (mysqli_num_rows( $results ) == 0 )
  return -1 ;
  // else 
  // $pid = 2
  # We have at least one row, so get the frist one and return it
  $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

  $pid = $row [ 'id' ] ;

  return intval($pid) ;
}
?>