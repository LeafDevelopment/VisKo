
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="height: 100%;">
<head>
<title>VisKo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--the css used-->
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body  style="height: 100%;">

<div id="main_container">

	<!--Main Header: Logo and Name -->
  <div class="header">
    <div id="logo"><a href="http://cs4311.cs.utep.edu/team2/"><img src="logo.png" alt="" border="0" /></a><font size="10" color="black"><b> VisKo</b></font></div>
    <div class="right_header">
	<br>
	<br>
	<!--Login Form-->
	<form id='login' action='home.php' method='post' accept-charset='UTF-8'>
	
	<legend> 	
	<style type="text/css">a {color: blue }</style>
	<b>   Login </b></legend>
	<input type='hidden' name='submitted' id='submitted' value='1'/>
	 
	<label for='username' >Email:</label>
	<input type='text' name='username' id='username'  maxlength="50" />
	 
	<label for='password' >Password:</label>
	<input type='password' name='password' id='password' maxlength="50" />
	 
	<input type='submit' name='Submit' value='Login' />
	<input type='submit' name='Submit' value='Register' />
	<p>

	 <p> <a href="forgot.php">Forgot Password</a></p>	
	
	</form>

    </div>
  </div>
	<!--Text Portion: Explaining VisKo-->
  <div id="middle_box">
    <div class="middle_box_content">
	<font size="6" color="#050834"> <b> What is VisKo? </b></font>
	<br>
	<br>
	<font size="3" color="#A9A9A9"> VisKo is a framework supporting the answering of visualization queries that allow users to specify what visualizations they want generated rather that specifying how they should be generated.</font>
	</div>
  </div> 
  <div id="middle_box">
    <div class="middle_box_content">
	<font size="6" color="#050834"> <b> What are the benefits? </b></font>
	<br>
	<br>
	<font size="3" color="#A9A9A9"> VisKo can automatically figure out how to generate visualizations given only a query that specifies what visualizations are being requested. Below is a variety of different visualizations generated from a single gravity dataset, resulting from the execution of a single VisKo query.</font>
	<br>
	<br>
	<!--Image Of Visualization -->
	<img src="VisKo.png" alt="" width= "850" Height="300" border="1px" />
    </div>
  </div>
	<p> </p>
  	<p>   </p>
	<p>	 </p>
 	 <p>   </p>
</div>
</body>
</html>


