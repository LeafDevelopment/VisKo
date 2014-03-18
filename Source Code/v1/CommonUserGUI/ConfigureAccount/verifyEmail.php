<?php
	require_once("guestmenu.inc");
    require_once("dbc.inc");
    ?>
<!-- verify email -->


<form role="form" name="verifyEmail" id="verifyEmail"  method="post">
<fieldset>
<legend> <font size="10"> <b>Verify Email</b> </font><p> * Please go to your email and check for activation link  </p>
</legend>
</form>

<?php
    //$dbEmail = SELECT LAST(email) FROM User;
    require_once("php.ini");
    $message = "hello";
    mail('bekahlyn@gmail.com', 'My Subject', $message);
 
    
    ?>