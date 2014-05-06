	<!--Import Header with VisKo logo-->
<?php
	require_once("privHeader.inc");
?>
     

	<head>
     

<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />

<!--Funtion set fields, gets input from all the dropdown menus, and puts the into a query
*To send it back to the database, and get search results*/-->
<script>
function setfields()
{
	var query="SELECT * FROM Services";

	var used=false;
	var temp = "";
	var y = "";
	var x = document.getElementById("abs").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("abs").options;
		document.getElementById("abs1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" name='"+y[x].text+"'");
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
		temp = query.concat(where+" abstraction='"+y[x].text+"'");
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
		temp = query.concat(where+" sourceformat='"+y[x].text+"'");
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
		temp = query.concat(where+" sourcetype='"+y[x].text+"'");
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
		temp = query.concat(where+" targetformat='"+y[x].text+"'");
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
		temp = query.concat(where+" error='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}
	x = document.getElementById("format0").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("format0").options;
		document.getElementById("stat").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" status='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}

	/*Adding intervals of start and end date*/
	x = document.getElementById("sDate").value;
	
	if(x != "")
	{
		//Format date	
		var newDate1 = x.substring(6,10) + "-" + x.substring(3,5) + "-" + x.substring(0,2);
		
		var where = (used ? " AND" : " WHERE");
		
		//Add parameters to query
		temp = query.concat(where + " date >= '" + newDate1 +"'");
		used=true;
		query = temp;
		temp="";
	}	
	
	x = document.getElementById("eDate").value;
	if(x != "")
	{		
		//Format date
		var newDate2 = x.substring(6,10) + "-" + x.substring(3,5) + "-" + x.substring(0,2);
		
		var where = (used ? " AND" : " WHERE");
		
		//Add parameters to query
		temp = query.concat(where + " date <= '" + newDate2 +"'");
		used=true;
		query = temp;
		temp="";
	}	


	document.getElementById("qry").value=query+";";

}

	
	function displaySerDetails(id)
	{

		//document.getElementById('displayQ').value = "SERVICESSS";
		//document.getElementById('displayQ').value = document.getElementById(id).value;		
		//document.getElementById('qd').style.display="block";
	}

</script>

	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("privNavigation.inc");
	?>
	</head>

<br/> <br/>

	<!-- Middle Content--> 
    <div id="middle_box">
    	
	  <p> <b> Service Search Criteria</b> </p>
	<br/>
       	<!---Dropdown Lists--> 

	<form action="searchServices.php" method="post">

	<table style="width:100%">
	  <col width="100">
	  <col width="500">
	  <col width="500">
	  <col width="500">
	  <col width="500">
   	  <tr>
	    <td>
              <h5>Service Type</h5>
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
	$sql = mysql_query("SELECT DISTINCT name FROM Services WHERE name!='' ;");
	echo "<option value=\"abs\">Any Type</option>";	
	while ($row = mysql_fetch_array($sql)){
		echo "<option value=\"abs\">" . $row['name'] . "</option>";
	}
	?> </select>
	<!--Display Calendar-->
	</td>
	<td>
	</td>
	<td>     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    	      <div id="datetimepicker1" class="input-append date">
      	        <input type="text" id="sDate" width="200" onclick="$('#datetimepicker1').datetimepicker('show')"></input>
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
     	        <input type="text" id="eDate" width="200" onclick="$('#datetimepicker2').datetimepicker('show');"></input>
     	        <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
    	        </span>
   	      </div>
   	    </td>
	</tr>
	<tr><td>
	<!--End Calendar-->

	<h5>Abstraction</h5> 
	</td></tr>
	<tr><td>
	<input type="hidden" id="url1" name="url1" >
   	 <select name="url" id="url"  style="width: 250px">
	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT abstraction  FROM Services WHERE abstraction!='' ;");
	echo "<option value=\"abs\">Any Abstraction</option>";	
	while ($row = mysql_fetch_array($sql)){
		echo "<option value=\"url\">" . $row['abstraction'] . "</option>";
	}
	?> 
        </select>
	</td></tr>
  	<tr><td>
	<h5>Source Format</h5></td></tr>
	<tr><td>
	<input type="hidden" id="vs1" name="vs1" >
   	 <select name="set" id="set" style="width:250px">
       	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT sourceformat FROM Services  WHERE sourceformat!='' ;");
	echo "<option value=\"abs\">Any Source Format</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"vs\">" . $row['sourceformat'] . "</option>";
	}
	?>  </select>
	</td></tr>
	<tr><td>
	<h5>Source Type</h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="sf1" name="sf1" >
   	 <select name="format" id="format" style="width: 250px">
	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT sourcetype FROM Services WHERE sourcetype!='' ;");
	echo "<option value=\"abs\">Any Source Type</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"sf\">" . $row['sourcetype'] . "</option>";
	}
	?> 
         </select>
	</td></tr>
	<tr><td>
	<h5>Target Format</h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="st1" name="st1" >
   	 <select name="type" id="type" style="width: 250px">
       	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT targetformat  FROM Services  WHERE targetformat!='' ;");
	echo "<option value=\"abs\">Any Target Format</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"st\">" . $row['targetformat'] . "</option>";
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
	$sql = mysql_query("SELECT DISTINCT targettype  FROM Services  WHERE targettype!='' ;");
	echo "<option value=\"abs\">Any Target Type</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"tt\">" . $row['targettype'] . "</option>";
	}
	?>   </select>
	</td></tr>
	<tr><td>
	<h5>Error</h5>
	</td></tr>
	<tr><td style="height: 18px">
	<input type="hidden" id="tf1" name="tf1" >
   	 <select name="tformat" id="tformat" style="width: 250px">
        	<?php 
	/* Select database to populate dropdown*/
	$sql = mysql_query("SELECT DISTINCT error  FROM Services WHERE error!='' ;");
	echo "<option value=\"abs\">Any Error</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"tf\">" . $row['error'] . "</option>";
	}
	?> 
	 </select><br/>
	</td></tr>
		<tr>
			<td>
	<h5>Status</h5>
	</td>
		</tr>
		<tr>
			<td>
   	 <select name="format0" id="format0" style="width: 250px">
	<?php 
	/* Select database to populate dropdown*/
	$db_selection= mysql_select_db($database, $connection);
	$sql = mysql_query("SELECT DISTINCT status FROM Services WHERE status!='' ;");
	echo "<option value=\"abs\">Any Status</option>";
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"stat\">" . $row['status'] . "</option>";
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
		
		
		//Testing purposes echo $query."<br/>";
	
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

			echo "<br/><br/><table border='6'    width='100%'   cellpadding='4' cellspacing='3'>
  				<tr>
  				</tr>
   				<tr>
				<th>&nbsp;#</th>
				<th>Name</th>
				<th>Registered by User</th>
			 	<th>Date</th>
				<th>Status</th>
				<th>Error</th>

				</tr>";	
			while ($row = mysql_fetch_array($sql))
			{
		
				echo "<tr>";
  				echo "<td>&nbsp;" . $index . "</td>";
  				echo "<td>" . $row['name'] . "</td>";
  				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['date'] . "</td>"; 
				echo "<td>" . $row['status'] . "</td>";
				echo "<td>".$row['error']." <input type='hidden'></td>";
				echo "<td><form action=\"viewServiceDetails.php\" method=\"post\"><input type='submit'  class='btn btn-primary' name='viewd' id='viewd' value='View Details' style='width:100px;'> <input type='hidden' name='indexS' value = '" . $index . "'> </form></td>"; 	
				echo "<td><button class='btn btn-primary' id='".$index."' name='".$row['ID']."' style='width:115px; align:center;'>".$row['status']."</button></td>"; 	
				echo "</tr>";
		
				$index++;
			}
		echo "</table><br/> <br/>";		
		}
	}

?>
	<!--Calendar javascript methods to display calendar--> 
   	 <script type="text/javascript">

		$(document).ready(function() 
	{
		$("button").click(function(event) 
		{
	        	var id = event.target.id;
			var email = event.target.name;
			var value = $(event.target).text();

			$(event.target).text('Updating...');
			$.post("updateServices.php", 
			{ 
				name: email,
				is: value
			},
			function(data,status)
			{
				//alert("Email: " + email + "\nData: " + data + "\nStatus: " + status);
				$(event.target).text(data);
			});
		});
	});
		

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
