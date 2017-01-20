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
<link rel="stylesheet" type="text/css" href="prijava.css">
</HEAD>
<BODY> 
<br>
<script src="ajax_validacija.js" type="text/javascript" charset="utf-8"></script>
<?php

//Login, provjera passworda i username-a
   $poruka = "Prijavljeni ste";
   $username = $password = "";
   $usernameErr = $passwordErr = "";
   if(!isset($_SESSION['username'])){
	   $poruka = "Imaš korisnički račun? Prijavi se!";
   if($_SERVER["REQUEST_METHOD"] == "POST")
   { 
        if(isset($_POST['login'])){
		if(empty($_POST['username']))
	   {
		   $usernameErr = "* Username je obavezno polje ";
	   }
	   else
	   {
		  $username = test_input($_POST["username"]);
		  if(!preg_match('/^[A-Za-z][A-Za-z0-9]{4,15}$/', $username))
			  {$usernameErr = "* Username nije validan";}
	   }
	   
	   if(empty($_POST['password']))
	   {
		   $passwordErr = "*Password je obavezno polje";
	   }
	   else
	   {
		  $password = test_input($_POST["password"]);
		  if(strlen($password) < 6)
		  {$passwordErr = "* Password treba imati minimalno 6 karaktera.";}
	   }

	  
	  if($passwordErr == "" && $usernameErr==""){
		  
		  $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=wtspirala4', 'wtberina', 'wt.moja.lozinka.1.s4');
		  $upit = $veza->prepare("SELECT * FROM Korisnik");
					   /*$upit -> bindValue(":id", $id, PDO::PARAM_INT);
					   $upit -> bindValue(":ime", $Ime, PDO::PARAM_STR);
					   $upit -> bindValue(":prezime", $Prezime, PDO::PARAM_STR);
					   $upit -> bindValue(":username", $Username, PDO::PARAM_STR);
					   $upit -> bindValue(":email", $Email, PDO::PARAM_STR);
					   $upit -> bindValue(":password", $Password, PDO::PARAM_STR);*/
					   $rez =  $upit->execute();
					   $rezultat = $upit -> fetchAll();
					   
			           if (!$rez) {
	    		       	$greska = $veza->errorInfo();
		                 print "SQL greška: " . $greska[2];
		                exit();
		                }
						foreach ($rezultat as $k){
							
						if($k['Username'] == $username &&  md5($password) == $k['Password']){
							$_SESSION['username'] = $username;
						 $_SESSION['password'] = md5($password);
						 $poruka = "Dobrodošli, " . $_SESSION['username'] . "!   Uspješno ste prijavljeni!";
						 $prijava = "Sign out";
						 if($_SESSION['username'] == "admin" && $_SESSION['password'] == md5("mojalozinka"))
							 header('Refresh: 1; URL = novosti.php');
						 else
					     header('Refresh: 1; URL = prijava.php');
					 break;
					 }
				else
				 { $poruka = "Ne postoji korisnik sa datim username imenom.";
			       header('Refresh: 0; URL = prijava.php');
				 }
		 }
   }
   else
	 $poruka = "Ponovite unos!";  
   }
   }
}

   if(isset($_POST['odjava']))
   {
	   session_unset();
	   $poruka = "Uspješno ste odjavljeni!";
	   header('Refresh: 1; URL = prijava.php');
   }
   
  function test_input($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
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
				<li id = "prijava"><a href="prijava.php"> <?php echo $prijava;?></a></li>
</ul>
</div>
<br>
<br>
<br>
<br>

<div class = "row">
<div class = "six" id = "news">
<h2 id = "vijesti"> <?php echo $poruka; ?>  </h2></div></div>
<?php
$xml = simplexml_load_file('Xml/korisnici.xml');
$admin_un = $xml->korisnici[0]->korisnik->username;
$admin_pass = $xml->korisnici[0]->korisnik->password;
if(isset($_SESSION['username']) && $admin_un == $_SESSION['username'] && $admin_pass ==  $_SESSION['password']  && !isset($_GET['odjava'])){
 
header('Location: novosti.php');
}

elseif((isset($_SESSION['username']) && isset($_GET['odjava']) && $admin_un == $_SESSION['username'] && $admin_pass ==  $_SESSION['password']) || isset($_SESSION['username'])) 
{
?>
<div class = "four" id = "odjava_forma">

    <form class ="odjava_form" id = "formaOdjava" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<table>
                 <tr>
					<td> <label> Želite se odjaviti? </label></td>
					<td> <input type="submit" value="Odjavi se" class="dugme" id = "dugme" name = "odjava"</td>
	
			</tr>
	</table>
	</form>
</div>
<?php
}
else
{  ?>
<div class = "four" id = "prijava_forma">
        <form class ="prijava_form" id = "formaPrijava" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<table>
				<tr>
					<td> <label> Username: </label></td>
					<td> <input type="text" name="username" id = "Username" value= "<?php echo $username;?>" placeholder = "admin"></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div style = "color:red" id = "usernameGreska"> <?php echo $usernameErr;?></div></td>
				</tr>
				
				<tr>
					<td> <label> Password:  </label></td>
					<td> <input type="password" name="password" id = "Password" value= "<?php echo $password;?>" placeholder = "mojalozinka"><td>
				</tr>
				

				<tr>
				    <td></td>
					<td><div style = "color:red" id = "passwordGreska"> <?php echo $passwordErr;?></div></td>
				</tr>

				
				<tr>
					<td> <br> <a href = "registracija.php" id = "registracija"> Registruj se </td>
					<td> <br> <input type="submit" value="Prijavi se" class="dugme" id = "dugme" name = "login"> </td>
				</tr>
			</table>
		</form>
</div>
	<?php
}

?>

</div>
</BODY> 
</HTML>