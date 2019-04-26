$(document).ready(function(){
  $.ajax({
    url : "http://iotdashboard.atwebpages.com/id.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var userid = [];
      var sensor_data = [];
	 
     

      for(var i in data) {
        userid.push("Date " + data[i].date);
        sensor_data.push(data[i].Humidity);
          }

      var chartdata = {
        labels: userid,
        datasets: [
          {
            label: "sensor1",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: sensor_data
          }
          
        ]
      };

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {

    }
  });
});
