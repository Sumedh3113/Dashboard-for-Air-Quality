<?php
 
header("Content-Disposition: attachment; filename= data.doc");
header("Content-Type: application/msword");
readfile('data.doc');



//header("Location: index.php")
	
?>