	<!--Import Header with VisKo logo-->
<?php
	require_once("privHeader.inc");
?>
     
<!-- start visko-->
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />


<div id="wrapper">
<div id="main_container">
  <div>
	<br>
	<br>  
	<!-- Import Navigation side bar for privileged user-->
	      
<?php 
 require_once("privNavigation.inc");
?>

<!--Body of service details page-->

 <?php
 
  //Read information from database
  $db_selection= mysql_select_db($database, $connection);
  $sql = mysql_query("SELECT * FROM Services WHERE ID = '" . $_POST["indexS"] . "' ;");
  $row = mysql_fetch_array($sql);
  
   
  echo "<div id='middle_box'>";
  echo "<div class='middle_box_content'>";
    
  echo "<b><font size='5' color='#050834'> Service " . $row['name'] . " Details</font></b>";
  echo "<br><br><font size='3'>- Registered by User: " . $row['email'] . "</font>";
  echo "<br><font size='3'>- Registered on Date: " . $row['date'] . "</font></div><hr></div>";
  
  echo "<div id='middle_box'><div class='middle_box_content'>";
    
  echo "<b><font size='3' color='#050834'>Interface Details:</font></b>";
  echo "<br><br><font size='3'>- Input Format: " . $row['sourceformat'] . "</font>";
  echo "<br><font size='3'>- Output Format: " . $row['targetformat'] . "</font>";
  echo "<br><br><font size='3'>- Input Type: " . $row['sourcetype'] . "</font>";
  echo "<br><font size='3'>- Output Type: " . $row['targettype'] . "</font>";
  echo "<br><br><font size='3'>- Supported Abstraction: " . $row['abstraction'] . "</font><hr>";

  echo "</div>";
  
  echo "<font size='3'><b>Errors:</b></font><br><br>";
  echo "<font size='3'><b>- Number of erroneous accesses: 0</b></font><br><br>";
  ///-------------------------UNITL ASDSDAF
 
  		echo "<table border='6'    width='100%'   cellpadding='4' cellspacing='3'>
  		<tr>
		</tr>
   		<tr>
		<th>&nbsp;#</th>
		<th>Date Accessed</th>
		<th>Error Type</th>
		<th>From Pipeline ID</th>
		<th>With Input Data URL</th>
		<th>Executed By User</th>
		</tr>";	
		
		/*while ($row = mysql_fetch_array($sql))
		{
		
			echo "<tr>";
  			echo "<td>&nbsp;" . $index . "</td>";
  			echo "<td>" . $row['id'] . "</td>";
  			echo "<td>" . $row['user'] . "</td>";
			echo "<td>" . $row['date'] . "</td>"; 	
			echo "<td>".$row['error']." <input type='hidden' id='".$index."' value='".$row['query']."'></td>";
			echo "<td><input type='button'  class='btn btn-primary' name='viewd' id='viewd' value='View Details' style='width:100px;' onclick=\"displayQuery('".$index."' )\" </td>"; 		
			echo "</tr>";
		
			$index++;
		}*/
		
		echo "</table><br/> <br/>";	
  ?>		

  </div>

</div>
</div>

 <div id="middle_box">

<!-- Import footer end of visko-->
<?php
	require_once("footer.inc"); 
?>
