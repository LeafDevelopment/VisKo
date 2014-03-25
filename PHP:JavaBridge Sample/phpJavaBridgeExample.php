<html>
<head>
</head>
<body>

<h1>Stuff</h1>

<?php

	//3 lines to include in every page that needs to talk to Java
	define ("JAVA_HOSTS", "localhost:8080");
	define ("JAVA_SERVLET", "/VisKo/Example");
	require_once("Java.inc");

	echo "Lets say Hello to Java...</br></br>";

	$phpParameterGetsParsedIntoJavaParameter = "Hi Java, This is PHP";
	
	echo "We are going to say '".$phpParameterGetsParsedIntoJavaParameter." to java.</br><br/>";


	//This line to call JAVA methods
	$javasReply=java_context()->getServlet()->javaMethodName($phpParameterGetsParsedIntoJavaParameter);

	echo "Java replies<br/>'".$javasReply."'<br/> to us!<br/><br/>";



	if(isset($_GET['query']))
	{
		$result=java_context()->getServlet()->practiceQuery($_GET['query']);
		echo "<h3>Query:</h3>";

		if($result[0]=='PASS')
		{
			echo $result[1];
			echo "<br/>";
			echo $result[2];	
		}
		else
		{
			echo "Query '".$_GET['query']."' is Invalid!";
		}
	}
?>
</body>
<html>

