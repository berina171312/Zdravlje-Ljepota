<?php
 session_start();
 if(isset($_SESSION['username']) && $_SESSION['username'] == "admin") $prijava = "Admin postavke";
  elseif(isset($_SESSION['username'])) $prijava = "Odjavi se";
  else $prijava = "Hej, pridruži nam se!";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta name="viewport" content="width=device-width">
<TITLE>Zdravlje&amp;Ljepota</TITLE>
<link rel="stylesheet" type="text/css" href="novosti.css">
</HEAD>
<BODY> 

<?php

    $veza = new PDO("mysql:dbname=wtspirala4;host=localhost;charset=utf8", "wtberina", "wt.moja.lozinka.1.s4");
    $veza->exec("set names utf8");
   
   $poruka = "Novost koju uređujete: ";
   $izmjena = false;
    $naslov = $tekst = $tip_clanka = $uploadfile = "";
   $naslovErr = $tekstErr = $tip_clankaErr = $uploadfileErr = "";
   if(isset($_POST['uredi']))
   {
	   if(isset($_GET["id"])){
	  $id_novosti = $_GET["id"];
	  
	  if(empty($_POST['naslov']))
	   {
		   $naslovErr = " * Unesite naslov ";
	   }
	   else
	   {
		  $naslov = test_input($_POST["naslov"]);
	   }
	   
	   if(empty($_POST['tekst']))
	   {
		   $tekstErr = " * Unesite sadržaj ";
	   }
	   else
	   {
		  $tekst = test_input($_POST["tekst"]);
	   }
	  
	  if(empty($_POST['tipClanka']) || $_POST['tipClanka'] == "none")
	   {
		   $tip_clankaErr = " * Odaberite kategoriju članka ";
	   }
	   else
	   {
		  $tip_clanka = test_input($_POST["tipClanka"]);
	   }
	  
	  
	  if(isset($_FILES['upload_slika'])){
		        
			    $uploaddir = 'slike/';
                $uploadfile = $uploaddir . basename($_FILES['upload_slika']['name']);
				if($uploadfile != $uploaddir){
				$info = getimagesize($_FILES['upload_slika']['tmp_name']);
				if ($info === FALSE)
				{
					$uploadfileErr = "* Nemoguće odrediti tip učitanog dokumenta.";
				}
				
				if (($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) { 
				   $uploadfileErr = "* Tip odabranog fajla mora biti JPEG ili PNG ";
                }

          if(move_uploaded_file($_FILES['upload_slika']['tmp_name'], $uploadfile))
          {		
			   $uploadfileErr = "";
          }
		   else
			   $uploadfileErr = "* Slika nije učitana ";
		}
		else
			$uploadfileErr = "* Odaberite sliku ";
	  }
	  else
		  $uploadfileErr = "* Odaberite sliku ";
	  
	  if($naslovErr == "" && $tekstErr == "" && $tip_clankaErr == "" &&  $uploadfileErr == ""){

		               $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=wtspirala4', 'wtberina', 'wt.moja.lozinka.1.s4');
				       $upit -> bindValue(":Id", $id_novosti, PDO::PARAM_INT);
					   $upit -> bindValue(":naslov", $naslov, PDO::PARAM_STR);
					   $upit -> bindValue(":sadrzaj",$tekst, PDO::PARAM_STR);
					   $upit -> bindValue(":slika", $uploadfile, PDO::PARAM_STR);
					   $upit -> bindValue(":kategorija", $tip_clanka, PDO::PARAM_STR);
					   $rez =  $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška: " . $greska[2];
		                exit();
		                }
						$poruka = "Uspješno izmijenjena novost!";
			header('Refresh: 1; URL = uredi_novosti.php');
	  /*if(file_exists('Xml/novosti.xml'))
	  {
	           $xml_izmjena_novosti = simplexml_load_file('Xml/novosti.xml');
			   
			   foreach($xml_izmjena_novosti->children()->children() as $novost)
			   {  
			          if($novost -> id == $id_novosti)
					  {   
				          $novost -> naziv = $naslov;
						  $novost -> sadrzaj = $tekst;
						  $novost -> kategorija = $tip_clanka; 
						  $novost -> slika = $uploadfile;
						  $izmjena = true;
                		  break;			  
					  }
			   }
			   
			$xml_izmjena_novosti->asXML('Xml/novosti.xml');

			$poruka = "Uspješno izmijenjena novost!";
			header('Refresh: 1; URL = uredi_novosti.php');
	  }
	  else
		  $poruka = "Nije pronađen XML fajl!";*/
	}
   }
   }
   if(isset($_POST['obrisi']))
   {
	   if(isset($_GET["id"])){ 
	   $id_novosti = $_GET["id"];
	 
	  /* $xml_brisanje_novosti = simplexml_load_file('Xml/novosti.xml');
	   $broj_elemenata = $xml_brisanje_novosti->children()->children()->count();
	   $novost = $xml_brisanje_novosti->children()->children();
	   
			   for($i = 0; $i < $broj_elemenata; $i++)
			   {
				   
				   if($novost[$i]->id == $id_novosti)
				   {
					   if($i != $broj_elemenata - 1)
					   {
						   $i++;
						   $novost[$i]->id =$id_novosti;
						   $i--;
					   }
					   
					   unset($novost[$i]);
					  
				      $poruka = "Uspješno obrisana novost!";
					  break;
				   }
			   }
			   $xml_brisanje_novosti->asXML('Xml/novosti.xml');*/
			   
			   
			   $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=wtspirala4', 'wtberina', 'wt.moja.lozinka.1.s4');
			           $upit = $veza->prepare("DELETE FROM Komentar WHERE Novost = :Id;");
					   $upit -> bindValue(":Id", $id_novosti, PDO::PARAM_INT);
					   $rez =  $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška1: " . $greska[2];
		                exit();
		                }
						
					 $upit2 = $veza->prepare("DELETE FROM Novost WHERE id = :Id;");
					   $upit2 -> bindValue(":Id", $id_novosti, PDO::PARAM_INT);
					   $rez2 =  $upit2->execute();
					   
			           if (!$rez2) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška2: " . $greska[2];
		                exit();
		                }
			   
			  header('Refresh: 0; URL = uredi_novosti.php');
	   }
   }
   
     function test_input($podatak) {
  $podatak = htmlspecialchars($podatak);
  return $podatak;
 }
   
?>

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

<div class = "row">
<div class = "six" id = "news">
<h2 id = "vijesti">  <?php echo $poruka;
                 if($izmjena == false){
                 if(isset($_GET["id"])){
				 $novost =  $_GET["id"];
                 $xml = simplexml_load_file('Xml/novosti.xml');
                foreach($xml->children()->children() as $n)
			   {  
                     if($n->id == $novost)
					 { echo $n->naziv;
				       break;
					 }
     
			   }
				 }
				 }

?> </h2></div></div>

<div class= "row">
   <div class = "three">
      <ul id = "admin_opcije" >
	            <li><a href="novosti.php">Novosti</a></li>
	            <li><a href="dodaj_novost.php">Dodaj novosti</a></li>
	            <li><a href="uredi_novosti.php"> Uredi Novosti</a></li>
                <li><a href="korisnici.php">Korisnici</a></li>
				<li><a href="xml_baza.php">Prebaci iz XML u bazu</a></li>
				<li><a href="prijava.php?odjava=1">Log out</a></li>
      </ul>
	</div>

	<?php
	   $upit = $veza->prepare("SELECT * FROM Novost");
					 $upit ->execute();
					 $rezultat = $upit -> fetchAll();
					 
					if (!$upit) {
                      $greska = $veza->errorInfo();
                      print "SQL greška1: " . $greska[2];
                      exit();
                     } 
				   
				   foreach ($rezultat as $k)
				   {?>
		<div class = "six" id = "novosti_forma">		    
        <form class ="novosti_form" id = "formaNovosti" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?=$k['id']?>" enctype="multipart/form-data" method="post">
		<table>
				<tr>
					<td> <label> Naslov: </label></td>
					<td> <input type="text" name="naslov" id = "Naslov" value="<?php echo $k['Naslov']; ?>" onchange = 'validacijaNaslov("formaNovosti", "naslov","uredi")'></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "naslovGreska"><?php echo $naslovErr;?></div></td>
				</tr>
				
				<tr>
					<td> <label> Sadržaj:  </label></td>
					<td> <textarea type="text" name="tekst" id = "Tekst" onchange = 'validacijaSadrzaj("formaNovosti", "tekst","uredi")'> <?php echo $k['Sadrzaj']; ?></textarea><td>
				</tr>
				

				<tr>
				    <td></td>
					<td><div id = "textGreska"><?php echo $tekstErr;?></div></td>
				</tr>

				<tr>
					<td> <label> Slika: </label></td>
					<td> <input type="file" id="Ucitaj_Slika" name="upload_slika" ><td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "slikaGreska"><?php echo $uploadfileErr;?></div></td>
				</tr>
				
				<tr>
				            <td><label> Tip članka: </label></td>
							<td><select id="tipClanka" name="tipClanka">
							<option value="none">Izaberite tip članka</option>
						    <option value="Home" <?php if($k['Kategorija'] == "Home") {?> selected="selected"; <?php } ?>>Home</option>
						    <option value="Zdravlje" <?php if($k['Kategorija'] == "Zdravlje") {?> selected="selected"; <?php } ?>>Zdravlje</option>
						    <option value="Ljepota" <?php if($k['Kategorija'] == "Ljepota") {?> selected="selected"; <?php } ?>>Ljepota</option>
						    <option value="Lifestyle" <?php if($k['Kategorija'] == "Lifestyle") {?> selected="selected"; <?php } ?>>Lifestyle</option>
							</select>
							</td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "clanakGreska"><?php echo $tip_clankaErr;?></div></td>
				</tr>
				
				
				<tr>
				     <td></td>
					<td> <input type="submit" value="Uredi novost" class="dugme" id = "dugme_uredi" name = "uredi"></td>
				</tr>
				
				<tr>
                     <td></td>				
					<td> <input type="submit" value="Obriši novost" class="dugme" id = "dugme_obrisi" name = "obrisi"> </td>
				</tr>
				
			</table>
		</form>
		</div>	  
				<?php break;
			  }
	
	?>
</div>
</div>

</BODY> 
</HTML>