$(document).ready(function(){
	$.ajax({
		url: "http://localhost/iot/index.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var sensor = [];
			var score = [];

			for(var i in data) {
				sensor.push("Sensor " + data[i].sequence);
				score.push(data[i].value);
			}

			var chartdata = {
				labels: sensor,
				datasets : [
					{
						label: 'Sensor data',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};
			var ctx = $("#mycanvas");
			
			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});