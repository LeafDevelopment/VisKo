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
    

    $sql="INSERT INTO User (email, password, fname, lname, organization) VALUES ('$_POST[remail]', '$_POST[rpassword]', '$_POST[fname]', '$_POST[lname]', '$_POST[rorganization]')";
    
    if (!mysql_query($sql,$connection))
    {
        die('Error:' .mysql_error());
    }
    else
    {echo "1 record added";}
    
    ?>


<?php
    
    //$dbEmail = SELECT LAST(email) FROM User;
   
    $to = 'bekahlyn92@gmail.com';
    //define the subject of the email
    $subject = 'Test email';
    //define the message to be sent. Each line should be separated with \n
    $message = "Hello World!\n\nThis is my first mail.";
    //define the headers we want passed. Note that they are separated with \r\n
    $headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com";
    //send the email
    $mail_sent = mail($to, $subject, $message, $headers);
    //if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
    echo $mail_sent ? "Mail sent" : "Mail failed";
    
    
    
    ?>