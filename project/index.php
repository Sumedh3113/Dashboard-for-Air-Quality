<?php 
    // Start MySQL Connection
    include('connect.php'); 

$var_value=0;
	if (isset($_POST['control']))
			{
				if($_POST['control']=='ON'){
				$var_value = 1;	
				}
				else{
					$var_value = 0;
				}
					date_default_timezone_set('america/los_angeles');
    $dateS = date('Y-m-d', time());// instead of m/d/Y
    
//either get light intensity from here else create new table just to turn the light ON and OFF 	
	$SQL = "UPDATE `led` SET `status` = ('$var_value')";     

    // Execute SQL statement
    mysqli_query($connection,$SQL);

			}
			
		
		
        //   $ip =   "http://iotdashboard.atwebpages.com/add_data.php";
      //     exec("ping -n 3 $ip", $output, $status);     
?>

<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>IoT Dashboard</title>
	<script>
                window.setInterval("refreshDiv()", 5000);
            function refreshDiv(){
                document.getElementById("second").innerHTML;
				//<center><b>Graph of Current Readings</b></center><title>LineGraph</title><style>.chart-container {width: 540px;height: 500px;}</style><div class='chart-container'><canvas id='mycanvas'></canvas> </div></div>  " ;
            }
        </script>
	<script>
        
        
        </script>
	
    <style type="text/css">
		#wrapper {
			
			width:100%;
			clear:both;
				}
		.first {
			  
			  width:30%;
			  float:left;
			}
		#second {
			  
			  width:42%;
			  float:left;
			}
		.third {
			  
			  width:28%;
			  float:left;
                          
                          			}
              .fourth {
			  
			  width:28%;
			  float:left;
                         
                          			}
                
        .table_titles, .table_cells_odd, .table_cells_even {
                padding-right: 20px;
                padding-left: 20px;
                color: #000;
        }
        .table_titles {
            color: #FFF;
            background-color: #666;
        }
        .table_cells_odd {
            background-color: #CCC;
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        table {
            border: 2px solid #333;
        }
        body { 
        font-family: "Trebuchet MS", Arial;
        margin:10px;
        
                  }
		
			
			
			.switch {
			  position: relative;
			  display: inline-block;
			  width: 60px;
			  height: 34px;
			}

			.switch input { 
			  opacity: 0;
			  width: 0;
			  height: 0;
			}

			.slider {
			  position: absolute;
			  cursor: pointer;
			  top: 0;
			  left: 0;
			  right: 0;
			  bottom: 0;
			  background-color: #ccc;
			  -webkit-transition: .4s;
			  transition: .4s;
			}

			.slider:before {
			  position: absolute;
			  content: "";
			  height: 26px;
			  width: 26px;
			  left: 4px;
			  bottom: 4px;
			  background-color: white;
			  -webkit-transition: .4s;
			  transition: .4s;
			}

			input:checked + .slider {
			  background-color: #2196F3;
			}

			input:focus + .slider {
			  box-shadow: 0 0 1px #2196F3;
			}

			input:checked + .slider:before {
			  -webkit-transform: translateX(26px);
			  -ms-transform: translateX(26px);
			  transform: translateX(26px);
			}

			/* Rounded sliders */
			.slider.round {
			  border-radius: 34px;
			}

			.slider.round:before {
			  border-radius: 50%;
			}
			</style>

    
	
</head>

    
    <body style="background-color:darkslategray; color:#FFF;">
        <center><h3>IOT_DASHBOARD</h3></center><hr>

<div id="wrapper">

  <div class="first"><b>Air Quality Readings</b>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            
			<td class="table_titles">Device Id</td>
            <td class="table_titles">Date</td>
            <td class="table_titles">Air Quality</td>
           <!-- <td class="table_titles">Status</td>-->
          </tr>
<?php


    // Retrieve all records in descending order and display latest 15 records
    $result = mysqli_query($connection,"SELECT * FROM final ORDER BY sequence DESC LIMIT 7");

    // Used for row color toggle
    $oddrow = true;

    // process every record
    while( $row = mysqli_fetch_assoc($result) )
      {
         
      
      
        if ($oddrow) 
        { 
            $css_class=' class="table_cells_odd"'; 
        }
        else
        { 
            $css_class=' class="table_cells_even"'; 
        }

        $oddrow = !$oddrow;

        echo '<tr>';
        echo '   <td'.$css_class.'>'.$row["Id"].'</td>';
        echo '   <td'.$css_class.'>'.$row["date"].'</td>';
	echo '   <td'.$css_class.'>'.$row["Lights"].'</td>';
        //echo '   <td'.$css_class.'>'.$row["status"].'</td>';
        echo '</tr>';
          
        if($row['Lights'] >= 200){
         
         $message = "Please Go outside Air Quality is bad";
         // echo '<div class="alert alert-success">Thank You!now please login </div>';
         
         echo"<script>alert('$message'); </script>" ;    
         break;
          }
         else if($row['Lights'] == 0 or $row['Temperature'] == 0 or $row['Humidity'] == 0){
         
         $message = "Sensor is not working";
         // echo '<div class="alert alert-success">Thank You!now please login </div>';
         
         echo"<script>alert('$message'); </script>" ;    
         
          }

        else if($row['Lights'] >= 100 and $row['Lights'] < 200)
                 {
           $message = "Open your Doors and Windows";
        //   echo"Hi";
           echo"<script>alert('$message'); </script>" ;
                   break;
                   }

                }
          
	

	
?>
    </table>
    
    <!--Second table starts here------------------------------------>

  <div class="forth"><b>Temperature Readings</b>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            
			<td class="table_titles">Device Id</td>
            <td class="table_titles">Date</td>
            <td class="table_titles">Temperature</td>
           <!-- <td class="table_titles">Status</td>-->
          </tr>
<?php


    // Retrieve all records in descending order and display latest 15 records
    $result = mysqli_query($connection,"SELECT * FROM final ORDER BY sequence DESC LIMIT 7");

    // Used for row color toggle
    $oddrow = true;

    // process every record
    while( $row = mysqli_fetch_assoc($result) )
    {
        if ($oddrow) 
        { 
            $css_class=' class="table_cells_odd"'; 
        }
        else
        { 
            $css_class=' class="table_cells_even"'; 
        }

        $oddrow = !$oddrow;

        echo '<tr>';
        echo '   <td'.$css_class.'>'.$row["Id"].'</td>';
        echo '   <td'.$css_class.'>'.$row["date"].'</td>';
	echo '   <td'.$css_class.'>'.$row["Temperature"].'</td>';
        //echo '   <td'.$css_class.'>'.$row["status"].'</td>';
        echo '</tr>';
    }
	

	
?>
    </table>
    </div>
<!--------------------2nd table ends here---------------------------------------->

    
    
    </div></div>
    
    
	
 <div id="second"><center><b>Graph of Current Readings</b></center>
    <!--To refresh after every 5 sec-->
    <meta http-equiv ='refresh' content='10'> 
    <style>
      .chart-container {
        width: 540px;
        height: 300px;
      }
    </style>
  
     <div class="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>
    
  
 <div><center>
 <?php 	
?>
</center>

 </div>
 
 </div>
 
 
 
 <div class="third" >
 <div className="form-group" style="padding-left:50px;" >
 <b>Date wise Readings</b>
 <table>
 <tr>
 <td>
 <form action="date_fetch.php" method = "get">
  From: </td>
  <td><input type="date" name="from" className="form-control"/><br>
  </td>
  </tr>
  
  <tr><td>
  To  :  </td><td>   <input type="date" name="to"className="form-control"><br>
	</td></tr>
<tr><td></td><td>
  <input type="submit" value="Submit" className="btn btn-lg btn-secondary btn-block active" style="background:darkgray;"/>
  </td></tr>
</form>
</table>
 
 
 <hr>


<div className="form-group">Graph for other readings
<form action="ids.html" method = "post">
<input type="submit" value="Humidity" className="btn btn-sm btn-dark btn-block active" style="background:darkgray;" />
</form>
</div>

<div className="form-group">
<form action="temp.html" method = "post">
<input type="submit" value="Temperature" className="btn btn-sm btn-dark btn-block active" style="background:darkgray;" />
</form>

</div>

</div>
<br/>

    <!--3rd table starts here------------------------------------>

  <div class="forth"><b>Humidity Readings</b>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            
	<td class="table_titles">Device Id</td>
            <td class="table_titles">Date</td>
            <td class="table_titles">Humidity</td>
           <!-- <td class="table_titles">Status</td>-->
          </tr>
<?php


    // Retrieve all records in descending order and display latest 15 records
    $result = mysqli_query($connection,"SELECT * FROM final ORDER BY sequence DESC LIMIT 7");

    // Used for row color toggle
    $oddrow = true;

    // process every record
    while( $row = mysqli_fetch_assoc($result) )
    {
        if ($oddrow) 
        { 
            $css_class=' class="table_cells_odd"'; 
        }
        else
        { 
            $css_class=' class="table_cells_even"'; 
        }

        $oddrow = !$oddrow;

        echo '<tr>';
        echo '   <td'.$css_class.'>'.$row["Id"].'</td>';
        echo '   <td'.$css_class.'>'.$row["date"].'</td>';
	echo '   <td'.$css_class.'>'.$row["Humidity"].'</td>';
        //echo '   <td'.$css_class.'>'.$row["status"].'</td>';
        echo '</tr>';
    }
	

	
?>
    </table>
    </div>
<!--------------------3rd table ends here---------------------------------------->







<!-- javascript -->
    
    
 
 </div>

<p id = "yesnojs" class= "jstest">

</p>

<script>
function myFunction(value) {
    document.getElementById("yesnojs").innerHTML =  value ;
}
</script>

</div>

    <!-- javascript -->
	
	<script type="text/javascript" src="js/date_fetch.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/linegraph.js"></script>
    </body>
</html>