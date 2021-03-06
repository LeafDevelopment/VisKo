
<?php
/*
@Authors: Maria Cortes, Rebekah Gruver, Marcela Vazquez
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
*/
require_once("header.inc");
?>

 <body>
/* Create form for guest header menu
This form is contains login form, as well as the logo, and relies on the index.php file
If user clicks on the 'register' button the system navigates to the register page
If the user clicks on the 'forgot password' hyperlink the system nabigates to the forgot password page
*/ 
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="logo.png" alt="" border="0" />&nbsp;&nbsp;&nbsp;<font size="6">VisKo</font></a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" name="login" id="login" action="index.php" onsubmit="return (checkRequiredFields('r', 'login') ? true : (alert('missing required field')==false))" method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name='rusername' id='rusername'  maxlength="50" required>
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name='rpassword' id='rpassword' maxlength="50" required >
            </div>
            <button type="submit" class="btn btn-primary" name='login' value='Login'>Login</button>
	    <a class="btn btn-primary" role="button" href="register.php">Register</a>
          </form>
	</div>
	  <div style="float:right;"><a href="passwordRecovery.php" style= "color:white;">Forgot Password</a></div>
      </div>
    </div>
<br/><br/><br/>

 <div class="container">


