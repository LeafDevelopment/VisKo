<!doctype html>
<html>
	<head>
		<title>Bar Chart</title>
		<script src="./Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 0, user-scalable = no">
		<style>
			canvas{
			}
		</style>
	</head>
	<body>
		<canvas id="canvas" height="450" width="600"></canvas>


	<script>

		var barChartData = {
			labels : [
				"Other Error",
				"Malformed URI Error",
				"No Error Found",
				"Syntax Error"
							],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					data : [
						<?php
							include_once("dbc.inc");
							$sql="SELECT error, COUNT(*) AS 'count' FROM Query GROUP BY error;";
							$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
							$total=mysql_num_rows($result);
							if ($result) 
							{
								$datay=array();
 								while ($row = mysql_fetch_assoc($result))
								{
    									// $errors=$row["error"];
    								 	echo $row["count"];
									$total=$total-1;
									if($total>0)
										echo ",";
								}
							}
    						?>
						]
				}		
				]
			
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
	
	</script>
	</body>
</html>
