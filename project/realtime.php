<?php
header('Content-Type: application/json');

require_once('connect.php');

	//date_default_timezone_set('america/los_angeles');
	//$dateS = date('m/d/Y h:i:s', time());
	

	$sql = "SELECT * FROM final order by sequence desc limit 100 ";
	//where date ='$dateS'
	$result = mysqli_query($connection, $sql) or die (mysql_error ());
	
	$data = array();

	foreach ($result as $row) {
	$data[] = $row;
	}

	// while ($row = mysqli_fetch_array ($result)){
	
	//printing these values is needed to generate the graph
	print json_encode($data);
	
?>
