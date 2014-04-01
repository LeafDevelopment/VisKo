<!--
@Author: Maria Cortes
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
-->

	<!--Import Header with VisKo logo-->
<?php
	require_once("regHeader.inc");
?>
     

<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />
<link rel="stylesheet" type="text/css" href="datepicker.css" media="screen" />

	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("regNavigation.inc");
	?>
<br/> <br/>

	<!-- Middle Content--> 
    <div id="middle_box">
	  <p> <b> Edit Viewer Set </b> </p>
		<br/>




	<!--Add Edit Mapper Form-->
	<form action="editViewerSet.php" method="post">
	<table>
	<!--Input Name and URL and bried description form-->
	<tr><td><h5>Name *</h5></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h5>Documentation URL *</h5></td></tr>
	<tr>
		<td><select name="name1" id="name1" style="width: 350px;"></select></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><select name="url1" id="url1" style="width:350px;"></select></td>
	</tr>
	</table>
	<input type="hidden" id="if" name="name" >
	<input type="hidden" id="of" name="url" >
	<br/>
	
	<h5>Brief Description *</h5>
	<textarea name="description" id="description" style= "width:700px; height:200px;"></textarea>
	
	<!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->	
	<h5>Toolkit</h5>
	<input type="hidden" id="tool" name="tool" >
   	 <select name="tool1" id="tool1" style="width: 800px"></select>

		</br>
    	  </br>
	<p align="center">
	  <input type="submit"  class="btn btn-primary" name="commit" value="Commit" style="width:100px">
		<hr>
	     </p>
	</form>	

     	<div id="middle_box">

<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>

