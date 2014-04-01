<!--
@Authors: Maria Cortes, Rebekah Gruver, Marcela Vazquez
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
-->

	<!--Import Header with VisKo logo-->
<?php
	require_once("regHeader.inc");
?>
     
<!-- start visko-->
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />
<script>
	//Mario added this part to keep the queue on visualizations 
	//going as far as the user wants
	sessvars.abstraction = new Array();
    sessvars.queueAbstractions = new Array();
    sessvars.count = {count: 0, queueCount: 0};
</script>

<div id="wrapper">
<div id="main_container">
  <div>
	<br/><br/>  
	<!-- Import Navigation side bar for regular user-->
	      
<?php 
 require_once("regNavigation.inc");
	?>

<!--Body of regular user home page-->
  <div id="middle_box">
    <div class="middle_box_content">
	<b><font size="5" color="#050834"> What is VisKo?</font></b>
	<br>
	<br>
	<font size="3" color="#A9A9A9"> VisKo is a framework supporting the answering of visualization queries that allow users to specify what visualizations they want generated rather that specifying how they should be generated.</font>
    </div>
	<hr>
  </div> 


  <div id="middle_box">
    <div class="middle_box_content">
	<b><font size="5" color="#050834"> What are the benefits?</font></b>
	<br>
	<br>
	<font size="3" color="#A9A9A9"> VisKo can automatically figure out how to generate visualizations given only a query that specifies what visualizations are being requested. Below is a variety of different visualizations generated from a single gravity dataset, resulting from the execution of a single VisKo query.</font>
	<br>
	<br>
	<hr>

	<font size=4> 
		<img src="VisKo.png" alt="" width= "740" Height ="270" border="1px" />
	</font>
     </div>
  </div>

</div>
</div>

 <div id="middle_box">

<!-- Import footer end of visko-->
<?php
	require_once("footer.inc"); 
?>
