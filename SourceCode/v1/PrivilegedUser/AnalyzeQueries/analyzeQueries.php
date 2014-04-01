<!--
@Author: Maria Cortes
@Date: March 26, 2014
@Description: This file creates a bar graph based on the query error found in the database
-->
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

	<!-- 
	Connect to the database based to do a series of database calls through php
	Database calls are done by writing a series of queries which give resutls to obtain most common: Abstraction, Viewer Set, Source Format, Target Format	-->

	<?php

		
		$db_selection= mysql_select_db($database, $connection);	
		/*
		Select all queries in database and count them to obtain the total of queries executed in the system
		*/
		$query="select * from Query";
		$sql = mysql_query($query);		
		$count1=mysql_num_rows($sql);
		
		echo "<h5> Total Number of Queries Executed:<b> ".$count1." </b><h5><br/>";

		/*
		Select  all abstractions in Query table in database and count them to obtain the most common Abstraction executed in the system
		*/
		$result = mysql_query("SELECT  abstraction, COUNT(abstraction) from Query where abstraction != '' group by abstraction order by abstraction limit 1");
		$row2 = mysql_fetch_assoc($result); 
        
		echo "<h5> Most Popular Abstraction Requested:<b>  ".$row2['abstraction']." </b> <h5>";

		/*
		Select all viewer sets in Query table in database and count them to obtain the most common viewer set executed in the system
		*/

		$result1 = mysql_query("SELECT  viewerset, COUNT(viewerset) from Query where viewerset != '' group by viewerset order by viewerset limit 1");
		$row1 = mysql_fetch_assoc($result1); 
		echo "<h5> Most Popular Viewer Set Targeted:<b>  ".$row1['viewerset']." </b> <h5><br/>";  

		/*
		Select  all source format in Query table in database and count them to obtain the most common source format executed in the system
		*/
		$result3 = mysql_query("SELECT  sourceformat, COUNT(sourceformat) from Query where sourceformat != '' group by sourceformat order by sourceformat limit 1");
		$row3 = mysql_fetch_assoc($result3); 
		echo "<h5> Most Popular Input Format:<b>  ".$row3['sourceformat']." </b> <h5>"; 
		
		/*
		Select all target fomats in Query table in database and count them to obtain the most common target format executed in the system
		*/
		
		$result4 = mysql_query("SELECT  targetformat, COUNT(targetformat) from Query where targetformat != '' group by targetformat order by targetformat limit 1");
		$row4 = mysql_fetch_assoc($result4);   
		echo "<h5>Most Popular Output Format:<b>  ".$row4['targetformat']."</b>  <h5><br/>";   
	?>	

	<!-- 
	include the bar.php file to print the graph based on errors in the queries
	-->

	<h4> <b>  Frequency of Errors</b> </h4>
	<br/>
	<?php
		
		include_once("bar.php");
	?>


	<h4> <b>  Most Popular Query</b> </h4>
	<br/>

	<?php
		/*
		Select all Queries in Query table in database and count them to obtain the most common Query executed in the system
		*/

		$result1 = mysql_query("SELECT  query, COUNT(query) from Query where query != '' group by query order by query limit 1");
		$row1 = mysql_fetch_assoc($result1); 
		echo "<textarea rows='10' cols='97'>".$row1['query']. "</textarea>";

	?>
    
  </div>


<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>

