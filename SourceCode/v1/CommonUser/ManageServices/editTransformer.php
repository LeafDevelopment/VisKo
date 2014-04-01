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
	  <p> <b> Edit Mapper </b> </p>
		<br/>




	<!--Add Edit Mapper Form-->
	<form action="editMapper.php" method="post">

	 <h5>WSDL URL *</h5>
	<input type="hidden" id="url" name="url" >
    	<input type="text" name="url1" id="url1"  style="width: 800px" >

	<!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->	
	<h5>Operation</h5>
	<input type="hidden" id="op" name="op" >
   	 <select name="op1" id="op1" style="width: 350px"></select>
	  


	<!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->	
	<br/>
	<table>
	<tr><td><h5>Input Format</h5></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h5>Output Format</h5></td></tr>
	<tr>
		<td><select name="if1" id="if1" style="width: 350px;"></select></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><select name="of1" id="of1" style="width:350px;"></select></td>
	</tr>
	</table>
	<input type="hidden" id="if" name="if" >
	<input type="hidden" id="of" name="of" >
	

	<!--Options Will be populated from database/knowledgebase-->
	<!--Still need to implement options to pupulate-->
	<table>
	<tr><td><h5>Input Data Type (optional)</h5></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h5>Output Data Type (optional)</h5></td></tr>
	<tr>
		<td> <select name="idt1" id="idt1" style="width: 350px"></select></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td> <select name="odt1" id="odt1" style="width:350px"></select></td>
	</tr>
	</table>

	<input type="hidden" id="idt" name="idt" >
   	<input type="hidden" id="odt" name="odt" >
   
	
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

