	<!--Import Header with VisKo logo-->
<?php
	require_once("regHeader.inc");
?>
     

<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />
<link rel="stylesheet" type="text/css" href="datepicker.css" media="screen" />
<script src="bootstrap-datepicker.js"></script>

<!--Funtion set fields, gets input from all the dropdown menus, and puts the into a query
*To send it back to the database, and get search results*/-->
<script>
function setfields()
{
	var query="SELECT * FROM History WHERE user='<?php echo $_SESSION['email']; ?>'";

	var temp = "";
	var y = "";
	var x = document.getElementById("abs").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("abs").options;
		document.getElementById("abs1").value=y[x].text;
		temp = query.concat(" AND abstraction='"+y[x].text+"'");
		query = temp;
		temp="";
	}	

	x = document.getElementById("url").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("url").options;
		document.getElementById("url1").value=y[x].text;
		temp = query.concat(" AND url='"+y[x].text+"'");
		query = temp;
		temp="";
	}
	x = document.getElementById("set").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("set").options;
		document.getElementById("vs1").value=y[x].text;
		temp = query.concat(" AND viewerset='"+y[x].text+"'");
		query = temp;
		temp="";
	}
	x = document.getElementById("format").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("format").options;
		document.getElementById("sf1").value=y[x].text;
		temp = query.concat(" AND sourceformat='"+y[x].text+"'");
		query = temp;
		temp="";
	}
	x = document.getElementById("type").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("type").options;
		document.getElementById("st1").value=y[x].text;
		temp = query.concat(" AND sourcetype='"+y[x].text+"'");
		query = temp;
		temp="";
	}
	x = document.getElementById("ttype").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("ttype").options;
		document.getElementById("tt1").value=y[x].text;
		temp = query.concat(" AND targettype='"+y[x].text+"'");
		query = temp;
		temp="";
	}
	x = document.getElementById("tformat").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("tformat").options;
		document.getElementById("tf1").value=y[x].text;
		temp = query.concat(" AND targetformat='"+y[x].text+"'");
		query = temp;
		temp="";
	}


	document.getElementById("qry").value=query+";";
}
</script>

	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("regNavigation.inc");
	?>
<br/> <br/>

	<!-- Middle Content--> 
    <div id="middle_box">
    	
	  <p> <b> Visualization Search Criteria</b> </p>
	<br/>
       	<!---Dropdown Lists--> 

	<form action="specifyCriteria.php" method="post">
   	 <h5>Abstraction</h5>
	<input type="hidden" id="abs1" name="abs1" >
   	 <select name="abs" id="abs" style="width: 250px">
		<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT abstraction FROM History WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Abstraction</option>";	
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"abs\">" . $row['abstraction'] . "</option>";
	}
	?> </select> </p>
	
	 <h5>Input URL</h5> 
	<input type="hidden" id="url1" name="url1" >
   	 <select name="url" id="url"  style="width: 250px">
	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT url  FROM History WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any URL</option>";	
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"url\">" . $row['url'] . "</option>";
	}
	?> 
         </select></p>
  

	 <h5>Viewer Set<h5>
	<input type="hidden" id="vs1" name="vs1" >
   	 <select name="set" id="set" style="width:250px">
       	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT viewerset  FROM History WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Viewer Set</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"vs\">" . $row['viewerset'] . "</option>";
	}
	?>  </select> </p>

	 <h5>Source Format</h5>
	<input type="hidden" id="sf1" name="sf1" >
   	 <select name="format" id="format" style="width: 250px">
	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT sourceformat  FROM History WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Source Format</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"sf\">" . $row['sourceformat'] . "</option>";
	}
	?> 
         </select></p>

	<h5>Source Type</h5>
	<input type="hidden" id="st1" name="st1" >
   	 <select name="type" id="type" style="width: 250px">
       	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT sourcetype  FROM History WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Source Type</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"st\">" . $row['sourcetype'] . "</option>";
	}
	?>  
	</select> </p>


	<h5>Target Type</h5>
	<input type="hidden" id="tt1" name="tt1" >
   	 <select name="ttype" id="ttype" style="width: 250px">
       	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT targettype  FROM History WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Target Type</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"tt\">" . $row['targettype'] . "</option>";
	}
	?>   </select> </p>


	<h5>Target Format</h5>
	<input type="hidden" id="tf1" name="tf1" >
   	 <select name="tformat" id="tformat" style="width: 250px">
        	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT targetformat  FROM History WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Target Format</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"tf\">" . $row['targetformat'] . "</option>";
	}
	?> 
	 </select> </p>

	
 	 <p><input type="submit"  class="btn btn-primary" value="Search" style="width:100px;" onclick="setfields()" /></p>
	
	<input type="hidden" id="qry" name="qry" value=""/>
	</form>

	<hr/>	
	
	<?php
	/* Select database to check dropdown menus */
	
	if(isset($_POST['qry']))
	{
	
		header("Content-type: image/jpeg");
		echo "<b>Results</b><br/><br/>";
		$db_selection= mysql_select_db($database, $connection);
		$sql = mysql_query($_POST['qry']);
		$count = 1;
		
		echo "<table><tr>";
		while ($row = mysql_fetch_array($sql))
		{
			echo "<td><a href='viewDetails.php?id=".$row["id"]."'><img src=showimage.php?id=".$row["id"]." style='width:200px; height:100px'></a></td>";
			if($count % 3==0)
			{
				echo "</tr><tr>";
			}
			$count++;
		}
		echo "</tr></table>";
		if($count==1)
		{
			echo "None Found<br/>";
		}
	}
	?>
	
	</div>

	<div id="middle_box">

<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>