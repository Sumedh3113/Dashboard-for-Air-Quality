<?php
    // Connect to MySQL
    include("connect.php");
	

    // Prepare the SQL statement
     date_default_timezone_set('america/los_angeles');
     $dateS = date('Y-m-d', time());// instead of m/d/Y
    
     //$var = 'Inactive';
     
	//Use this code in main code
	
    // $var ='Active';
        
	
	
	//$SQL = "INSERT INTO final VALUES ('$dateS','".$_GET["Lights"]."','".$_GET["id"]."','$var','')";
        
        //Lights == Air Quality
        $SQL = "INSERT INTO final VALUES ('$dateS','".$_GET["Lights"]."','".$_GET["Id"]."','','".$_GET['Humidity']."','".$_GET["Temperature"]."')";

    // Execute SQL statement
    mysqli_query($connection,$SQL);
	
                                
    // Go to the review_data.php (optional)
    //header("Location: index.php");
?>