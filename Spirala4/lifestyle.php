<?php
  session_start();
   if(isset($_SESSION['username']) && $_SESSION['username'] == "admin") $prijava = "Admin postavke";
  elseif(isset($_SESSION['username'])) $prijava = "Odjavi se";
  else $prijava = "Hej, pridruži nam se!";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Zdravlje&amp;Ljepota</TITLE>
<link rel="stylesheet" type="text/css" href="lifestyle.css">
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
<br>

<div class = "row">
<div class = "three" id = "news">
<h2 id = "vijesti">  Najnovije vijesti  </h2></div></div>

<br>
<br>
<div class = "eleven" id = "lista_novosti" >
	<?php
	   $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=wtspirala4', 'wtberina', 'wt.moja.lozinka.1.s4');
        $veza->exec("set names utf8");
	    
		$upit = $veza->prepare("SELECT * FROM Novost");
					 $upit ->execute();
					 $rezultat = $upit -> fetchAll();
					 
					if (!$upit) {
                      $greska = $veza->errorInfo();
                      print "SQL greška1: " . $greska[2];
                      exit();
                     } 
				   
				   foreach ($rezultat as $k)
				   {
					   if($k['Kategorija'] == "Lifestyle"){?>
				   
				   <div class = "row" id = "red_clanak_z">
				   <div class = "eleven" id = "clanakz">
				   <div ><br>
                       <a class = "dugme" id = "komentiraj" href = "prikazi_novost.php?id=<?=$k['id']?>">Komentiraj</a>
				</div>
                    <h1 id = "naslov_z"><?php echo $k['Naslov'];?></h1>

					<img id = "slika_z" src = "<?php echo $k['Slika'];?>" alt="Photo" width="400" height="200">

                    <p id = "paragraf_z" > <?php echo $k['Sadrzaj']; ?></p>	
                   </div>
                 </div>				 
			     <?php
                } 
			   }				
	?>
</div>


<div class= "row" >
      <div class = "seven" id = "kolona1">
	  <div class = "row">
	  <div id = "clanak_1">
                 <h1 id = "naslov">Zabavni treninzi za one koji nisu ljubitelji vježbanja</h1>
                      
                       <p> 
                  <br>1. Vožnja bicikla<br>
                  Vožnja biciklom odlična je vježba za sve one koji ne vole teretanu.
                  Ovaj kardio trening povećaće energiju, a mogu ga izvoditi i oni koji imaju probleme sa zglobovima. Dovoljno je da sjednete na bicikl i uputite se – bilo gdje!
				  <br>2. Ples<br>
                  Ako želite da izgubite višak kilograma, ali ne želite redovno da odlazite u teretanu – upišite kurs salse ili nekog drugog brzog plesa.
				  Pomoću salse ćete sagorjeti i do 600 kalorija po jednom času, a ovaj senzualan ples možete plesati i s partnerom – što ovaj “trening” čini idealnim za parove!
				  <br>3. Šetnja<br>
				  Želite da smršate? Šetajte! Pješačenje će vam pomoći da se riješite viška kilograma, a nećete se osjećati kao da naporno vježbate. Odredite neku udaljenost, obujte udobne patike i uputite se u šetnju.
				  Počnite s manjim relacijama, a zatim ih postupno povećavajte.
				  </p>
       </div>
	  
    </div>
	
	<div class = "row"  id = "red_forma">
	<br>
	    <form class ="kontakt_form" id = "forma" action="#" method="post">
<label> Ove sedmice Ljepota&amp;Zdravlje nagrađuje najbrže čitatelje. Prvih 5 koji popune i pošalju obrazac dobijaju na treninge Zumbe popust od 50% u odabranom Fitness klubu.<br></label>
		<table>
				<tr>
					<td> <label> Ime: </label></td>
					<td> <input type="text" name="Ime" id = "Ime" size = "18" onchange = "validacijaIme()"></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "imeGreska"></div></td>
				</tr>
				
				<tr>
					<td> <label> Prezime:  </label></td>
					<td> <input type="text" size = "18" name="Prezime" id = "Prezime" onchange = "validacijaPrezime()"><td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "prezimeGreska"></div></td>
				</tr>
				
				<tr>
					<td> <label> Fitness: </label></td>
					<td><select name="fitness">
                        <option value="universe">Fitnes Universe</option>
                        <option value="gym">Gym</option>
                        <option value="cross" selected>CrossFit</option>
                        <option value="combat">Combat Fitness</option>
                       </select> </td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "formaGreska"></div></td>
				</tr>
				
				<tr>
					<td> </td>
					<td> <input type="button" value="Pošalji" class="dugme" id = "dugme" onclick ='validacijaSvaPolja("lifestyle.html")' > </td>
				</tr>
			</table>
		</form>
	</div>
	</div>
	<div class = "five" id = "kolona2">
	  <div id = "clanak_2">
                 <h1>NOVO! NOVO! U Fitness Universe-u od sada i ZUMBAA!</h1>
                      <p><img id = "zumba" src = "slike/zumba.jpg" alt="Zumba" width="400" height="500"></p>
                       
                  <p> Zumba Fitness® je program koji je primjeren za sve dobne skupine. Neovisno o tome u kakvoj ste fizičkoj kondiciji, imate li bilo kakvog ili pak nikakvog iskustva u plesu. Sasvim je nebitno jeste li žena ili muškarac. Sredinom devedesetih, ovaj veliki ljubitelj latino glazbe, krenuo je održati sat aerobika, no na trening je zaboravio ponijeti.
				  Međutim, tom spontanom improvizacijom Alberto je toliko zaludio svoje vježbače da se odlučio posvetiti stvaranju programa Zumba Fitness®-a.</p>
				  <br>
				  <h1>Posjetite nas i uživajte u Zumba ludilu!!!</h1>
				  
       </div>
	  
    </div>
</div>
</div>

</BODY>
</HTML>