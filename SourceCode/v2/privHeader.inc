<!--Import the header file -->
<?php
require_once("header.inc");
?>
<?php

//Check if session has been set, else cannot be in the system
if(!isset($_SESSION['email']))
{
	header('Location:index.php');
}	


?>


<!--Resize the the menu bar/header-->
<style>
.navbar{
  min-height:60px; //* or whatever height you require
}
</style>
<!---Contain the form for the regular user header-->

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="privHome.php"><img src="logo.png" height="30px" border="0" />&nbsp;&nbsp;&nbsp;<font size="5">Privileged Mode</font></a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" name="logout" id="logout" action="index.php"method="post">
                <a class="navbar-brand"> <?php echo "Welcome ".$_SESSION['email'].""; ?> </font></a>    
		<input type="submit" class="btn btn-primary"  href= index.php name='logout' value='Logout'>
          </form>
	</div>
      </div>
    </div>
<br/><br/><br/>

 <div class="container">


