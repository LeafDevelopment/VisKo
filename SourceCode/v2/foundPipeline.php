	<!--Import Header with VisKo logo-->
<?php
	require_once("privHeader.inc");
?>
     

<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />
<link rel="stylesheet" type="text/css" href="datepicker.css" media="screen" />
<script src="bootstrap-datepicker.js"></script>


	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("privNavigation.inc");
	?>
	
<br/> <br/>

<?php

       
	$query = "SELECT * FROM Pipeline";
	
	if(isset($_POST['id']))
	{
		$Eid = $_POST['id'];
		
		$resultDP = mysql_query("SELECT * FROM Pipeline");
	
		while($rowDP = mysql_fetch_array($resultDP))
		{
			//IF SO REMOVE COURSE
			if($rowDP['id']==$Eid)
			{
				$id = $rowDP['id'];
				$user = $rowDP['user'];
				$date = $rowDP['date'];
				$error = $rowDP['error'];
				$url = $rowDP['url'];
				$abstraction = $rowDP['abstraction'];
				$viewerset = $rowDP['viewerset'];
				$sourceformat = $rowDP['sourceformat'];
				$sourcetype = $rowDP['sourcetype'];
				$targettype = $rowDP['targettype'];
				$targetformat = $rowDP['targetformat'];
				$query = $rowDP['query'];
				$outputformat = $rowDP['outputformat'];
				$image = $rowDP['image'];
			}
		}
		
		$imageHTML = '<img src="'.$image.'" height="50%" width="50%">';
	}
?>
	<!-- Middle Content--> 
    <div id="middle_box">
    
	<h1>Pipeline <?php echo $id; ?> Details</h1>

<p>- Submitted By : <?php echo $user; ?> <br />
  - Date: <?php echo $date; ?>
  <br />
  - Error: <?php echo $error; ?>
  <br />
  - Error Ocurred on Service: <?php ?>
  <br />
  - With Input Data at URL: <?php echo $url; ?></p>
<hr />
<p>Responsible Pipeline:</p>
<center>
<table width="200" border="1">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Abstraction</th>
    <th scope="col">OutputFormat</th>
    <th scope="col">DateExecuted</th>
  </tr>
  <tr>
    <td><?php echo $id; ?> </td>
    <td><?php echo $abstraction; ?> </td>
    <td><?php echo $outputformat; ?> </td>
    <td><?php echo $date; ?> </td>
  </tr>
</table>
</center>
</p>

<p>Service 1</p>
<p>Parameter 1 = 
  <input type="text" name="Parameter1" id="Parameter1" />
  <br />
  Parameter 2 = 
  <input type="text" name="Parameter2" id="Parameter2" />
  <br />
  Parameter 3 = 
  <input type="text" name="Parameter3" id="Parameter3" />
</p>
<p>Service 2 </p>
<p>Parameter 4 = 
  <input type="text" name="textfield" id="textfield" />
</p>
<p>Service 3</p>
<p>Parameter 5 = 
  <input type="text" name="Parameter5" id="Parameter5" />
  <br />
  Parameter 6 = 
  <input type="text" name="Parameter6" id="Parameter6" />
</p>
<p>Responsible Pipeline Output:</p>
<p><center><?php echo $imageHTML; ?></center></p>
<br />
<hr />


<p>Responsible Query:</p>


 
<center><textarea readonly rows="10" cols="80"><?php echo $query ?></textarea></center>
 
</div>	

<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>
