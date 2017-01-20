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
<link rel="stylesheet" type="text/css" href="zdravlje.css">
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
				<li id = "prijava"><a href="prijava.php"> <?php echo $prijava; ?></a></li>
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
					   if($k['Kategorija'] == "Zdravlje"){?>
				   
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




<div class = "row">
<div class = "eight" id = "kolona1">
   <div id = "clanak1">
     <h1>Započnite dan zdravim napitkom i ojačajte imunitet</h1>
                       <p> <img id = "med" alt="Med" src = "slike/med-i-limun.jpg" width="300" height="100"> </p>
     <p> 
                   Ova mješavina se preporučuje za konzumaciju kod ljudi koji se bore sa bakterijama i virusima. Sjajna je za ojačanje imunog sistema. 
                   Mješavina ima idealne osobine zahvaljujući svojim super-snažnim sastojcima – medu i kurkumi. Mješavina je dobila epitet “zlatna”, jer joj ova dva sastojka daju baš tu boju..
                   Med je dobro poznat kao jedan od najboljih prirodnih lijekova. Isto to se može reći i za kurkumu. Kada se ova dva sastojka kombinuju, oni imaju antiinflamatorne, antibakterijske i antikancerogene osobine.

                   Ova mješavina nema nikakve nuspojave. Ona ima mogućnost poboljšanja crijevne flore i cjelokupnog procesa varenja.
     </p>
</div>
</div>

<div class = "four" id = "kolona2"><br>
<form class ="kontakt_form" id = "forma" action="#" method="post">
<label> Pošaljite nam Vaš domaći recept za očuvanje zdravlja. Redakcija <i>Zdravlje&amp;Ljepota</i> će najbolji recept objaviti na portalu i dodijeliti vrijedne nagrade
pobjedniku.<br></label>
		<table>
				<tr>
					<td> <label class  = "ime"> Ime: </label></td>
					<td> <input type="text" name="Ime" id ="Ime" onchange = 'validacijaIme("forma","Ime")' ></td>
				</tr>
				<tr>
				    <td></td>
					<td><div id = "imeGreska"></div></td>
				</tr>
				<tr>
					<td> <label class = "prezime"> Prezime:  </label></td>
					<td> <input type="text" name = "Prezime" id ="Prezime" onchange = 'validacijaPrezime("forma","Prezime")'><td>
				</tr>
				<tr>
				    <td></td>
					<td><div id = "prezimeGreska"></div></td>
				</tr>
				<tr>
					<td> <label> Recept: </label></td>
					<td> <textarea id="Recept" name="Recept" rows="2" cols = "2" onkeydown = "validacijaPoruka()"> </textarea></td>
				</tr>
				<tr>
				    <td></td>
					<td><div id = "formaGreska"></div></td>
				</tr>
				<tr>
					<td></td>
					<td><br> <input type="button" value="Pošalji" class="dugme" id = "dugme" onclick = 'validacijaSvaPolja("zdravlje.html")'> </td>
				</tr>
			</table>
		</form>
  </div>
</div>

<div class = "row">

   <div id = "clanak2">
     <h1>Činjenice koje morate znati o lijekovima protiv bolova</h1>
	 <p><img id = "tablete" src = "slike/tablete.jpg" alt="Tablete" width="300" height="100"></p>
           <p> 
                   Hroničan bol može da poremeti život. Utiče kako na fizičko, tako i na psihičko stanje. Može da utiče i na odnos s kolegama, djecom i partnerom.
                   Prema izvještajima Medicinskog univerziteta na Harvardu, najčešći razlog za posjetu ljekaru je traženje lijekova protiv bolova. Saznajte šta treba da učinite.
                     <br>
                Ne postavljajte sami dijagnozu

                Provjerite šta tačno izaziva bol jer se svaki lijek bori protiv konkretne bolesti. Zato nemojte da sležete ramenima i mislite da se radi o istegnutom mišiću. Bol može da bude izazvan oštećenim živcem ili može biti nešto mnogo ozbiljnije – slijepo crijevo ili srčani udar. Laura Feris, ljekarka s Univeriteta u Pitsburgu, upozorava: “Idite kod ljekara ako se bol pojavi iznenada i niste je prije osjetili. Takvu vrstu bola svakako treba provjeriti.”
                    <br>
                Ne čekajte nego potražite pomoć

                  Ako osjetite da se bol pojačava, potražite ljekarsku pomoć. “Ne dopustite da bol eskalira. Što prije krenete s liječenjem, lakše ćete bolest držati pod kontrolom”, savjetuje anesteziolog Edna Ma.
                 <br>
               Uzimate lijekove protiv bolova bez recepta

              Dobro proučite sastojke i pazite da ne prekoračite preporučenu dozu jer to može imati ozbiljne posljedice. Lekar Trejs D. Bal upozorava: “Često sam se susretao sa slučajevima da su ljudi koje muče hronični ili jaki bolovi uzeli preveliku dozu lijekova protiv bolova. To se događa i zato što ljudi kombinuju više lijekova, pa se onda poveća i unos opasnih sastojaka. Neki pacijenti imaju i nižu toleranciju na određene sastojke lijekova protiv bolova, a to zavisi od njihovog starosnog doba, težine i istorije bolesti, odnosno da li imaju problem s jetrom ili bubrezima. Ukoliko previdite sve to i ne savjetujete li se s ljekarom, može doći do toga da se predozirate, što ima ozbiljne posljedice, čak i smrtne.”
           </p> 
    </div>
</div>
</div>
</BODY> 
</HTML>