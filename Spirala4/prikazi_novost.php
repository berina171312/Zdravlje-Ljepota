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
<link rel="stylesheet" type="text/css" href="home.css">
</HEAD>
<BODY> 
<?php
          $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=wtspirala4', 'wtberina', 'wt.moja.lozinka.1.s4');
       $veza->exec("set names utf8");
      $komentarErr = "";
	  $komentar = "";
	  $korisnik_id;
      $obavijest = "";
	  $poruka = "Hej, daj nam svoje mišljenje! :D";
  if(isset($_POST['dodaj_komentar']))
  {
	  
	  if(isset($_SESSION['username'])){
		  
	  if(isset($_GET["id"]))
	  {
		  $id_novost = $_GET["id"];
	  }
	 
	  if(empty($_POST['Komentar']))
	   {
		   $komentarErr = " * Niste unijeli komentar ";
	   }
	   else
	   {
		  $komentar = test_input($_POST["Komentar"]);
		  $user = $_SESSION['username'];
	   }
	   
	   
	   if($komentarErr == "")
	   {

					 $upit2 = $veza->prepare("SELECT id,username FROM Korisnik WHERE username=:un");
					 $upit2 -> bindValue(":un", $user, PDO::PARAM_STR);
					 $upit2->execute();
					 $rezultat = $upit2 -> fetchAll();
				   
				   foreach ($rezultat as $k)
				   {
					   if($k['username'] == $user)
					     $korisnik_id = $k['id'];
					   
				   }
				   
				    if (!$upit2) {
                      $greska = $veza->errorInfo();
                      print "SQL greška1: " . $greska[2];
                      exit();
                     } 

					  $upit = $veza->prepare("INSERT INTO Komentar (Tekst, Novost, Korisnik) VALUES (:tekst, :novost, :korisnik)");
					   $upit -> bindValue(":tekst", $komentar, PDO::PARAM_STR);
					   $upit -> bindValue(":novost", $id_novost, PDO::PARAM_INT);
					   $upit -> bindValue(":korisnik", $korisnik_id, PDO::PARAM_INT);

					   $rez = $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška2: " . $greska[2];
		                exit();
		                }
		 /*  if(file_exists ('Xml/komentari.xml') && file_exists('Xml/korisnici.xml'))  
			   {
				   $xml_komentar = simplexml_load_file('Xml/komentari.xml');
                   $xml_korisnik = simplexml_load_file('Xml/korisnici.xml');

							$broj_elemenata = $xml_korisnik->children()->children()->count();
	                        $korisnik = $xml_korisnik->children()->children();
	   
			               for($i = 0 ; $i < $broj_elemenata; $i++)
			                 {
				                 if($korisnik[$i] -> username == $user)
				                  {
					                $id_user = $korisnik[$i] -> id;

				                  }
			                 }
							 
				    $broj_komentar = $xml_komentar->children()->children()->count();
					$broj_komentar = $broj_komentar + 1;
				    $Komentar = $xml_komentar->komentari[0]->addChild("komentar", ' ');
			        $Komentar->addChild('tekst', $komentar);
			        $Komentar->addChild('idNovost',$id_novost);
			        $Komentar->addChild('idKorisnik',$id_user);
			        $Komentar->addChild('id',$broj_komentar);
			        $xml_komentar->asXML('Xml/komentari.xml'); 

					$poruka = "Uspješno dodan komentar";
					 header('Refresh: 1; URL = home.php');
			   }*/
	   }
	  }
	  else
	  {
		  $obavijest = "Morate biti registrovani za dodavanje komentara!";
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
				<li id = "prijava"><a href="prijava.php"> <?php echo $prijava; ?></a></li>
</ul>
</div>
<br>
<br>
<br>
<br>
<div class = "row">
<div class = "four" id = "news">
<h2 id = "vijesti">  <?php echo $poruka; ?> </h2></div></div>
<br>
<div class = "eleven">
	<?php
	
	if(isset($_GET['id'])){
		
	    $id_novosti = $_GET["id"];
	   if(file_exists('Xml/novosti.xml'))
	  {
	           $xml = simplexml_load_file('Xml/novosti.xml');
			   $broj_elemenata = $xml->children()->children()->count();
			   $novost = $xml->children()->children();
			   for ($x = 0; $x < $broj_elemenata; $x++) {
				   
				    if($novost[$x] -> id == $id_novosti){?>
				   
                    <div class = "row">
				   <div class = "eleven" id = "clanakhome_prikazi">
                    <h1 id = "naslov_home"><?php echo $novost[$x] -> naziv;?></h1>

					<img id = "slika_home" src = "<?php echo $novost[$x] -> slika;?>" alt="Photo" width="400" height="200">

                    <p id = "paragraf_home" > <?php echo $novost[$x] -> sadrzaj; ?></p>	
                   </div>
				   </div>
			    
			<div class = "row" id="forma_red">
			<div class = "eight">
			<form class ="novosti_form" id = "formaNovosti" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $id_novosti;?>" enctype="multipart/form-data" method="post" >
		     <table>
				<tr>
					<td></td>
					<td> <textarea type="text" name="Komentar" id = "Komentar" placeholder = "Upiši svoj komentar..." ></textarea><td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "komentarGreska"><?php echo $komentarErr;?></div></td>
				</tr>
				
				<tr>
				<td></td>
				<td><div style = "color:red"><?php echo $obavijest; ?></td>
				</tr>
				<tr>
					<td></td>
					<td> <br> <input type="submit" value="Komentariši" class="dugme" id = "dugme" name = "dodaj_komentar"> </td>
				</tr>
			</table>
		</form>
		</div>
		</div>
			     <?php
					}
			   }				
	  }
	  
	  
	}
	?>
</div>	

</div>
</BODY>
</HTML>