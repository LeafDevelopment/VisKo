<!--
@Authors: Maria Cortes, Rebekah Gruver, Marcela Vazquez
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
-->


<?php
	/*
	*Reuse other files to avoid code repetition
	Require guest menu to display the guest user header meny: composed of login form, logo, register button, and forgot password link
	Require 'dbc' file to use in database calls, as 'dbc' files contains the database connection
	*/
	require_once("guestmenu.inc");
    	require_once("dbc.inc");
    
    
    ?>
<!--Create the register form
    This form contains all the fields for a user to register into the visko system
    Relies on verifyEmail.php 
	-->

<form role="form" name="register" id="register" action="verifyEmail.php" onsubmit="return (checkRequiredFields('r', 'register') ? true : (alert('missing required field')==false)) (validateForm())"  method="post">
<fieldset>
<legend> <font size="10"> <b>Register</b> </font><p> * Required Fields  </p>
</legend>

<div class="form-group">
<div class="col-lg-10">

<!-- EMAIL LABELS AND CONFIRMATION THAT THEY MATCH-->

<script type="text/javascript" src="matchTest.js"></script>
<div class="tutorialWrapper">
<div class="fieldWrapper">
<label for="email1" class="control-label">Email *</label>
<br/>
<input type="text" class="form-control" name ="remail" id="email1" placeholder="Email" required>
<br/>
<label for="rCemail" class="control-label">Confirm Email *</label>
<br/>
<input type="text" class="form-control" id="email2" name="rCemail" onkeyup="checkPass2(); return false;" placeholder="Confirm Email" required>
<span id="confirmMessage1" class="confirmMessage1"></span>
<br/>
</div>
</div>


<!-- PASSWORD LABELS AND CONFIRMATION THAT THEY MATCH-->


<script type="text/javascript" src="matchTest.js"></script>
<div class="tutorialWrapper">
<div class="fieldWrapper">
<label for="pass1" class="control-label">Password *</label>
<input type="password" class="form-control" name="rpassword" id="pass1" placeholder="Password" required>
</div>
</br>
<div class="fieldWrapper">
<label for="pass2" class="control-label">Confirm Password *</label>
<input type="password" class="form-control" name="rconfirmPassword" id="pass2" onkeyup="checkPass(); return false;" placeholder="Confirm Password"required>
<span id="confirmMessage" class="confirmMessage"></span>
</div>
</div>




</br>
<hr/>
<label for="fname" class="control-label">First Name</label>
<br/>
<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
<br/>
<label for="lname" class="control-label">Last Name</label>
<br/>
<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
<br/>
<label for="organization" class="control-label">Organization Affiliation *</label>
<br/>
<input type="text" class="form-control" id="rorganization"  name="rorganization"  placeholder="Organization Affiliation" required>
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
