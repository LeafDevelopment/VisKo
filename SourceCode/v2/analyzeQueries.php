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
	<h4> <b>  Frequency of Query Constructs Used</b> </h4>

	<?php
		$db_selection= mysql_select_db($database, $connection);	
		$query="select * from Query";
		$sql = mysql_query($query);		
		$count1=mysql_num_rows($sql);
		
		echo "<h5> Total Number of Queries Executed:<b> ".$count1." </b><h5><br/>";

		$result = mysql_query("SELECT  abstraction, COUNT(*) as count from Query where abstraction != '' group by abstraction order by count DESC limit 1");
		$row2 = mysql_fetch_assoc($result); 
        
		echo "<h5> Most Popular Abstraction Requested:<b>  ".$row2['abstraction']." </b> <h5>";

		
		$result1 = mysql_query("SELECT  viewerset, COUNT(*) as count from Query where viewerset != '' group by viewerset order by count DESC limit 1");
		$row1 = mysql_fetch_assoc($result1); 
		echo "<h5> Most Popular Viewer Set Targeted:<b>  ".$row1['viewerset']." </b> <h5><br/>";  

		
		$result3 = mysql_query("SELECT  sourceformat, COUNT(*) as count from Query where sourceformat != '' group by sourceformat order by count DESC limit 1");
		$row3 = mysql_fetch_assoc($result3); 
		echo "<h5> Most Popular Input Format:<b>  ".$row3['sourceformat']." </b> <h5>"; 
		
		$result4 = mysql_query("SELECT  targetformat, COUNT(*) as count from Query where targetformat != '' group by targetformat order by count DESC limit 1");
		$row4 = mysql_fetch_assoc($result4);   
		echo "<h5>Most Popular Output Format:<b>  ".$row4['targetformat']."</b>  <h5><br/>";   
	?>	


	<h4> <b>  Frequency of Errors</b> </h4>
	<br/>
	<?php
		include_once("bar.php");
	?>


	<h4> <b>  Most Popular Query</b> </h4>
	<br/>

	<?php
		$result1 = mysql_query("SELECT  query, COUNT(query) as count from Query where query != '' group by query order by count DESC limit 1");
		$row1 = mysql_fetch_assoc($result1); 
		echo "<textarea rows='10' cols='97'>".$row1['query']. "</textarea>";

	?>
    
  </div>


<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>

