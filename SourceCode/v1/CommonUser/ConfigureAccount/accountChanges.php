<!--Import Header with VisKo logo-->
<?php
	require_once("regHeader.inc");
    ?>


<!-- start visko-->
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />


<div id="wrapper">
<div id="main_container">
<div>
<br/><br/>
<!-- Import Navigation side bar for regular user-->

<?php
	require_once("regNavigation.inc");
    ?>


<?php
    
    
    $currentuser = $_SESSION['email'];
    #used to test by displaying current user, it should match the email on top
    # echo $currentuser;
	
    #fetching password stored in DB to be later updated by user
    $dbpassword = mysql_fetch_array (mysql_query("SELECT password FROM User WHERE email='$currentuser'"));
    #fetching email stored in DB to be later updated by user
    $dbemail = mysql_fetch_array (mysql_query("SELECT email FROM User WHERE email='$currentuser'"));
    #used to display email stored in DB
    #echo $dbemail['email'];
    #used to display password stored in DB (old one)
    #echo $dbpassword['password'];
    
    $typedpassword = $_POST[currentPassword];
    
    #this if-statement will change email, only when 'new password' is empty
    if ($_POST[newPassword]==""){
        $queryEmail="UPDATE User SET email='$_POST[newEmail]' WHERE email='$currentuser'";
        
        if (!mysql_query($queryEmail,$connection))
        {
            die('Error:' .mysql_error());
        }
        else
        {
            echo "email succesfully changed!";
        }
        $_SESSION['email'] = $_POST[newEmail];
        $currentuser = $_SESSION['email'];
    }
    
    #this if-statement will change password, only when 'new email' is empty
    else if($dbpassword['password']==$typedpassword AND $_POST[newEmail]==""){
        
        $queryPassword="UPDATE User SET password='$_POST[newPassword]' WHERE email='$currentuser'";
        
        if (!mysql_query($queryPassword,$connection))
        {
            die('Error:' .mysql_error());
        }
        else
        {
            echo "password succesfully changed!";
        }
    }
    
    else if($dbemail['email'] == $currentuser AND $_POST[newPassword]!= "" AND $_POST[newEmail]!=""){
        
        $queryEmailandPassword="UPDATE User SET email='$_POST[newEmail]', password='$_POST[newPassword]' WHERE email='$currentuser'";
        
        
        if (!mysql_query($queryEmailandPassword,$connection) )
        {
            die('Error:' .mysql_error());
        }
        
        
        else
        {echo "email and password succesfully changed!";}
        
        $_SESSION['email'] = $_POST[newEmail];
        $currentuser = $_SESSION['email'];
        
    }
    $currentuser = $_SESSION['email'];
    
    
	?>



<?php
    require_once("footer.inc");
    ?>