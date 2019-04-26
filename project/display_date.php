<?php
header('Content-Type: application/json');


	session_start();
	$data = $_SESSION['varname'];;
	//printing these values is needed to generate the graph
	print json_encode($data);
	
?>