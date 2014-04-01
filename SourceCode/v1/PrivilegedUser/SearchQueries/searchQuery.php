<!--
@Author: Maria Cortes
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
-->

	<!--Import Header with VisKo logo-->
<?php
	require_once("privHeader.inc");
?>
     

<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />
<link rel="stylesheet" type="text/css" href="datepicker.css" media="screen" />
<script src="bootstrap-datepicker.js"></script>


<!--
The setfields method gets the element chosen in the dropdown/input text fields
based on the element(s) creates a string:
if user did not select any dropdown menu, or inputted text in the text fields the query string will be return as: 'Select * from tableName
Else if a selection was made or field was filled, the method will return a query based on the user's selections
-->
<script>
function setfields()
{
	var query="SELECT * FROM Query";

	var used=false;
	var temp = "";
	var y = "";
	var x = document.getElementById("abs").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("abs").options;
		document.getElementById("abs1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" abstraction='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}	

	x = document.getElementById("url").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("url").options;
		document.getElementById("url1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" url='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}
	x = document.getElementById("set").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("set").options;
		document.getElementById("vs1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" viewerset='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}
	x = document.getElementById("format").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("format").options;
		document.getElementById("sf1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" sourceformat='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}
	x = document.getElementById("type").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("type").options;
		document.getElementById("st1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" sourcetype='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}
	x = document.getElementById("ttype").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("ttype").options;
		document.getElementById("tt1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" targettype='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}
	x = document.getElementById("tformat").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("tformat").options;
		document.getElementById("tf1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" targetformat='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}


	document.getElementById("qry").value=query+";";

}

	
	function displayQuery(id)
	{

		document.getElementById('displayQ').value = document.getElementById(id).value;		
		document.getElementById('qd').style.display="block";
	}

</script>

	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("privNavigation.inc");
	?>
<br/> <br/>

	<!-- Middle Content--> 
    <div id="middle_box">
    	
	  <p> <b> Query Search Criteria</b> </p>
	<br/>
       	<!---Dropdown Lists--> 

	<form action="searchQuery.php" method="post">

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
	$sql = mysql_query("SELECT DISTINCT abstraction FROM Query WHERE abstraction!='' ;");
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
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
    	        </span>
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
	$sql = mysql_query("SELECT DISTINCT url  FROM Query WHERE url!='' ;");
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
	$sql = mysql_query("SELECT DISTINCT viewerset  FROM Query  WHERE viewerset!='' ;");
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
	$sql = mysql_query("SELECT DISTINCT sourceformat  FROM Query  WHERE sourceformat!='' ;");
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
	$sql = mysql_query("SELECT DISTINCT sourcetype  FROM Query  WHERE sourcetype!='' ;");
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
	$sql = mysql_query("SELECT DISTINCT targettype  FROM Query  WHERE targettype!='' ;");
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
	$sql = mysql_query("SELECT DISTINCT targetformat  FROM Query  WHERE targetformat!='' ;");
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
	/* send query to database, and display results base on user selections 
	IF results were found display a table with results
	If user clicks 'view details' button display query details based on chosen query 
	else if no results were found display 'No results found'
	*/
	if(isset($_POST['qry']))
	{
		$query=$_POST['qry'];
		//Testing purposes echo $query."<br/>";
	
		$db_selection= mysql_select_db($database, $connection);	
		$sql = mysql_query($_POST['qry']);
		$index = 1;
		
		$count1=mysql_num_rows($sql);
	 	
		if($count1==0)
			echo "No Results Found<br/>";
		else
		{
			if($count1==1)
				echo "<b>1 Result Found</b>";
			elseif($count1>1)
				echo "<b>".$count1." Results Found</b>";
			/* Create table base on results*/
			echo "<br/><br/><table border='6'    width='100%'   cellpadding='4' cellspacing='3'>
  				<tr>
  				</tr>
   				<tr>
				<th>&nbsp;#</th>
				<th>ID</th>
				<th>Submitted By User</th>
				<th>Date Executed</th>
			 	<th>Error</th>
				<th>Details</th>

				</tr>";	
			while ($row = mysql_fetch_array($sql))
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
			}
		echo "</table><br/> <br/>";
		echo "<p id='qd' style='display:none'><b>Query Details</b><br/><textarea id='displayQ' rows='15' cols='97'> </textarea></p>";
		
		}
	}

?>
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
