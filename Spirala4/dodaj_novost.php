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

   $poruka = "Koju novost želite dodati?";
   $naslov = $tekst = $tip_clanka = $uploadfile = "";
   $naslovErr = $tekstErr = $tip_clankaErr = $uploadfileErr = "";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
   if(isset($_POST['dodaj_novost']))
   {
	  
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
					   $upit -> bindValue(":naslov", $naslov, PDO::PARAM_STR);
					   $upit -> bindValue(":tekst", $tekst, PDO::PARAM_STR);
					   $upit -> bindValue(":slika", $uploadfile, PDO::PARAM_STR);
					   $upit -> bindValue(":tip_clanka", $tip_clanka, PDO::PARAM_STR);
					   $rez =  $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška: " . $greska[2];
		                exit();
		                }
	              $poruka = "Uspješno dodana novost!";
			      header('Refresh: 1; URL = novosti.php');
			      
			/* if(file_exists('Xml/novosti.xml'))
	           {
				   $broj_clanaka = 0;
	              $xml_nova_novost = simplexml_load_file('Xml/novosti.xml');
                   if(empty($xml_nova_novost->getName()) ||  count($xml_nova_novost->children())== 0)
				   {
					   $broj_clanaka = 1;
					   $br =  count($xml_nova_novost->children());
				   $xml_nova_novost->addChild("novosti");
				   $novost = $xml_nova_novost->novosti[0]->addChild("novost", ' ');
			       $novost->addChild('naziv', $naslov);
			       $novost->addChild('sadrzaj',$tekst);
			       $novost->addChild('kategorija',$tip_clanka);
			       $novost->addChild('slika', $uploadfile);
			       $novost->addChild('id',$broj_clanaka);
			       $xml_nova_novost->asXML('Xml/novosti.xml');
				   }
				   else{
				   $broj_clanaka = $xml_nova_novost->children()->children()->count();
			       $broj_clanaka = $broj_clanaka + 1;
			       $novost = $xml_nova_novost->novosti[0]->addChild("novost", ' ');
			       $novost->addChild('naziv', $naslov);
			       $novost->addChild('sadrzaj',$tekst);
			       $novost->addChild('kategorija',$tip_clanka);
			       $novost->addChild('slika', $uploadfile);
			       $novost->addChild('id',$broj_clanaka);
			       $xml_nova_novost->asXML('Xml/novosti.xml');
				   }

			      $poruka = "Uspješno dodana novost!";
			      header('Refresh: 1; URL = novosti.php');
	          }*/
       }
   }
 }

   if(isset($_POST['odjava']))
   {
	   session_unset();
	   $poruka = "Uspješno ste odjavljeni!";
	   header('Refresh: 0; URL = prijava.php');
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
<h2 id = "vijesti"> <?php echo $poruka; ?> </h2></div></div>

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

    <div class = "six" id = "novosti_forma">
        <form class ="novosti_form" id = "formaNovosti" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post" >
		<table>
				<tr>
					<td> <label> Naslov: </label></td>
					<td> <input type="text" name="naslov" id = "Unos_Naslov" value= "<?php echo $naslov;?>" onchange = 'validacijaNaslov("formaNovosti", "naslov", "dodaj_novost")'></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "naslovGreska"> <?php echo $naslovErr;?> </div></td>
				</tr>
				
				<tr>
					<td> <label> Sadržaj:  </label></td>
					<td> <textarea type="text" name="tekst" id = "Tekst"  onchange = 'validacijaSadrzaj("formaNovosti", "tekst","dodaj_novost")'><?php echo $tekst;?></textarea><td>
				</tr>
				

				<tr>
				    <td></td>
					<td><div style = "color:red" id = "textGreska"><?php echo $tekstErr;?></div></td>
				</tr>

				<tr>
					<td> <label> Slika: </label></td>
					<td> <br><input type="file" id="Ucitaj_Slika" name="upload_slika" ><td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "slikaGreska"><?php echo $uploadfileErr;?></div></td>
				</tr>
				
				<tr>
				            <td><label> Tip članka: </label></td>
							<td><select id="tipClanka" name="tipClanka">
							<option value="none">Izaberite tip članka</option>
						    <option value="Home">Home</option>
						    <option value="Zdravlje">Zdravlje</option>
						    <option value="Ljepota">Ljepota</option>
						    <option value="Lifestyle">Lifestyle</option>
							</select>
							</td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "clanakGreska"><?php echo $tip_clankaErr;?></div></td>
				</tr>
				
				
				<tr>
					<td></td>
					<td> <br> <input type="submit" value="Dodaj novost" class="dugme" id = "dugme" name = "dodaj_novost"> </td>
				</tr>
			</table>
		</form>

</div>
</div>
</div>

</BODY> 
</HTML>