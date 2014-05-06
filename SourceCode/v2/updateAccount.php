<?php

	include_once ('dbc.inc');


	if(isset($_POST['name']) & isset($_POST['is']))
	{
		$name = mysql_real_escape_string(htmlentities($_POST['name']));

		if($_POST['is'] == "Active")
			{$set = "Suspended";}
		elseif($_POST['is'] == "Suspended")
			{$set = "Active";}
		else
			{$set = "Suspended";}  //DEFAULT IF INITIAL ERROR

		$update = mysql_query("UPDATE User SET status='".$set."' WHERE email='".$name."'");
		if($update === true)
		{
			echo $set;
		}
		else
		{
			echo 'FAIL';
		}
	}
	else
	{
		echo 'FAIL';	
	}
?>
