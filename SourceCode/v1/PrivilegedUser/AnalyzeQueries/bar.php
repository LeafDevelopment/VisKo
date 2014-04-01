<!--
@Author: Maria Cortes
@Date: March 26, 2014
@Description: This file creates a bar graph based on the query error found in the database
-->

<!doctype html>
<html>

<!--Form for the graph--> 
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

<!--
Javascript method: barChartData 
Hardcodes the errors captured on the Queries in the database
Based on error fills up the barchart using chart.js 
At the same time a series of php calls to the database are used to fill up the chart with error information 
-->
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
