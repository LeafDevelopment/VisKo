	<!--Import Header with VisKo logo-->
<?php
	require_once("privHeader.inc");
?>
<!-- start visko-->
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />

	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("privNavigation.inc");
	?>
	<br/> <br/>

	<!-- Middle Content--> 
     <div id="middle_box">
    <div class="middle_box_content">    	
	<h4> <b>  Frequency of Pipelines Constructs Used</b> </h4>

	<?php
		$db_selection= mysql_select_db($database, $connection);	
		$query="select * from Pipeline";
		$sql = mysql_query($query);		
		$count1=mysql_num_rows($sql);
		
		echo "<h5> Total Number of Pipelines Executed:<b> ".$count1." </b><h5><br/>";

		$result = mysql_query("SELECT  abstraction, COUNT(*) as count from Pipeline where abstraction != '' group by abstraction order by count DESC limit 1");
		$row2 = mysql_fetch_assoc($result); 
        
		echo "<h5> Most Popular Abstraction Requested:<b>  ".$row2['abstraction']." </b> <h5>";

		$result5 = mysql_query("SELECT  viewerset, COUNT(*) as count from Pipeline where viewerset != '' group by viewerset order by count DESC limit 1");
		$row5 = mysql_fetch_assoc($result5); 
		echo "<h5> Most Popular Viewer Set Targeted:<b>  ".$row5['viewerset']." </b> <h5><br/>";  

		
		$result3 = mysql_query("SELECT  sourceformat, COUNT(*) as count from Pipeline where sourceformat != '' group by sourceformat order by count DESC limit 1");
		$row3 = mysql_fetch_assoc($result3); 
		echo "<h5> Most Popular Input Format:<b>  ".$row3['sourceformat']." </b> <h5>"; 
		
		$result4 = mysql_query("SELECT  targetformat, COUNT(*) as count from Pipeline where targetformat != '' group by targetformat order by count DESC limit 1");
		$row4 = mysql_fetch_assoc($result4);   
		echo "<h5>Most Popular Output Format:<b>  ".$row4['targetformat']."</b>  <h5><br/>";   
	?>	


	<h4> <b>  Frequency of Errors</b> </h4>
	<br/>
	<?php
		include_once("barPipeline.php");
	?>


	<h4> <b>  Most Popular Pipeline</b> </h4>
	<br/>

	<?php
		$result1 = mysql_query("SELECT  *, COUNT(targetformat) as count from Pipeline where targetformat != '' group by targetformat order by count DESC limit 1");
		$row1 = mysql_fetch_assoc($result1); 
	?>
	
	<table border="1" style="width:500px"><tr><td>ID</td><td>Abstraction</td> <td>Output Format</td></tr>
	<tr>
	<td><?php echo $row1['id']; ?> </td>
	<td><?php echo $row1['abstraction']; ?> </td>
	 <td><?php echo $row1['targetformat']; ?> </td>
	 </tr>
	 </table>

    
  </div>


<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>

