<?php


   
	   $xml = simplexml_load_file('Xml/novosti.xml');
	   $potvrda = true;
	   if(file_exists('Xml/novosti.xml')){
	   $broj_elemenata = $xml->children()->children()->count();
	   $novost = $xml->children()->children();
       header("Content-type: text/csv");
       header("Content-Disposition: attachment; filename=novosti.csv");
       header("Pragma: no-cache");
       header("Expires: 0");
	   $niz = [];
	        $file = fopen("php://output", "w");
			$niz = "Naslov" . '&'. "Sadržaj članka" . '&'. "Kategorija članka" . "\n";
			fputcsv($file,explode('&',$niz));
			   for($i = 0; $i < $broj_elemenata; $i++)
			   {
				   $niz = $novost[$i] -> naziv . '&'. $novost[$i] -> sadrzaj . '&'. $novost[$i] -> kategorija;
				   fputcsv($file,explode('&',$niz));
			   }
			   
			   $potvrda = true;
			   fclose($file);
			   $obavijest = "Uspješan download novosti!";
			  
	   }
	   else
		   $obavijest = "Neuspješan download novosti!";

?>