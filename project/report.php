<?php
include('connect.php');



$count = 0;	
//$id = array();
//

$sql5 = "SELECT * FROM `final` where `status` ='Inactive'";
$result5 = mysqli_query($connection, $sql5);
$ros = array();
$fh = fopen('data.doc', 'w+');
fwrite($fh, "Report for Inactive Devices:");
fwrite($fh, "\n");
fwrite($fh, "\n");

 while( $ros = mysqli_fetch_assoc($result5) )
    {
	$count = $count + 1;
	//echo "Date ".$ros['date']."<br>";
	//echo "ID ".$ros['id']."<br>";
	//echo "Status ".$ros['status']."<br><br>";


//for ($x=0;$x<$count-1;$x++){

fwrite($fh, "Date: ".$ros['date']."\n");
fwrite($fh, "\n");
fwrite($fh, "ID: ".$ros['id']."\n");
fwrite($fh, "\n");
fwrite($fh,"Status:  ". $ros['status']);
fwrite($fh, "\n");
fwrite($fh, "\n");
	//	}

	}
	
//<a href="download.php">click here</a>

	?>
<?php
 header("Location: download.php");

?>

