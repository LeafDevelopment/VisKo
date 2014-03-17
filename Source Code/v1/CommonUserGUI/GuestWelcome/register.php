<?php
	require_once("guestmenu.inc");
?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
   
 <form role="form" name="register" id="register" action="verifyEmail.php" onsubmit="return requiredFields('NEED')" method="post">
  <fieldset>
    <legend> <font size="10"> <b>Register</b> </font><p> * Required Fields  </p>
</legend>
	    
	<div class="form-group">
		<div class="col-lg-10">
			<label for="Email" class="control-label">Email *</label>
      			<br/>
			<input type="text" class="form-control" id="Email" placeholder="Email" required>
			<br/>
        		<label for="confirmEmail" class="control-label">Confirm Email *</label>
			<br/>
		        <input type="text" class="form-control" id="inputCEmail" placeholder="Confirm Email" required>
			<br/>
	      		<label for="password" class="control-label">Password *</label>
        		<br/>
			<input type="password" class="form-control" id="password" placeholder="password" required>
    			<br/>
	    		<label for="confirmPassword" class="control-label"> Confirm Password *</label>
        		<br/>
			<input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
			
			<hr/>
		 	<label for="fname" class="control-label">First Name *</label>
			<br/>
		        <input type="text" class="form-control" id="fname" placeholder="First Name" required>
			<br/>
			<label for="lname" class="control-label">Last Name *</label>
			<br/>
			<input type="text" class="form-control" id="lname" placeholder="Last Name" required>
			<br/>
	      		<label for="organization" class="control-label"> Organization Affiliation *</label>
			<br/>
		        <input type="text" class="form-control" id="organization" placeholder="Organization Affiliation" required>
			<br/>
		        <button type="submit" class="btn btn-primary">Create Account</button>
	      	</div>
	</div>
  </fieldset>
</form>
       

       

<!-- end visko-->
<?php
	require_once("footer.inc"); 
?>
