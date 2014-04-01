<?php
/*
@Authors: Maria Cortes
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
*/


	//Start the session of this php page
	//session_start();
	
	
	/*Connect to the Database*/
	require_once("dbc.inc");
	$host='earth.cs.utep.edu';
	$user='cs4311team2sp14';
	$password='treeBranch@6';
	$database='cs4311team2sp14';
	$connection = mysql_connect($host, $user, $password);
	if(!$connection)
	{
		die('Could not connect: '. mysql_error());
	}
	//Connect with the database that will be used
	$db_connection=mysql_select_db($database, $connection);
?>
