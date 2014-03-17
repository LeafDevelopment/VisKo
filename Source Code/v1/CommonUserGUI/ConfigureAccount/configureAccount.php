	<!--Import Header with VisKo logo-->
<?php
	require_once("regHeader.inc");
?>
 
!-- start visko-->
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />


<div id="wrapper">
<div id="main_container">
  <div>
	<br/><br/>  
	<!-- Import Navigation side bar for regular user-->
	      
<?php 
	require_once("regNavigation.inc");
?>


 <div id="middle_box">

   
 <form role="form" name="configure" id="configure" action="configureAccount.php" onsubmit="return (checkRequiredFields('pass', 'configure') || checkRequiredFields('email', 'configure'))" method="post">
  <fieldset>
    <legend> <font size="5"> <b>Change Password</b> </font></legend>
	<div class="form-group">
      		<div class="col-lg-10">
			<label for="password" class="control-label">Current Password</label>
			<br/>
      		       	<input type="password" class="form-control" id="password" placeholder="Current Password" required>
 			<br/>
	        	<label for="password1" class="control-label">New Password</label>
			<br/>
		        <input type="password" class="form-control" id="password1" placeholder="New Password" required>
			<br/>
	      		<label for="password2" class="control-label"> Confirm Password </label>
			<br/>
		        <input type="password" class="form-control" id="password2" placeholder="Confirm Password" required>
			<br/>
    			<br/>
	      	</div>
	 <legend> <font size="5"> <b>Change Email</b> </font></legend>
	<div class="form-group">
      		<div class="col-lg-10">
			<label for="newEmail" class="control-label"> New Email Address</label>
			<br/>
	        	<input type="email" class="form-control" id="emailNew" placeholder="New Email " required>
     			<br/>
			<label for="confirmEmail" class="control-label">Confirm New Email Address</label>
			<br/>
			<input type="email" class="form-control" id="emailConfirm" placeholder="Confirm Email" required>
		</div>     	
	</div>
        <div class="col-lg-10">
		<br/>
	        <button type="submit" class="btn btn-primary">Submit Changes</button>
      	</div>
    
</div>
  </fieldset>
</form>
       

       

<!-- end visko-->
<?php
	require_once("footer.inc"); 
?>
