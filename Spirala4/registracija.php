<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta name="viewport" content="width=device-width">
<TITLE>Zdravlje&amp;Ljepota</TITLE>
<link rel="stylesheet" type="text/css" href="registracija.css">
<link rel="stylesheet" type="text/xml" href="korisnici.xml">
</HEAD>
<BODY>

<?php

    
	$veza = new PDO("mysql:dbname=wtspirala4;host=localhost;charset=utf8", "wtberina", "wt.moja.lozinka.1.s4");
    $veza->exec("set names utf8");
   $poruka = "Još nemaš korisnički račun?". "<br>" . "Budi dio tima Zdravlje&Ljepota, registruj se!";
   $imeErr = $prezimeErr = $emailErr = $usernameErr = $lozinkaErr = $potvrdaLozinkaErr = "";
   $ime = $prezime = $email = $username = $lozinka = $potvrdaLozinka = "";
   $postoji_li_user_name = false;
   if($_SERVER["REQUEST_METHOD"] == "POST"){
   if(isset($_POST['register']))
   {
	  
	  if(empty($_POST['ime']))
	   {
		   $imeErr = " * Unesite ime ";
	   }
	   else
	   {
		  $ime = test_input($_POST["ime"]);
		  if(!preg_match('/^[a-zA-Z]{2,10}$/', $ime))
			  {$imeErr = " * Ime nije validno uneseno";}
	   }
	   
	   if(empty($_POST['prezime']))
	   {
		   $prezimeErr = " * Unesite prezime ";
	   }
	   else
	   {
		  $prezime = test_input($_POST["prezime"]);
		  if(!preg_match('/^[a-zA-Z]{3,15}$/', $prezime))
			  {$prezimeErr = "*  Prezime nije validno uneseno";}
	   }
	   
	   if(empty($_POST['email']))
	   {
		   $emailErr = " * Unesite email ";
	   }
	   else
	   {
		  $email = test_input($_POST["email"]);
		  if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email))
			  {$emailErr = "*  Format email-a nije ispravan ";}
	   }
	   
	   if(empty($_POST['username']))
	   {
		   $usernameErr = "* Unesite username ";
	   }
	   else
	   {
		  $username = test_input($_POST["username"]);
		  if(!preg_match('/^[A-Za-z][A-Za-z0-9]{4,15}$/', $username))
			  {$usernameErr = "* Username nije validno unesen. ";}
	   }
	   
	    if(empty($_POST['lozinka']))
	   {
		   $lozinkaErr = " * Unesite password ";
	   }
	   else
	   {
		  $lozinka = test_input($_POST["lozinka"]);
		     if(strlen($lozinka) < 6)
			  {$lozinkaErr = "*  Password nije validno unesen. Minimalno 6 karaktera. ";}

	   }
	   
	   if(empty($_POST['potvrda_lozinka']))
	   {
		   $potvrdaLozinkaErr = " * Unesite password ponovo ";
	   }
	   else
	   {
		  $potvrdaLozinka = test_input($_POST["potvrda_lozinka"]);
		     if($lozinka != "" && $potvrdaLozinka != $lozinka)
			  {$potvrdaLozinkaErr = "*  Potvrda se ne slaže sa unesenom lozinkom ";}
		     else if($lozinka == "")
			 {$potvrdaLozinkaErr = "* Popunite prethodno polje za password ";}
	   }
	  
	  

	  if($imeErr == "" && $prezimeErr == "" && $emailErr=="" && $usernameErr=="" && $lozinkaErr=="" && $potvrdaLozinkaErr==""){
		  
		  $upit = $veza->prepare("INSERT INTO Korisnik (Ime, Prezime, Username, Email, Password) VALUES (:ime, :prezime, :username, :email, :password)");
					   
					   
					   $upit -> bindValue(":ime", $ime, PDO::PARAM_STR);
					   $upit -> bindValue(":prezime", $prezime, PDO::PARAM_STR);
					   $upit -> bindValue(":username", $username, PDO::PARAM_STR);
					   $upit -> bindValue(":email", $email, PDO::PARAM_STR);
					   $upit -> bindValue(":password", md5($lozinka), PDO::PARAM_STR);
					   
					   $rez =  $upit->execute();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška: " . $greska[2];
		                exit();
		  
					   }
		     $poruka = "Registracija uspješna.";
			header('Refresh: 1; URL = prijava.php');
		  
	 /* if(file_exists('Xml/korisnici.xml'))
	  {
	           $xml_novi_korisnik = simplexml_load_file('Xml/korisnici.xml');
			   foreach($xml_novi_korisnik->children()->children() as $un)
			   {
			      if($username == $un->username){ $postoji_li_user_name = true; }
				
			   }
			   
			if($postoji_li_user_name == false) {
			
			$broj_korisnika = $xml_novi_korisnik->children()->children()->count();
			$broj_korisnika = $broj_korisnika + 1;
			$korisnik = $xml_novi_korisnik ->korisnici[0]->addChild("korisnik", ' ');
			$korisnik->addChild('ime',$ime);
			$korisnik->addChild('prezime',$prezime);
			$korisnik->addChild('email',$email);
			$korisnik->addChild('username',$username);
			$korisnik->addChild('password', md5($lozinka));
			$korisnik->addChild('potvrdapassword',md5($potvrdaLozinka));
			$korisnik->addChild('id', $broj_korisnika);
			$xml_novi_korisnik->asXML("Xml/korisnici.xml");
			$poruka = "Registracija uspješna.";
			header('Refresh: 1; URL = prijava.php');
		}
			else
			{
				$poruka = "Korisnik sa datim username imenom već postoji. Ponovite unos!";
			}
				
	  }*/
	  }
	  else $poruka = "Ponovite unos!";
   }
}
 if(isset($_POST["prijava"]))
 {
	 header('Refresh: 0; URL = prijava.php');
 }
 function test_input($podatak) {
  $podatak = trim($podatak);
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
				<li id = "prijava"><a href="prijava.php">Hej, pridruži nam se!</a></li>
</ul>
</div>
<br>
<br>
<br>
<br>

<div class = "row">
<div class = "six" id = "news">
<h2 id = "vijesti"> <?php echo $poruka; ?>  </h2></div></div>

<div class = "four" id = "registracija_forma">
        <form class ="registracija_form" id = "formaRegistracija" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"" method="post" enctype="multipart/form-data"  accept-charset="utf-8">
		<table>
				<tr>
					<td> <label> Ime: </label></td>
					<td> <input type="text" name="ime" id = "Ime" value= "<?php echo $ime;?>" onchange = 'validacijaIme("formaRegistracija", "ime")'></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "imeGreska"><?php echo $imeErr;?></div></td>
				</tr>
				
				<tr>
					<td> <label> Prezime:  </label></td>
					<td> <input type="text" name="prezime" id = "Prezime" value= "<?php echo $prezime;?>" onchange = 'validacijaPrezime("formaRegistracija", "prezime")'><td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "prezimeGreska" ><?php echo $prezimeErr;?></div></td>
				</tr>
				
				<tr>
					<td> <label> Email: </label></td>
					<td> <input type="text" name="email" id = "Email" value= "<?php echo $email;?>" placeholder = "example@domain.com" onchange = 'validacijaEMail("formaRegistracija", "email")' ></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "emailGreska"><?php echo $emailErr;?></div></td>
				</tr>
				
				<tr>
					<td> <label> Username: </label></td>
					<td> <input type="text" name="username" id = "Username" value= "<?php echo $username;?>" onchange = 'validacijaUsername("formaRegistracija", "username")'></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "usernameGreska"><?php echo $usernameErr;?></div></td>
				</tr>
				
				<tr>
					<td> <label> Password: </label></td>
					<td> <input type="password" name="lozinka" id = "Lozinka" value= "<?php echo $lozinka;?>" onchange = 'validacijaPassword("formaRegistracija", "lozinka")'></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "lozinkaGreska"><?php echo $lozinkaErr;?></div></td>
				</tr>
				
				<tr>
					<td> <label> Ponovite password: </label></td>
					<td> <input type="password" name="potvrda_lozinka" id = "Potvrda_Lozinka" value= "<?php echo $potvrdaLozinka;?>" onchange = 'validacijaPotvrdaPassword("formaRegistracija", "potvrda_lozinka")'></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red"id = "potvrdaLozinkaGreska"><?php echo $potvrdaLozinkaErr;?></div></td>
				</tr>
				
				
				<tr>
					<td> <br><input type="submit" value="Prijava" class="dugme" id = "dugme1" name = "prijava"></td>
					<td> <br> <input type="submit" value="Registruj se" class="dugme" id = "dugme" name = "register"> </td>
				</tr>
			
			</table>
		</form>
</div>

</div>
</BODY> 
</HTML>