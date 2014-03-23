1. Install Tomcat to your eclipse if you haven't: https://www.youtube.com/watch?v=LdThrERsSsI
2. Start a new Dynamic Web project on Eclipse: File->New->Project->Web->Dynamic Web Project. Make sure your target runtime for this project is Tomcat Server
3. Install php/javabridge jars into your project: JavaBridge.jar, php-script.jar, php-servlet.jar found in http://php-java-bridge.sourceforge.net/doc/servlet-programming.php and http://php-java-bridge.sourceforge.net/doc/servlet-programming.php
Within your project: select your WebContent Folder->WEB-INF->lib and paste the three jars into that folder 

4. Visko installation instructions to get api-driver to work (and hints on how to make another project that uses the visko code. This does not build the Visko website (and I do not know how to do that), only example java code that can be run in the console.
It requires a working installation of Apache's ant tool, and git. I also recommend Eclipse with the Egit add-on. Which comes built-in with new versions of eclipse.
	1.	Get the Visko API either the original via git clone https://github.com/nicholasdelrio/visko.git or DTT's working version git@github.com:SEDTT/visko.git. This should make a folder called 'visko'
	2.	cd visko/visko-build and do ant build-triple-store. This will make the knowledge base (registry-tdb).
	3.	In eclipse, go to File->Import->Projects from Git and then select Local and point it to where you cloned visko.
	4.	Click through Next until it shows you the list of projects (there should be a bunch). You only need to import api api-driver andcms-clients
	5.	Do Project->Clean and then you should be able to run the files (Execution.java, etc.) in api-driver.
To write new Java code that relies on the Visko API in eclipse, you can either just copy the api-driver class and hack it, or create a new project. If you create a new project, you need to go to Project->Properties->Java Build Path->Libraries and add every library (jar) in api/lib/jena api/lib/pellet and also api/lib/cms-clients/content-management.jar.
Lastly in the Build path add a Project dependency on the API project.
