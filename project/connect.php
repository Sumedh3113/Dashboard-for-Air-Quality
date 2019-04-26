<?php
$connection = mysqli_connect('fdb23.runhosting.com', '2891182_sensor', 'Abcd@1234','2891182_sensor');
if(!$connection){
die("Database Connection Failed" . mysqli_error($connection));
}
//echo "Connected successfully";
$select_db = mysqli_select_db($connection, '2891182_sensor');
if(!$select_db)
{
    die("Database Selection Failed" . mysqli_error($connection));
}
else{
   // echo "Connected database successfully";
    
}
?>