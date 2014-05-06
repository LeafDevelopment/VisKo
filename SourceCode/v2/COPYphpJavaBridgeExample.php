<html>
<head>
</head>
<body>

<h1>Stuff</h1>

<?php

	//3 lines to include in every page that needs to talk to Java
	define ("JAVA_HOSTS", "localhost:8080");
	define ("JAVA_SERVLET", "/Visko/example");
	require_once("Java.inc");


	echo "Lets say Hello to Java...</br></br>";

	$phpParameterGetsParsedIntoJavaParameter = "Hi Java, This is PHP";
	
	echo "We are going to say '".$phpParameterGetsParsedIntoJavaParameter." to java.</br><br/>";


	//This line to call JAVA methods
	$javasReply=java_context()->getServlet()->javaMethodName();
	echo "Java replies<br/>'".$javasReply."'<br/> to us!<br/><br/>";
    
    $javaCheck=java_context()->getServlet()->queryCheck("adfasdf");
    echo "Java checks query<br/>'".$javaCheck."'<br/> to us!<br/><br/>";


?>
</body>
<html>

