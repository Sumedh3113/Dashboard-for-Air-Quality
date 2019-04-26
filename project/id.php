<?php
header('Content-Type: application/json');

require_once('connect.php');
		
	$sql = "SELECT * FROM final";
	
	//
	
	$result= mysqli_query($connection, $sql);
    //	or die (mysql_error ());
	
	
	$data = array();
	
	foreach ($result as $row) {
	$data[] = $row;
	}
	
	

	//On page 1
	session_start();
	$_SESSION['varname'] = $data;
	//printing these values is needed to generate the graph
	print json_encode($data);
	//header("Location: ids.html")
	
?>
