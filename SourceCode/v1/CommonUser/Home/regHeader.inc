


<!--Import the header file -->
<?php
/*

@Authors: Maria Cortes, Rebekah Gruver, Marcela Vazquez
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
*/
require_once("header.inc");


//Check if user is not logged into the system the he/she cannot be in any other page but index page, so redirect them to index page
if(!isset($_SESSION['email']))
{
	header('Location:index.php');
}	


?>

/*Resize the the menu bar/header*/
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
          <a class="navbar-brand" href="home.php"><img src="logo.png" height="30px" border="0" />&nbsp;&nbsp;&nbsp;<font size="5">VisKo</font></a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" name="logout" id="logout" action="index.php" method="post">
                <a class="navbar-brand" href="configureAccount.php"> <?php echo "Welcome ".$_SESSION['email'].""; ?> </a>    
		<button type="submit" class="btn btn-primary" name='logout' id='logout' value='logout'>Logout</button>
          </form>
	</div>
      </div>
    </div>
<br/><br/><br/>

 <div class="container">
<!-- /*Still to implement logout**/ -->


