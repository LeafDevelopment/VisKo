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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<!--
The setfields method gets the element chosen in the dropdown/input text fields
based on the element(s) creates a string:
if user did not select any dropdown menu, or inputted text in the text fields the query string will be return as: 'Select * from tableName
Else if a selection was made or field was filled, the method will return a query based on the user's selections
-->
<script>
function setfields()
{	
	/*create a string 'query' to return as a query string that will be sent to the database*/
	var query="SELECT * FROM User";

	/*Create variables*/
	var used=false;
	var temp = "";
	var y = "";

	var x = document.getElementById("org").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("org").options;
		document.getElementById("org1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" organization='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}	

	x = document.getElementById("acc").selectedIndex;
	if(x!=0)
	{
		y = document.getElementById("acc").options;
		document.getElementById("acc1").value=y[x].text;
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" status='"+y[x].text+"'");
		used=true;
		query = temp;
		temp="";
	}
	x = document.getElementById("email").value;
	if(x!="")
	{
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" email='"+x+"'");
		used=true;
		query = temp;
		temp="";	
	}
	x = document.getElementById("fname").value;
	if(x!="")
	{
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" fname='"+x+"'");
		used=true;
		query = temp;
		temp="";	
	}
	x = document.getElementById("lname").value;
	if(x!="")
	{
		var where = (used ? " AND" : " WHERE");
		temp = query.concat(where+" lname='"+x+"'");
		used=true;
		query = temp;
		temp="";	
	}


	
	/* return final string */
	document.getElementById("qry").value=query+";";
}
</script>

	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("privNavigation.inc");
	?>
	<br/> <br/>

	<!-- Middle Content--> 
    <div id="middle_box">
    	
	<p> <b>  User Search Criteria</b> </p>
	<br/>
       	<!---Dropdown Lists--> 

	<form action="searchUsers.php" method="post">

	<table style="width:100%">
   	  <tr>
	    <td>
              <h5>Organization/Affiliation</h5>
            </td>
	  	<tr><td>
	<input  type="hidden" id="org1" name="org1" >
   	 <select name="org" id="org" style="width: 250px">
		<?php 
	/* Select database to populate dropdown*/
		$db_selection= mysql_select_db($database, $connection);
		$sql = mysql_query("SELECT DISTINCT organization FROM User;");
		echo "<option value=\"org\">Any Organization/Affiliation</option>";	
		while ($row = mysql_fetch_array($sql)){
		echo "<option value=\"org\">" . $row['organization'] . "</option>";
	}
	?> </select>
	<h5>Account Status</h5> 
	</td></tr>
	<tr><td>
	<input type="hidden" id="acc1" name="acc1" >
   	<select name="acc" id="acc"  style="width: 250px">
	<?php 
		/* Select database to populate dropdown*/
		$db_selection= mysql_select_db($database, $connection);
		$sql = mysql_query("SELECT DISTINCT status  FROM User;");
		echo "<option value=\"acc\">Any Status</option>";	
		while ($row = mysql_fetch_array($sql)){
		echo "<option value=\"acc\">" . $row['status'] . "</option>";
	}
	?> 
	<!--Form for search User--> 
        </select>
	</td></tr>
  	<tr><td>
	<h5>User Email<h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="email1" name="email1" >
   	<input type="email" class="form-control" name="email" id="email" style="width:250px" placeholder="Email">
	<?php 
	if (isset($_POST['email']))
		$sql=mysql_query("");	
	?>
       	</td></tr>
	<tr><td>
	<h5>First Name</h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="fname1" name="fname1" >
   	<input type="text" class="form-control" name="fname" id="fname" style="width:250px" placeholder="First Name">
	</td></tr>
	<tr><td>
	<h5>Last Name</h5>
	</td></tr>
	<tr><td>
	<input type="hidden" id="lname1" name="lname1" >
	<input type="text" class="form-control" name="lname" id="lname" style="width:250px" placeholder="Last Name">
	</td></tr>
	<tr><td>
	</td></tr>
	<tr><td>
	<input type="submit"  class="btn btn-primary" value="Search" style="width:100px;" onclick="setfields()" />
	</td></tr>
	</table>
	<input type="hidden" id="qry" name="qry" value=""/>
	</form>

	<hr/>	

		
<?php
	/* 
	Use php POST method to get 'qry' which is the query based on user selection
	Send query to database, and display results base on user selections 
	IF results were found display a table with results
	If user clicks toggle button, change user status
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
			/*Create a table base on database results*/
			echo "<br/><br/><table border='6'    width='100%'   cellpadding='4' cellspacing='3'>
  				<tr>
  				</tr>
   				<tr>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
			 	<th>Affiliation</th>
				<th>Account Status</th>

				</tr>";	
			while ($row = mysql_fetch_array($sql))
			{
		
				echo "<tr>";
    				echo "<td>" . $row['email'] . "</td>";
  				echo "<td>" . $row['fname'] . "</td>";
				echo "<td>" . $row['lname'] . "</td>"; 	
				echo "<td>".$row['organization']."</td>";
				echo "<td><form action='searchUsers.php' method='post'> <input type='button' class='btn btn-primary' id='".$row['email']."' name='".$row['email']."' value='".$row['status']."'style='width:115px; align:center;' onclick=\"toggle('".$row['email']."' )\"></form> </td>"; 		
				echo "</tr>";
		
				$index++;
			}
		echo "</table><br/> <br/>";
		echo "<p id='qd' style='display:none'><b>Query Details</b><br/><textarea id='displayQ' rows='15' cols='97'> </textarea></p>";
		
		}
	}
	?>



	<!--	
	Method takes input based on search user table button
	If button has a value=suspended on click it changes to active
	else if button value=active, on click it changes to suspended
	--> 
   	 <script type="text/javascript">
	function toggle(id)
	{
		 if(document.getElementById(id).value=="Active"){
  		 document.getElementById(id).value="Suspended";
			}

 		 else if(document.getElementById(id).value=="Suspended"){
 		  document.getElementById(id).value="Active";
		}
		
	}
       	</script>

<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>

