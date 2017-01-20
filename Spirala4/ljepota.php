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
<link rel="stylesheet" type="text/css" href="ljepota.css">
</HEAD>
<BODY> 
<br>


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
					   if($k['Kategorija'] == "Ljepota"){?>
				   
				   <div class = "row" id = "red_clanak_z">
				   <div class = "eleven" id = "clanakz"><div ><br>
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







<div class = "row">
<div class = "six" id = "kolona">
   <div id = "clanak">
     <h1>Frizer Margot Robbie otkriva tajne (njene) savršene plave kose!</h1>
	 <p><img id = "glumica" src = "slike/glumica.jpg" alt = "Glumica" width="250" height="300" ></p>
     <p id = "paragraf" > 
Ako vas zanima kako kosa Margot Robbie uvijek izgleda tako sjajno i zdravo uprkos stalnom posvjetljivanju, sada ćete dobiti odgovor – i to iz prve ruke.
Njen frizer, Matt Rezz, odgovorio je na to pitanje, ali donosi i odgovore na to kako da znate koja je prava nijansa za vas i u čemu žene najviše griješe kad riječ o farbanoj kosi.

1. Posvjetljivanje isušuje kosu zato je redovno njegujte

“Žene često žele da posvijetlite kosu, ali krive tehnike farbanja imaju kao posljedicu čudne i loše raspoređene tonove u kosi. Osim toga, ako žele jako posvijetliti temeljnu boju kose, to će uvijek prouzrokovati oštećenja i isušivanje kose. Zato obavezno, pogotovo ako imate dužu kosu, morate redovno nanositi sredstva koja jačaju kosu i umanjuju njeno pucanje”, kaže Matt.

2. Žene žele rezultat odmah – i to može biti pogubno

“Ako želite da jako posvijetlite kosu u kratkom vremenu, ili ako pokušate da postignete
boju puno svijetliju od svoje prirodne, to kosu može jako da uništi. Uvijek napominjem klijentima da se to može raditi samo do određene granice. Ako se vi i vaš frizer ipak odlučite na brzo posvjetljivanje, onda svakako prilikom farbanja koristite proizvode koji štite kosu prilikom ovog agresivnog tretmana (raspitajte se u salonu za tretmane poput Olaplexa ili FiberPlexa),

</p>
</div>
</div>
</div>
</div>
</BODY>
</HTML>