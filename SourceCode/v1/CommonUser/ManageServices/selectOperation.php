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
<script src="bootstrap-datepicker.js"></script>

	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("regNavigation.inc");
	?>
<br/> <br/>

	<!-- Middle Content--> 
    <div id="middle_box">
	  <p> <b> Add Service </b> </p>
		<br/>
	<!--Add Service User Form-->
	<form method="POST" action="addService.php">
	  <h5>Service Type</h5>
	  <select style="width: 700px">
	    <option value="Viewer Set">Viewer Set</option>
	    <option value="Viewer">Viewer</option>
	    <option value="Filter">Filter</option>
	    <option value="Transformer">Transformer</option>
	    <option value="Converter">Converter</option>
	    <option value="Mapper">Mapper</option>
	  </select>
	</br>
      </br>
	<p align="center">
	  <input type="submit"  class="btn btn-primary" name="add" value="Add" style="width:100px">
		<hr>
	     </p>
	</form>
      </br>

    <!--Edit/Delete Service User Form-->
    <form method="POST" action="selectOperation.php">
	  <p> <b>Edit / Delete Service </b> </p>

	 <!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->	
     	 <h5>  Viewer Sets</h5>
	<input type="radio" name="services" value="viewersets">
	<select name="viewersets" style="width:700px"></select>
	
	
	 <!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->	
      	<h5>  Viewers</h5>
	<input type="radio" name="viewers" value="viewers">
	<select name="viewers" style="width:700px"></select>


	 <!--Options Will be populated from database/knowledgebase-->
		<!--Still need to implement options to pupulate-->
      	<h5>  Filters</h5>
	<input type="radio" name="filters" value="filters">
	<select name="filters" style="width:700px"></select>
	<!--Still need to implement options to pupulate-->
	

	 <!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->
	<h5>  Transformers</h5>
	<input type="radio" name="transformers" value="transformers">
	<select name="tranformers" style="width:700px"></select>

	 <!--Options Will be populated from database/knowledgebase-->
		<!--Still need to implement options to pupulate-->
	<h5>  Converters</h5>
	<input type="radio" name="converters" value="converters">
	<select name="converters" style="width:700px"></select>

 	<!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->
	<h5>  Mappers</h5>
	<input type="radio" name="mappers" value="mappers">
	<select name="mapperrs" style="width:700px"></select>
		</br>
	   </br>
	<p align="center">
	   <input type="submit" name="edit"  class="btn btn-primary" value="Edit" style="width:100px">
	      <input type="submit" name="delete" class="btn btn-primary" value="Delete" style="width:100px">
	   </p>
	</form>
	

     	<div id="middle_box">


<!-- Import footer for to end visko-->
<?php
	require_once("footer.inc"); 
?>

