<!--Import Header with VisKo logo-->
<?php
	require_once("privHeader.inc");
    ?>

<!-- start visko-->
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />


<div id="wrapper">
<div id="main_container">
<div>
<br/><br/>
<!-- Import Navigation side bar for regular user-->

<?php
    require_once("privNavigation.inc");
	?>


<form role="form" name="searchUser" id="searchUser" action="" onsubmit="return (checkRequiredFields('pass', 'configure') ? true : (checkRequiredFields('email', 'configure') ? true : alert('missing required field')==false))" method="post">
<fieldset>
<legend> <font size="3"> <b>User Search Criteria</b> </font></legend>
<div class="form-group">
<div class="col-lg-10">
<label for="ruserEmail" class="control-label">User Email</label>
<br/>
<input type="ruserEmail" class="form-control" id="ruserEmail" name="ruserEmail" placeholder="User Email">
<br/>
<label for="fname" class="control-label">First Name</label>
<br/>
<input type="fname" class="form-control" id="fname" name="fname" placeholder="First Name">
<br/>
<label for="lname" class="control-label">Last Name</label>
<br/>
<input type="lname" class="form-control" id="lname" name="lname" placeholder="Last Name">


<label for="organization" class="control-label">Organization</label>
</td></tr>
<tr><td>
<input type="hidden" id="tf1" name="tf1" >
<select name="tformat" id="tformat" style="width: 250px">
<?php
	/* Select database to populate dropdown*/
	$sql = mysql_query("SELECT DISTINCT organization  FROM User;");
	echo "<option value=\"abs\">Any Organization</option>";
	while ($row = mysql_fetch_array($sql)){
        echo "<option value=\"tf\">" . $row['organization'] . "</option>";
	}
	?>



<br/>
<br/>
</div>
















<!-- Import footer end of visko-->
<?php
	require_once("footer.inc");
    ?>