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
<script src="ajax_validacija.js" type="text/javascript" charset="utf-8"></script>

<?php
$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=wtspirala4', 'wtberina', 'wt.moja.lozinka.1.s4');
$veza->exec("set names utf8");
$poruka = "Lista korisnika";
if(isset($_POST['obrisi']))
   {
	   if(isset($_GET['id'])){
	   $id_user = $_GET['id'];
	   /*$xml_brisanje_korisnika = simplexml_load_file('Xml/korisnici.xml');
	   $broj_elemenata = $xml_brisanje_korisnika->children()->children()->count();
	   $korisnikk = $xml_brisanje_korisnika->children()->children();
	   
			   for($i= 0 ; $i < $broj_elemenata; $i++)
			   {
				   if($korisnikk[$i] -> id == $id_user)
				   {
					   unset($korisnikk[$i]);
				      $poruka = "Uspješno obrisan korisnik!";
				   }
			   }
			   $xml_brisanje_korisnika->asXML('Xml/korisnici.xml');*/
			   
			           $upit = $veza->prepare("DELETE FROM Komentar WHERE Korisnik = :Id;");
					   $upit -> bindValue(":Id", $id_user, PDO::PARAM_INT);
					   $rez =  $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška1: " . $greska[2];
		                exit();
		                }
						
					   $upit2 = $veza->prepare("DELETE FROM Korisnik WHERE id = :Id;");
					   $upit2 -> bindValue(":Id", $id_user, PDO::PARAM_INT);
					   $rez2 =  $upit2->execute();
					   
			           if (!$rez2) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška2: " . $greska[2];
		                exit();
		                }
			   
			   
			  header('Refresh: 0; URL = korisnici.php');
   }
   }
	
?>
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
<h2 id = "vijesti"> <?php echo $poruka; ?> </h2><div class = "row">
                       <a class = "dugme" id = "download_pdf" href = "download_pdf.php">Preuzmi izvještaj</a>
					   </div><br></div></div>

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
    <div class = "six" id="lista_korisnici">
	<br>
	<div class = "row">

	<form id = "forma" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class="form-wrapper cf" action = "korisnici.php">
    <input type="text" id = "pretragaUnos" name = "pretragaUnos" onkeyup = "pretraga(this.value)" placeholder= "Pretraži korisnike">
	<input type= "submit" class = "dugme" name = "dugmepretraga" id = "dugmepretraga" value = "Pretraga">
    <div id="livesearch"></div>
    </form>
	 </div>
	 <br>
	<div class = "row" id = "red_clanak">
	<?php
	
	
	if(isset($_POST['dugmepretraga']))
{
	
	if(isset($_POST['pretragaUnos']))
	{
		$q = $_POST['pretragaUnos'];
		
	  
	    
		 $upit = $veza->prepare("SELECT * FROM Korisnik");
					 $upit ->execute();
					 $rezultat = $upit -> fetchAll();
					 
					if (!$upit) {
                      $greska = $veza->errorInfo();
                      print "SQL greška1: " . $greska[2];
                      exit();
                     } 
				   
				   foreach ($rezultat as $k)
				   {
		
		             if(stripos($k['Ime'], $q) === false  && stripos($k['Prezime'],$q) === false){}
					 
		
	  /* if(file_exists('Xml/korisnici.xml'))
	  {
	         $xml = simplexml_load_file('Xml/korisnici.xml');
                
			 foreach($xml->children()->children() as $korisnik)
			   {  
			   if(stripos($korisnik -> ime, $q) === false  && stripos($korisnik -> prezime,$q) === false)
					{
					}*/
					else
					{?>
				    
				       <div id = "korisnici">
                        <h1 id="username"> Username:   <?php echo $korisnik->username; ?></h1>
						<p id= "paragraf_korisnik" >   Ime: <?php echo $korisnik->ime; ?> <br> Prezime: <?php echo $korisnik->prezime; ?> <br> Email: <?php echo $korisnik->email; ?></p>
						<form action = "korisnici.php?id=<?=$korisnik->id?>"  method = "post">
						<input type="submit" value="Obriši korisnika" class="dugme" id = "dugme_obrisi" name = "obrisi">
                        </form>						
                       </div> 
				  
				<?php
			   }
/*			   
	  }*/
}	
}
}

else{
	$upit = $veza->prepare("SELECT * FROM Korisnik");
					 $upit ->execute();
					 $rezultat = $upit -> fetchAll();
					 
					if (!$upit) {
                      $greska = $veza->errorInfo();
                      print "SQL greška1: " . $greska[2];
                      exit();
                     } 
				   
				   foreach ($rezultat as $k)
				   {
	  /* if(file_exists('Xml/korisnici.xml'))
	  {
	         $xml = simplexml_load_file('Xml/korisnici.xml');
                
			 foreach($xml->children()->children() as $korisnik)
			   {  
			   if($korisnik->username != "admin"){*/?>
				    
				       <div id = "korisnici">
                        <h1 id="username"> Username:   <?php echo $k['Username']; ?></h1>
						<p id= "paragraf_korisnik" >   Ime: <?php echo $k['Ime']; ?> <br> Prezime: <?php echo $k['Prezime']; ?> <br> Email: <?php echo $k['Email']; ?></p>
						<form action = "korisnici.php?id=<?=$k['id']?>"  method = "post">
						<input type="submit" value="Obriši korisnika" class="dugme" id = "dugme_obrisi" name = "obrisi">
                        </form>						
                       </div> 
				  
				<?php
			   }/*}	   
	  }*/
	  }
	?>
	 </div>
	 </div>
</div>
</div>

</BODY> 
</HTML>