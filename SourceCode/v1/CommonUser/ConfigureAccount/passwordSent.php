<?php
	require_once("guestmenu.inc");
    ?>






<?php
    
    
    
    require "phpmailer/class.phpmailer.php";
    
    
    $mail= new PHPMailer();
    
    
    $currentUser=$_POST['remail'];
    
    
    $password=mysql_fetch_array (mysql_query("SELECT password FROM User WHERE email='$currentUser'"));
    $p=$password[0];
    echo "Your password has been sent to your email";
    $message = "Your password is: $p You may log back on at: http://cs4311.cs.utep.edu/team2/index.php";  //simple message only  you can add headers and other stuff
    
    
    
    
    $mail->IsSMTP();
    $mail->Host       = "smtp.gmail.com"; // SMTP server example
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure= "ssl";
    $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
    $mail->Encoding = '7bit';
    
    
    $mail->Username   = "leafdevelopment14@gmail.com"; // SMTP account username example  WHERE YOURE SENDING FROM
    $mail->Password   = "VISKOADMIN";        // SMTP account password example
    
    $mail->Subject = 'Password Recovery';
    $mail->MsgHTML($message);
    $mail->AddAddress("$currentUser", "");  //WHERE YOURE SENDING TO
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    
    
    
    ?>