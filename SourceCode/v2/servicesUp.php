<meta http-equiv="refresh" content="5; url=servicesUp.php">

<?php

		$url = 'http://visko.cybershare.utep.edu:5080/visko-web/registry/ps2pdf.owl#ps2pdfService';
    	$ch = curl_init($url);
    	curl_setopt($ch, CURLOPT_NOBODY, true);
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    	curl_exec($ch);
    	$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    	curl_close($ch);
    	if (200==$retcode) {
        
        	print("Services are up (maybe)");
    	} 
    	else {
    		print("Services are down.");
   		}
?>