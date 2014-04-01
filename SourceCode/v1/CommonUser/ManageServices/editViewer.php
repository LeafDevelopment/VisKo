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
	  <p> <b> Edit Viewer </b> </p>
		<br/>




	<!--Add Edit Viewer Form-->
	<form action="editViewer.php" method="post">

	 <h5>Name *</h5>
	<input type="hidden" id="name" name="name" >
    	<input type="text" name="name1" id="name1"  style="width: 800px" >

	  

	<!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->	
	<h5>Input Format</h5>
	<input type="hidden" id="if" name="if" >
   	 <select name="if1" id="if1" style="width: 800px"></select>

	<!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->	
	<h5>Input Data Type (optional)</h5>
	<input type="hidden" id="idt" name="idt" >
   	 <select name="idt1" id="idt1" style="width: 800px"></select>

	
	
	<!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->	
	<h5>Part of Viewer Set</h5>
	<input type="hidden" id="pvs" name="pvs" >
   	 <select name="pvs1" id="pvs1" style="width: 800px"></select>

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

