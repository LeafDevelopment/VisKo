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
	var query="SELECT * FROM Query WHERE user='<?php echo $_SESSION['email']; ?>'";

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

	<table style="width:100%">
	  <col width="100">
	  <col width="500">
	  <col width="500">
	  <col width="500">
	  <col width="500">
   	  <tr>
	    <td>
              <h5>Abstraction</h5>
            </td>
	    <td>
	    </td>
	    <td>
		<h5>Start Date</h5> 
     	    </td>
 	    <td>
	    </td>
   	    <td>
		 <h5>End Date</h5> 
	    </td>
      	</tr>
 	<tr><td>
	<input type="hidden" id="abs1" name="abs1" >
   	 <select name="abs" id="abs" style="width: 250px">
		<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT abstraction FROM Query WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Abstraction</option>";	
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"abs\">" . $row['abstraction'] . "</option>";
	}
	?> </select>
	<!--Display Calendar-->
	</td>
	<td>
	</td>
	<td>     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    	       <div id="datetimepicker1" class="input-append date">
      	        <input type="text" width="200" onclick="$('#datetimepicker1').datetimepicker('show')"></input>
      	        <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      	        </span>
    	      </div>
   	    </td>
	<td>
	</td>
   	    <td>
		   &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp;
      	      <div id="datetimepicker2" class="input-append date">
     	        <input type="text" width="200" onclick="$('#datetimepicker2').datetimepicker('show');"></input>
     	        <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>    	        </span>
   	      </div>
   	    </td>
	</tr>
	<tr><td>
	<!--End Calendar-->

	<h5>Input URL</h5> 
	</td></tr>
	<tr><td>
	<input type="hidden" id="url1" name="url1" >
   	 <select name="url" id="url"  style="width: 250px">
	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT url  FROM Query WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any URL</option>";	
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"url\">" . $row['url'] . "</option>";
	}
	?> 
        </select>
	</td></tr>
  	<tr><td>
	<h5>Viewer Set<h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="vs1" name="vs1" >
   	 <select name="set" id="set" style="width:250px">
       	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT viewerset  FROM Query WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Viewer Set</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"vs\">" . $row['viewerset'] . "</option>";
	}
	?>  </select>
	</td></tr>
	<tr><td>
	<h5>Source Format</h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="sf1" name="sf1" >
   	 <select name="format" id="format" style="width: 250px">
	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT sourceformat  FROM Query WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Source Format</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"sf\">" . $row['sourceformat'] . "</option>";
	}
	?> 
         </select>
	</td></tr>
	<tr><td>
	<h5>Source Type</h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="st1" name="st1" >
   	 <select name="type" id="type" style="width: 250px">
       	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT sourcetype  FROM Query WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Source Type</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"st\">" . $row['sourcetype'] . "</option>";
	}
	?>  
	</select>
	</td></tr>
	<tr><td>
	<h5>Target Type</h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="tt1" name="tt1" >
   	 <select name="ttype" id="ttype" style="width: 250px">
       	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT targettype  FROM Query WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Target Type</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"tt\">" . $row['targettype'] . "</option>";
	}
	?>   </select>
	</td></tr>
	<tr><td>
	<h5>Target Format</h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="tf1" name="tf1" >
   	 <select name="tformat" id="tformat" style="width: 250px">
        	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT targetformat  FROM Query WHERE user='".$_SESSION['email']."';");
	echo "<option value=\"abs\">Any Target Format</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"tf\">" . $row['targetformat'] . "</option>";
	}
	?> 
	 </select><br/><br/>
	</td></tr>
	<tr><td>
	<input type="submit"  class="btn btn-primary" value="Search" style="width:100px;" onclick="setfields()" />
	</td></tr>
	</table>
	<input type="hidden" id="qry" name="qry" value=""/>
	</form>

	<hr/>	
	
	<?php
	/* send query to database, and display results base on user selections */
	
	if(isset($_POST['qry']))
	{
	
		echo "<b>Results</b><br/><br/>";
		$db_selection= mysql_select_db($database, $connection);
		$sql = mysql_query($_POST['qry']);
		$count = 1;
	
		echo "<h5><b> Select an image to view details:</b></h5>";
		
		echo "<table><tr>";
		while ($row = mysql_fetch_array($sql))
		{
			echo "<td><a href='viewDetails.php?image='noimage.png'><img src='http://cs4311.cs.utep.edu/team2/Visualizations/noimage.png' style='width:200px; height:100px'></a></td>";
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
	<!--Calendar javascript methods to display calendar--> 
   	 <script type="text/javascript">
   	   $('#datetimepicker1').datetimepicker({
        	format: 'dd/MM/yyyy',
        	pickTime: false,
        	language: 'en'
      		});
     	 $('#datetimepicker2').datetimepicker({
        	format: 'dd/MM/yyyy',
        	pickTime: false,
       		language: 'en'
      	});

<?php
	if(!isset($_POST['qry']))	
	{
     		echo "$('#datetimepicker1').datetimepicker('show');";
  	   	echo "$('#datetimepicker2').datetimepicker('show');";
	}
?>
    	</script>

<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>
