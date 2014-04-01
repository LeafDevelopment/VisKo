<?php

	$date = date("Y-m-d");
	
 	require_once("../team2/dbc.inc");
 		

    $sql = "INSERT INTO Query (user, abstraction, url, viewerset, sourceformat, sourcetype, targettype, targetformat, query, date, error) VALUES ('" . $_SESSION['email'] . "', '" . $_POST['abstraction'] . "', '" . $_POST['inputDataType'] . "', '" . $_POST['viewerSet'] . "', ' ', ' ', '" . $_POST['inputDataType'] . "', '" . $_POST['inputDataFormat'] . "' , ' ', '$date', 'No errors found.')";
    	
    	
		if (!mysql_query($sql,$connection))
    	{
        	die('Error:' .mysql_error());
    	}
    	
?>
    	