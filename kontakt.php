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
<link rel="stylesheet" type="text/css" href="kontakt.css">
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


<div class = "row" id = "pitanja">
<div class = "four" id = "naslov">
<p id = "kontakt"> Ukoliko imate pitanja ili prijedloge, popunite obrazac. </p>
</div>
</div>

<div class = "row">
<br>
<br>
<div class = "four" id = "kontakt_forma">
        <form class ="kontakt_form" id = "formaKontakt" action="#" method="post">
		<table>
				<tr>
					<td> <label> Ime: </label></td>
					<td> <input type="text" name="Ime" id = "Ime" onchange = "validacijaImeKontakt()" ></td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "imeGreska"></div></td>
				</tr>
				
				<tr>
					<td> <label> Prezime:  </label></td>
					<td> <input type="text" name="Prezime" id = "Prezime" onchange = "validacijaPrezimeKontakt()"><td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "prezimeGreska"></div></td>
				</tr>
				

				<tr>
					<td> <label> Email: </label></td>
					<td> <input type="text" name="Email" id = "Email" onchange = "validacijaMailKontakt()"><td>
				</tr>
				
				<tr>
				    <td></td>
					<td><div id = "mailGreska"></div></td>
				</tr>

				<tr>
					<td> <label> Poruka: </label></td>
					<td> <textarea id="poruka" name="poruka" rows="2" cols = "2" onkeydown = "validacijaPoruka()"> </textarea>
				</tr>
				<tr>
				    <td></td>
					<td><div id = "formaGreska"></div></td>
				</tr>
				<tr>
					<td></td>
					<td> <br> <input type="button" value="Pošalji" class="dugme" id = "dugme" onclick = "validacijaSvaPoljaKontakt()"> </td>
				</tr>
			</table>
		</form>
</div>
</div>
</div>
</BODY>
</HTML>