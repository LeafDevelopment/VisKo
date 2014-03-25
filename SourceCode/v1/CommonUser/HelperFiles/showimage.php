<?php 

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	else
	{
		$id = "-1";	
	}

	require_once("dbc.inc");
	$qry_str= "SELECT * FROM History WHERE id='".$id."'";
	$qry = mysql_query($qry_str);

	while($row=mysql_fetch_array($qry))
	{
		$imageData = $row["image"];
		$imageType = $row["outputformat"];
	}
	
	header("content-type: image/".$imageType);
	echo $imageData;
?>