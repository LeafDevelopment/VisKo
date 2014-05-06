   <?php	

	require_once("guestmenu.inc");
    
echo "
	<fieldset>
	<legend> <font size='5'><p> Your Account Has Been Suspended</p>
	
	<h4> Account email: ".$_SESSION['email']."<h4> 
	
	<h3>Please contact visko at leafdevelopment14@gmail.com  </h3> 

	</legend>
	";

	require_once("footer.inc");

		session_destroy();

    ?>
