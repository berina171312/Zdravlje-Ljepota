<?php
  session_start();
   if(isset($_SESSION['username']) && isset($_SESSION['username']) == "admin") $prijava = "Admin postavke";
  elseif(isset($_SESSION['username'])) $prijava = "Odjavi se";
  else $prijava = "Hej, pridruži nam se!";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Zdravlje&amp;Ljepota</TITLE>
<link rel="stylesheet" type="text/css" href="o_nama.css">
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
<div class= "row"><br><br>
   <div class = "eleven" id="o_nama">
   <div class = "clanak">
     <h1>O nama</h1>
     <p> 
        Prvi ženski lifestyle portal u BIH www.ljepotaizdravlje.ba napravljen je da bi zadovoljio sve potrebe savremene žene (od 17 do 77 godina), da na jednom mjestu svakoga dana dobije sve potrebne informacije neophodne da živi zdravije, ljepše i sretnije.
        Nije u pitanju samo slogan. Niz stručnjaka iz svih oblasti medicine pomažu u bržoj i efikasnijoj borbi i preventivi širokog spektra psihofizičkih problema, beauty eksperti savjetuju njegu tijela i lica koja neutrališe posljedice života i godina, stilisti i šminkeri otkrivaju kako da iz sebe izvučete najbolje, dok psiholozi i sociolozi preporučuju najbolje načine za korištenje sopstvenih potencijala i uče nas da živimo mirnije, sporije, sretnije.

        Naravno, nijedna moderna, jedinstvena žena nije potpuna bez uspješnog ljubavnog i seksualnog života, pa se praktični savjeti iz tog polja i korisna iskustva drugih takođe nalaze na portalu uz sve ono što treba da znate da bi vam i karijera bila na zavidnom nivou. A sve to izloženo na jednostavan, lak i dostupan način, uz prateće materijale koji zaokružuju portal u jedinstvenu cjelinu… Putopisi, umjetnost življenja i stanovanja (feng shui), astrologija, dnevni recept, misli velikih ljudi, savjeti javnih ličnosti, kulturni vodič …sve je tu da pomogne i zabavi.

        Ali ni to nije sve! Zahvaljujući velikom broju oglašivača koji žele da budu u društvu najboljih, na portalu će biti organizovane nagradne igre, kvizovi i ankete koji, pored dobrog provoda, mogu da donesu vrijedne poklone, pa čak i besplatna ljetovanja.
 </p>
</div> 
</div>
</div>
</div>
</BODY>
</HTML>