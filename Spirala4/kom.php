<?php

         $root = simplexml_load_file('Xml/komentari.xml');
	        $root->addChild('komentari');
			$root->komentari->addChild('komentar', '');
			$root->komentari->komentar->addChild('tekst','OVO JE ZANIMLJIVO');
			$root->komentari->komentar->addChild('idNovost',2);
			$root->komentari->komentar->addChild('idKorisnik',2);
			$root->komentari->komentar->addChild('id',1);
			$root->asXML('Xml/komentari.xml');
			Header('Content-type: text/xml');
			echo $root->asXML();



?>