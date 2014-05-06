<?php
	/*Change status of user if toggle clicked*/
	if (isset($_GET['userE'])){
		if(isset($_GET['userStat'])){

			//Get variables	
			$userId = $_GET['userE']; 
			$userStatus = $_GET['userStat'];

			//Make query for mysql
			$db_selection= mysql_select_db($database, $connection);
			$sql = mysql_query("UPDATE User SET status = '$userStatus' WHERE email = '$userId' LIMIT 1") or die (mysql_error());
			echo "1" ; // if update successful
			else echo "0" // if update unsuccessful
		}
	}
	
	/*Done - cuange user status*/

?>
