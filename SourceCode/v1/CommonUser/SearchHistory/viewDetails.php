<!--
@Author: Maria Cortes
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
-->

	<!--Import Header with VisKo logo-->
<?php
	require_once("regHeader.inc");
?>

<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />
<link rel="stylesheet" type="text/css" href="datepicker.css" media="screen" />
<script src="bootstrap-datepicker.js"></script>
  
  <!-- Import Navigation side bar for regular user-->
  <?php 
 require_once("regNavigation.inc");
?>
	<br/> <br/>
  <!-- Middle Content--> 
    <div id="middle_box">
      <p> <b> Search View Details </b> </p>
    	<br/>
  <?php 
		/*Display image*/
  
		echo "<b>Image </b><br/>";
		$sql =mysql_query("SELECT * FROM Query WHERE user='".$_SESSION['email']."' AND id='".$_GET['id']."'");
		
		$count = 1;
		/*	echo "<table border='6'    width='100%'   cellpadding='4' cellspacing='3'>
  			<tr>
  			</tr>
   			<tr>
			<th>ID</th>
			<th>Abstraction</th>
			<th>Output Format</th>
		 	<th>Date</th>
				</tr>";*/
		while ($row = mysql_fetch_array($sql))
		{
			echo "<img src='noimage.png' style='width:750px; height:300px'></td>";
			
			echo "<br/>";
			echo"<br/>";
			
			
			echo "<b> Responsible Pipeline </b>";
			/*
			echo "<tr>";
  			echo "<td>" . $row['id'] . "</td>";
  			echo "<td>" . $row['abstraction'] . "</td>";
  			echo "<td>" . $row['date'] . "</td>"; 	
			echo "</tr>";
			echo "<br/>";
			echo "</table>";*/
			echo "<br/> <br/>";
			echo "<p>No Pipelines Information at the moment <style> color='red'</style></p>";

			echo "<p>No Services Information at the moment <style> color='red'</style></p>";
			echo "<br/> <br/>";
			/*Display Query*/
			echo "<b> Responsible Query </b>";
			echo "<textarea rows='15' cols='97'>".$row['query']. "</textarea>";
			$count++;
		}
		
		

		if($count==1)
		{
			echo "None Results Found<br/>";
		}
		
		
		
		
	?>
	</div>

	<div id="middle_box">

<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>
