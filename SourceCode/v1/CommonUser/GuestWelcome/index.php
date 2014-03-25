<?php
    ob_start();
	require_once("guestmenu.inc");
	
	$count=-1;
    
	if (!empty($_POST['logout']) && !empty($_SESSION['email']))
	{
		session_destroy();
	}
	/*Simple login */
    if (!empty($_POST['rusername']) && !empty($_POST['rpassword']))
	{
		$_SESSION['email'] = $_POST['rusername'];
		

		$sql = sprintf("SELECT email, password FROM User WHERE email='%s' AND password='%s'", mysql_real_escape_string($_POST['rusername']), mysql_real_escape_string($_POST['rpassword']));
        
        $sql2 = sprintf("SELECT email, password FROM privUser WHERE email='%s' AND password='%s'", mysql_real_escape_string($_POST['rusername']), mysql_real_escape_string($_POST['rpassword']));

		$result=mysql_query($sql);
	 	$count=mysql_num_rows($result);
        
        $result2=mysql_query($sql2);
	 	$count2=mysql_num_rows($result2);
	 		 	
		if ($count==1) 
		{
			header("Location:home.php");	
        }
        
        if ($count2==1)
        {
            header("Location:privHome.php");
        }
            
    }
        
    
	
    ob_flush();
    ?>

<!-- start visko-->

<div id="main_container">

<!--Text Portion: Explaining VisKo-->
<div id="middle_box">
<div class="middle_box_content">
<font size="6" color="#050834"> <b> What is VisKo? <a href="home.php"></a></b></font>
<br>
<br>
<font size="3" color="#A9A9A9"> VisKo is a framework supporting the answering of visualization queries that allow users to specify what visualizations they want generated rather that specifying how they should be generated.</font>
</div>
</div>

<hr>

<div id="middle_box">
<div class="middle_box_content">
<font size="6" color="#050834"> <b> What are the benefits? </b></font>
<br>
<br>
<font size="3" color="#A9A9A9"> VisKo can automatically figure out how to generate visualizations given only a query that specifies what visualizations are being requested. Below is a variety of different visualizations generated from a single gravity dataset, resulting from the execution of a single VisKo query.</font>
<br/>

<hr>

<br/>
<!--Image Of Visualization -->
<img src="VisKo.png" alt="" width= "950" Height="300" border="1px" />
</div>
</div>
<p> </p>
<p>   </p>
<p>	 </p>
<p>   </p>
</div>

<?php	/*Alert will that email or password do not match*/
	if($count==0)
	{
        echo " <script type='text/javascript'> alert ('Email and password and email do no match!')</script>";
	}
    ?>


<!-- end visko-->
<?php
	require_once("footer.inc");
    ?>
