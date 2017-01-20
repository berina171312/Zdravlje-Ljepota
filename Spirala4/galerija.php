<?php
  session_start();
   if(isset($_SESSION['username']) && isset($_SESSION['username']) == "admin") $prijava = "Admin postavke";
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
   <div class = "six" id = "kolona_1">
   <img id = "slika_jedan" src = "slike/fw1.jpg" alt="FW1" width="700" height="700" onclick = 'uvecajSliku("slika_jedan")'>
   </div>
    
  <div class = "six" id = "kolona_2">
  <img id = "slika_dva" src = "slike/fw2.jpg" alt="FW2" width="700" height="700" onclick = 'uvecajSliku("slika_dva")'>
   </div>
</div>

<div class = "row" >
   <div class = "six" id = "kolona_3">
   <img id = "slika_tri" src = "slike/fw3.jpg" alt="FW3" width="700" height="700" onclick = 'uvecajSliku("slika_tri")'>
   </div>
    
  <div class = "six" id = "kolona_4">
  <br>
  <img id = "slika_cetiri" src = "slike/fw4.jpg" alt="FW4" width="700" height="700" onclick='uvecajSliku("slika_cetiri")'>
   </div>
</div>
</div>
</BODY>
</HTML>