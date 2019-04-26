$(document).ready(function(){
//making an ajax call to realtime.php file
  $.ajax({
    url : "http://iotdashboard.atwebpages.com/realtime.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var userid = [];
      var facebook_follower = [];
	  //var facebook_follower2 = [];
     

      for(var i in data) {
        userid.push("Date " + data[i].date);
        facebook_follower.push(data[i].Lights);
		
          }

      var chartdata = {
        labels: userid,
        datasets: [
          {
            label: "sensor1",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: facebook_follower
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
