
<?php
$debug = true;

# Name: Name Hoang, Joe Kariuki, Tawan Scott

#Show record of lost items in Lost Items page
function show_lost_records($dbc) {
	# Create a query to get essential information from the stuff table about lost items reported
	$query = 'SELECT id, create_date, name FROM stuff WHERE status = "lost" ORDER BY create_date DESC';

	# Execute the query
	$results = mysqli_query($dbc , $query) ;
	check_results($results) ;

	# Show table headers
	if( $results )
	{
  		# rendering the lost table
  		echo '<H1 class="page-heading">Lost Items</H1>' ;
  		echo '<p class="w3-center">Seems like you\'ve found something! Here is a list of all the lost items</p>';
  		echo '<TABLE class="table-structure" border="1">';
  		echo '<TR>';
  		echo '<TH>Id</TH>';
  		echo '<TH>Date
  		</TH>';
  		echo '<TH>Name</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		$alink = '<A HREF=ql-1.php?id=' . $row['id']  . '>' . $row['id'] . '</A>' ;
    		echo '<TD>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['name'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Inserts a lost record into the limbo stuff table
function insert_lost_record($dbc, $name, $location, $description, $status, $create_date, $contact_email, $contact_phone, $reward, $reward_amount, $image_link) {
  $query = 'INSERT INTO stuff(name, location_name, description, status, create_date, contact_email, contact_phone, reward, reward_amount, image_link) VALUES ("' . $name .'" , "' . $location .'" , "' . $description . '", "' . $status . '","' .$create_date. '", "' . $contact_email . '", "' . $contact_phone . '", "' . $reward . '", "' . $reward_amount . '", "' . $image_link . '")' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results;
}

#Inserts a found record into the limbo stuff table
function insert_found_record($dbc, $name, $location,$description, $status, $create_date, $contact_email, $contact_phone, $image_link) {
  $query = 'INSERT INTO stuff(name, location_name, description, status, create_date, contact_email, contact_phone, image_link) VALUES ("' . $name .'" , "' . $location .'" , "' . $description . '", "' . $status . '", "' . $create_date . '", "' . $contact_email . '", "' . $contact_phone . '", "' . $image_link . '")' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results;
}

function insert_admin_user($dbc, $firstname, $lastname, $email, $reg_time, $pass) {
  $query = 'INSERT INTO users(first_name, last_name, email, reg_time, pass) VALUES ("' . $firstname .'" , "' . $lastname .'" , "' . $email . '", "' . $reg_time . '", "' . $pass . '")' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results;
}
function insert_superadmin_user($dbc, $firstname, $lastname, $email, $reg_time, $pass) {
  $query = 'INSERT INTO admins(first_name, last_name, email, reg_time, pass) VALUES ("' . $firstname .'" , "' . $lastname .'" , "' . $email . '", "' . $reg_time . '", "' . $pass . '")' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results;
}
# Show record of found items in Found Items page
function show_found_records_brief($dbc) {
	# Create a query to get essential information from the stuff table about found items reported
	$query = 'SELECT id, create_date, name, location_name FROM stuff WHERE status = "found" ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show table headers
	if( $results )
	{
		#rendering found table
  		echo '<H1 class="page-heading">Found Items</H1>' ;
  		echo '<p class="w3-center">Seems like you\'ve lost something! Here is a list of all the found items</p>';
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>Id</TH>';
  		echo '<TH>Date/Time</TH>';
  		echo '<TH>Item</TH>';
		echo '<TH>Location</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
  			$alink = '<A HREF=ql-1.php?id=' . $row['id']  . '>' . $row['id'] . '</A>' ;
    		echo '<TR>' ;
    		echo '<TD>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['name'] . '</TD>' ;
			echo '<TD>' . $row['location_name'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Show record of all items (for quicklinks page) 
function show_records_ql($dbc) {
	# Create a query to get the date, item name and location lost sorted by create_date
	$query = 'SELECT id, create_date, name, status, reward FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show table headers
	if( $results )
	{

  		echo '<H1 class="page-heading">Quick Links</H1>' ;
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>Date/Time</TH>';
		echo '<TH>Item</TH>';
		echo '<TH>Status</TH>';
		echo '<TH>Reward</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
  			$alink = '<A HREF=ql-1.php?id=' . $row['id']  . '>' . $row['id'] . '</A>' ;
    		echo '<TR>' ;
    		echo '<TD>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['name'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>';
			echo '<TD>' . $row['reward'] . '</TD>';
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Shows all information about a specific item record
function show_record($dbc, $id) {
	# Create a query to get the number, first name and last name sorted by number descending
	$query = 'SELECT id, description, create_date, name, location_name, status, contact_email, contact_phone, reward, reward_amount, image_link FROM stuff WHERE id = ' . $id;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{

  		echo '<H1 class="page-heading">Item</H1>' ;
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>Date</TH>';
  		echo '<TH>Item Name</TH>';
  		echo '<TH>Description</TH>';
		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
		echo '<TH>Reward</TH>';
		echo '<TH>Reward Amount ($USD)</TH>';
		echo '<TH>Contact Email</TH>';
		echo '<TH>Contact Number</TH>';
		echo '<TH>Image</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['name'] . '</TD>' ;
    		echo '<TD>' . $row['description'] . '</TD>' ;
			echo '<TD>' . $row['location_name'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '<TD>' . $row['reward'] . '</TD>' ;
			echo '<TD>' . $row['reward_amount'] . '</TD>' ;
			echo '<TD>' . $row['contact_email'] . '</TD>' ;
			echo '<TD>' . $row['contact_phone'] . '</TD>' ;
			$alink = '<img style="width: 100px; height: 100px;" src='. $row['image_link'] . ">'"  ;
    		echo '<TD>' . $alink . '</TD>';
    		echo '</TR>' ;
    		
  		}

  		# End the table
  		echo '</TABLE>';
  		
	
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Shows all information about a specific item record
function show_user_record($dbc, $id) {
	# Create a query to get the number, first name and last name sorted by number descending
	$query = 'SELECT user_id, reg_time, first_name, last_name, email, pass FROM users WHERE user_id = ' . $id;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{

  		echo '<H1 class="page-heading">Update User</H1>' ;
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>Date</TH>';
  		echo '<TH>First Name</TH>';
  		echo '<TH>Last Name</TH>';
		echo '<TH>Email</TH>';
		echo '<TH>Password</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['reg_time'] . '</TD>' ;
    		echo '<TD>' . $row['first_name'] . '</TD>' ;
    		echo '<TD>' . $row['last_name'] . '</TD>' ;
			echo '<TD>' . $row['email'] . '</TD>' ;
			echo '<TD>' . $row['pass'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
  		
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}


# Shows all information about a specific item record
function show_admin_record($dbc, $id) {
	# Create a query to get the number, first name and last name sorted by number descending
	$query = 'SELECT admin_id, reg_time, first_name, last_name, email, pass FROM admins WHERE admin_id = ' . $id;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{

  		echo '<H1 class="page-heading">Update Admin</H1>' ;
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>Date</TH>';
  		echo '<TH>First Name</TH>';
  		echo '<TH>Last Name</TH>';
		echo '<TH>Email</TH>';
		echo '<TH>Password</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['reg_time'] . '</TD>' ;
    		echo '<TD>' . $row['first_name'] . '</TD>' ;
    		echo '<TD>' . $row['last_name'] . '</TD>' ;
			echo '<TD>' . $row['email'] . '</TD>' ;
			echo '<TD>' . $row['pass'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}


# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}



# Validates name input
function valid_name($name) {
  if(empty($name)) 
    return false;
  else {
    return true;
  }  
}



#show stuff and users table in the admin page
function show_admin($dbc) {
	# Create query to get the date, item name and location lost sorted by create_date
	$query1 = 'SELECT admin_id, first_name, last_name, email, pass, reg_time FROM admins ORDER BY admin_id ASC';
	$query2 = 'SELECT user_id, first_name, last_name, email, pass, reg_time FROM users ORDER BY user_id ASC';
	$query3 = 'SELECT id, name, description, create_date, contact_email, contact_phone, status, reward, reward_amount FROM stuff ORDER BY id ASC';
	
	# Execute the query1
	$results1 = mysqli_query( $dbc , $query1 ) ;
	check_results($results1);

	$results2 = mysqli_query( $dbc , $query2 ) ;
	check_results($results2);
	
	$results3 = mysqli_query( $dbc , $query3 ) ;
	check_results($results3);
	
	if( $results1)
	{
  		echo '<H1 class="page-heading">Master Admins</H1>' ;
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>First Name</TH>';
  		echo '<TH>Last Name</TH>';
		echo '<TH>Email</TH>';
		echo '<TH>Password</TH>';
		echo '<TH>Date/Time</TH>';
		echo '<TH>Edit User Info</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results1 , MYSQLI_ASSOC ) )
  		{
			$alink = '<A HREF=edit-2.php?admin_id=' . $row['admin_id']  . '>' . $row['admin_id'] . '</A>' ;
    		echo '<TR>' ;
    		echo '<TD>' . $row['admin_id'] . '</TD>' ;
    		echo '<TD>' . $row['first_name'] . '</TD>' ;
			echo '<TD>' . $row['last_name'] . '</TD>';
			echo '<TD>' . $row['email'] . '</TD>';
			echo '<TD>' . $row['pass'] . '</TD>';
			echo '<TD>' . $row['reg_time'] . '</TD>';
			echo '<TD>' . $alink . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
	}	
	
	if($results2)
	{
  		echo '<H1 class="page-heading">Admins</H1>' ;
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>First Name</TH>';
  		echo '<TH>Last Name</TH>';
		echo '<TH>Email</TH>';
		echo '<TH>Password</TH>';
		echo '<TH>Date/Time</TH>';
		echo '<TH>Edit User Info</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results2 , MYSQLI_ASSOC ) )
  		{
			$alink = '<A HREF=edit-1.php?user_id=' . $row['user_id']  . '>' . $row['user_id'] . '</A>' ;
    		echo '<TR>' ;
    		echo '<TD>' . $row['user_id'] . '</TD>' ;
    		echo '<TD>' . $row['first_name'] . '</TD>' ;
			echo '<TD>' . $row['last_name'] . '</TD>';
			echo '<TD>' . $row['email'] . '</TD>';
			echo '<TD>' . $row['pass'] . '</TD>';
			echo '<TD>' . $row['reg_time'] . '</TD>';
			echo '<TD>' . $alink . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
	}	
 
	if( $results3)
	{
		echo '<H1 class="page-heading">Items</H1>' ;
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>Name</TH>';
  		echo '<TH>Description</TH>';
		echo '<TH>Date/Time</TH>';
		echo '<TH>Status</TH>';
		echo '<TH>Reward</TH>';
		echo '<TH>Amount</TH>';
		echo '<TH>Contact Email</TH>';
		echo '<TH>Contact Number</TH>';
		echo '<TH>Edit Item Info</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results3 , MYSQLI_ASSOC ) )
	  		{
	  		$alink = '<A HREF=edit.php?id=' . $row['id']  . '>' . $row['id'] . '</A>' ;
	    		echo '<TR>' ;
	    		echo '<TD>' . $row['id'] . '</TD>' ;
	    		echo '<TD>' . $row['name'] . '</TD>' ;
				echo '<TD>' . $row['description'] . '</TD>';
				echo '<TD>' . $row['create_date'] . '</TD>';
				echo '<TD>' . $row['status'] . '</TD>';
				echo '<TD>' . $row['reward'] . '</TD>';
				echo '<TD>' . $row['reward_amount'] . '</TD>';
				echo '<TD>' . $row['contact_email'] . '</TD>';
				echo '<TD>' . $row['contact_phone'] . '</TD>';
				echo '<TD>' . $alink . '</TD>' ;
	    		echo '</TR>' ;
	  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results1 ) ;
  		mysqli_free_result( $results2 ) ;
  		mysqli_free_result( $results3 ) ;
	}
}

#show stuff table in the normal admin page

function show_admin_normal($dbc) {
	# Create query to get the date, item name and location lost sorted by create_date
	$query2 = 'SELECT id, name, description, create_date, contact_email, contact_phone, status, reward, reward_amount FROM stuff ORDER BY id ASC';

	# Execute the query1

	$results2 = mysqli_query( $dbc , $query2 ) ;
	check_results($results2);
	
 
	if( $results2)
	{
		echo '<H1 class="page-heading">Items</H1>' ;
  		echo '<TABLE border="1" class="table-structure">';
  		echo '<TR>';
  		echo '<TH>ID</TH>';
  		echo '<TH>Name</TH>';
  		echo '<TH>Description</TH>';
		echo '<TH>Date/Time</TH>';
		echo '<TH>Status</TH>';
		echo '<TH>Reward</TH>';
		echo '<TH>Amount</TH>';
		echo '<TH>Contact Email</TH>';
		echo '<TH>Contact Number</TH>';
		echo '<TH>Edit Item Info</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results2 , MYSQLI_ASSOC ) )
	  		{
	  		$alink = '<A HREF=edit-3.php?id=' . $row['id']  . '>' . $row['id'] . '</A>' ;
	    		echo '<TR>' ;
	    		echo '<TD>' . $row['id'] . '</TD>' ;
	    		echo '<TD>' . $row['name'] . '</TD>' ;
				echo '<TD>' . $row['description'] . '</TD>';
				echo '<TD>' . $row['create_date'] . '</TD>';
				echo '<TD>' . $row['status'] . '</TD>';
				echo '<TD>' . $row['reward'] . '</TD>';
				echo '<TD>' . $row['reward_amount'] . '</TD>';
				echo '<TD>' . $row['contact_email'] . '</TD>';
				echo '<TD>' . $row['contact_phone'] . '</TD>';
				echo '<TD>' . $alink . '</TD>' ;
	    		echo '</TR>' ;
	  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results2 ) ;
	}
}
# Delete a record from the stuff table
function delete_stuff_record($dbc, $id) {
	$query = 'DELETE FROM stuff WHERE id = ' . $id ;
	show_query($query);
	
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

  return $results ;
}

#Delete a record from the user record
function delete_user_record($dbc, $id) {
	$query = 'DELETE FROM users WHERE user_id = ' . $id ;
	show_query($query);
	
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

  return $results ;
}

function delete_admin_record($dbc, $id) {
	$query = 'DELETE FROM admins WHERE admin_id = ' . $id ;
	show_query($query);
	
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

  return $results ;
}



?>