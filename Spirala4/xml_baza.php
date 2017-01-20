<?php
 session_start();
 if(isset($_SESSION['username']) && isset($_SESSION['username']) == "admin") $prijava = "Admin postavke";
  elseif(isset($_SESSION['username'])) $prijava = "Odjavi se";
  else $prijava = "Hej, pridruži nam se!";
  $obavijest = "Nedavno dodane novosti";
  $postoji = false;
  
  if(!isset($_POST['baza']))
  {
	  //otvaramo sve xml fajlove
	  if(file_exists('Xml/novosti.xml') && file_exists('Xml/korisnici.xml') && file_exists('Xml/komentari.xml'))
	  {
		  $xml_novosti = simplexml_load_file('Xml/novosti.xml');
		  $xml_korisnici = simplexml_load_file('Xml/korisnici.xml');
		  $xml_komentari = simplexml_load_file('Xml/komentari.xml');
		  
		  $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=wtspirala4', 'wtberina', 'wt.moja.lozinka.1.s4');
          $veza->exec("set names utf8");
		  
		  
		  $broj_elemenata = $xml_novosti->children()->children()->count();
	      $novost = $xml_novosti->children()->children();
	      
			   for($i = 0; $i < $broj_elemenata; $i++)
			   {
				   $postoji = false;
				   $id = $novost[$i] -> id;
				   $Naslov = $novost[$i] -> naziv;
				   $Sadrzaj = $novost[$i] -> sadrzaj;
				   $Slika = $novost[$i] -> slika;
				   $Kategorija = $novost[$i] -> kategorija;
				   
				   $rezultat = $veza->query("select id, Naslov, Sadrzaj, Slika, Kategorija from Novost");
				   
				    if (!$rezultat) {
                      $greska = $veza->errorInfo();
                      print "SQL greška: " . $greska[2];
                      exit();
                     } 
					 
					   foreach ($rezultat as $vijest) {
						   if($vijest['id'] == $id)
						   {
							   $postoji = true;
						   } 
					   }


				   if($postoji == false)
				   {
					   $upit = $veza->prepare("INSERT INTO Novost (id, Naslov, Sadrzaj, Slika, Kategorija) VALUES (:id, :naslov, :sadrzaj, :slika, :kategorija)");
				       $upit -> bindValue(":id", $id, PDO::PARAM_INT);
					   $upit -> bindValue(":naslov", $Naslov, PDO::PARAM_STR);
					   $upit -> bindValue(":sadrzaj", $Sadrzaj, PDO::PARAM_STR);
					   $upit -> bindValue(":slika", $Slika, PDO::PARAM_STR);
					   $upit -> bindValue(":kategorija", $Kategorija, PDO::PARAM_STR);
					   $rez =  $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška: " . $greska[2];
		                exit();
		                }
					
				   }
			   }
			   
           $postoji = false;
	      foreach($xml_korisnici->children()->children() as $korisnik)
			   {
				   $id = $korisnik -> id;
				   $Ime = $korisnik -> ime;
				   $Prezime = $korisnik-> prezime;
				   $Username = $korisnik -> username;
				   $Email = $korisnik -> email;
				   $Password = $korisnik -> password;
				   $rezultat = $veza->query("select id, Ime, Prezime, Username, Email, Password from Korisnik");
				   
				    if (!$rezultat) {
                      $greska = $veza->errorInfo();
                      print "SQL greška: " . $greska[2];
                      exit();
                     } 
					 
					   foreach ($rezultat as $korisnik) {
						   if($korisnik['id'] == $id)
						   {
							   $postoji = true;
						   } 
					   }
				   
				  if($postoji == false)
				   {
					   $upit = $veza->prepare("INSERT INTO Korisnik (id, Ime, Prezime, Username, Email, Password) VALUES (:id, :ime, :prezime, :username, :email, :password)");
					   
					   $upit -> bindValue(":id", $id, PDO::PARAM_INT);
					   $upit -> bindValue(":ime", $Ime, PDO::PARAM_STR);
					   $upit -> bindValue(":prezime", $Prezime, PDO::PARAM_STR);
					   $upit -> bindValue(":username", $Username, PDO::PARAM_STR);
					   $upit -> bindValue(":email", $Email, PDO::PARAM_STR);
					   $upit -> bindValue(":password", $Password, PDO::PARAM_STR);
					   $rez =  $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška: " . $greska[2];
		                exit();
		                }
				   }
			   }
		
		         $postoji = false;
			     foreach($xml_komentari->children()->children() as $komentar)
			   {
				   $id = $komentar -> id;
				   $Tekst = $komentar -> tekst;
				   $Novost = $komentar -> idNovost;
				   $Korisniik = $komentar -> idKorisnik;

				 
				   $rezultat = $veza->query("select id, Tekst, Novost, Korisnik from Komentar");
				   
				    if (!$rezultat) {
                      $greska = $veza->errorInfo();
                      print "SQL greška: " . $greska[2];
                      exit();
                     } 
					 
					   foreach ($rezultat as $komentar) {
						   if($komentar['id'] == $id)
						   {
							   $postoji = true;
						   } 
					   }
				   
				   if($postoji == false)
				   {   
				       $upit = $veza->prepare("INSERT INTO Komentar (id, Tekst, Novost, Korisnik) VALUES (:id, :tekst, :novost, :korisnik)");
						
					   $upit -> bindValue(":id", $id, PDO::PARAM_INT);
					   $upit -> bindValue(":tekst", $Tekst, PDO::PARAM_STR);
					   $upit -> bindValue(":novost", $Novost, PDO::PARAM_INT);
					   $upit -> bindValue(":korisnik", $Korisniik, PDO::PARAM_INT);

					   $rez =  $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška: " . $greska[2];
		                exit();
		                }
			       }
			   }
 }
      
	 
}
else
{header('Refresh: 1; novosti.php');
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta name="viewport" content="width=device-width">
<TITLE>Zdravlje&amp;Ljepota</TITLE>
<link rel="stylesheet" type="text/css" href="prijava.css">
</HEAD>
<BODY> 
<script src="ajax_validacija.js" type="text/javascript" charset="utf-8"></script>
<br>
<div class = "okvir" id = "Okvir" ><br>

<div class="Header"> <h1 id = "ljiz"> Zdravlje &amp; Ljepota </h1></div>


<br>
<div id ="iefix">
<ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="zdravlje.php">Zdravlje</a></li>
                <li><a href="#" >Ljepota</a>
				    <div id = "submenu1">
				     <ul>
					    <li><a href="ljepota.php" >Novosti</a></li>
						<li><a href="galerija.php">Fashion Week</a></li>
						<li><a href="kosa_lice.php">Kosa i Lice</a></li>
					 </ul>
					 </div>
					 </li>	 
				<li><a href="lifestyle.php">Lifestyle</a></li>
				<li><a href="#">Info</a>
				<div id = "submenu2">
				     <ul>
					    <li><a href="o_nama.php"> O nama </a></li>
						<li><a href="kontakt.php">Kontakt</a></li>
					 </ul>
					 </div>
					 </li>	
				<li id = "prijava"><a href="prijava.php"><?php echo $prijava; ?></a></li>
</ul>
</div>
<br>
<br>
<br>
<br>


<div class= "row">
   <div class = "three">
      <ul id = "admin_opcije" >
	            <li><a  href="novosti.php">Novosti</a></li>
	            <li><a  href="dodaj_novost.php">Dodaj novosti</a></li>
	            <li><a href="uredi_novosti.php"> Uredi Novosti</a></li>
                <li><a href="korisnici.php">Korisnici</a></li>
				<li><a href="xml_baza.php">Prebaci iz XML u bazu</a></li>
				<li><a href="prijava.php?odjava=1">Log out</a></li>
      </ul>
	</div>
  <br><br>
  <br><br>
	
  <div class= "nine">
  <div class = "four" id = "odjava_forma">
    <form class ="odjava_form" id = "formaOdjava" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<table>
                 <tr>
					<td> <label> Uspješno prebačeni podaci </label></td>
					<td> <input type="submit" value="Okej" class="dugme" id = "dugme" name = "baza"</td>
			</tr>
	</table>
	</form>
</div>
</div>
</div>
</div>
</BODY> 
</HTML>