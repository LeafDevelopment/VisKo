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
    
    require "phpmailer/class.phpmailer.php";
    
    
    $mail= new PHPMailer();
    
    
    $emailAddress=$_POST['remail'];
    $message = "Your account has been successfully created! \n You may now login with your credentials at http://cs4311.cs.utep.edu/team2/index.php";  //simple message only  you can add headers and other stuff
    
    
    
    
    $mail->IsSMTP();
    $mail->Host       = "smtp.gmail.com"; // SMTP server example
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure= "ssl";
    $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
    $mail->Encoding = '7bit';
    
    
    $mail->Username   = "leafdevelopment14@gmail.com"; // SMTP account username example  WHERE YOURE SENDING FROM
    $mail->Password   = "VISKOADMIN";        // SMTP account password example
    
    $mail->Subject = 'Account Verification';
    $mail->MsgHTML($message);
    $mail->AddAddress("$emailAddress", "New User");  //WHERE YOURE SENDING TO 
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    
    
    
 
    
    
    
    ?>