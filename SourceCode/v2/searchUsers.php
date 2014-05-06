	<!--Import Header with VisKo logo-->
<?php
	require_once("privHeader.inc");
?>
     

<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />

<!--Funtion set fields, gets input from all the dropdown menus, and puts the into a query
*To send it back to the database, and get search results*/-->
<script>
function setfields()
{
	var query="SELECT * FROM User";

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
   	<br>
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
				echo "<td><button class='btn btn-primary' id='".$index."' name='".$row['email']."' style='width:115px; align:center;'>".$row['status']."</button></td>"; 		
				echo "</tr>";
				//<form action='searchUsers.php' method='post'> 
				//onclick=\"toggle('".$row['email']."' )
				$index++;
			}
		echo "</table><br/> <br/>";	
		}
	}
	?>



	
	<!--Calendar javascript methods to display calendar--> 
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

	$(document).ready(function() 
	{
		$("button").click(function(event) 
		{
	        	var id = event.target.id;
			var email = event.target.name;
			var value = $(event.target).text();

			$(event.target).text('Updating...');
			$.post("updateAccount.php", 
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
    	</script>

<!-- Import footer for to end visko

	$(document).ready(function()
	{
		$("button").click(function()
		{
			$("button").text('Updating...');
			$.post("updateAccount.php", 
			{ 
				name: "mmrcortes@gmail.com" 
			},
			function(data,status)
			{
				alert("Data: " + data + "\nStatus: " + status);
				$("button").text(data);
			});
		});
	});


-->
<?php
	require_once("footer.inc"); 
?>

