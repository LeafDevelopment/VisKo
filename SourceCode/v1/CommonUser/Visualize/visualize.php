	<!--Import Header with VisKo logo-->
<?php
	require_once("regHeader.inc");
?>
     
<!-- start visko-->
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />

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

	<?php
		//Import Mario's page 
		require_once("./Visualize/commonVisualization.html");
	?>





     </div>
  </div>

</div>

 <div id="middle_box">

<!-- Import footer end of visko-->
<?php
	require_once("footer.inc"); 
?>
