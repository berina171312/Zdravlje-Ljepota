

function loadPage(podstranica)
{

	 var xhttp;
     
	 if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
    } 
	
	else {
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
     xhttp.onreadystatechange = function () {
				
				if (xhttp.readyState == 4 && xhttp.status == 200)
                   {
					   if(podstranica == "home.html")
					   {
						   document.getElementById("Okvir").innerHTML = xhttp.responseText;
					   }
					   else
					   document.getElementById("content").innerHTML = xhttp.responseText;

				   }
				
				if (xhttp.readyState == 4 && xhttp.status == 404)
				{

					document.getElementById("content").innerHTML = "Greska: nepoznat URL";
			    }
	 }
	 
	xhttp.open("GET", podstranica,true);
	xhttp.send();
	
}

function pretraga(str)
{
    if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
    }
	
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
	  document.getElementById("livesearch").style.backgroundColor = "#eee";
    }
  }
  xmlhttp.open("GET","livepretraga.php?q=" + str,true);
  xmlhttp.send();

}

function pretragaDugme()
{
	var tekst = document.forms.forma.pretragaUnos;
	return tekst;
}


function uvecajSliku(slika)
{
	var elem = document.getElementById(slika);
	
    if (elem.requestFullscreen) {elem.requestFullscreen();} 
    else if (elem.msRequestFullscreen) {elem.msRequestFullscreen();} 
	else if (elem.mozRequestFullScreen) {elem.mozRequestFullScreen();} 
	else if (elem.webkitRequestFullscreen) {elem.webkitRequestFullscreen();}
}


function validacijaIme(forma,polje)
{
	var reg = /^[a-zA-Z]{3,8}$/;
	var greska = document.getElementById("imeGreska");
	var ime = document.forms[forma][polje];
	var dugme = document.forms[forma]["dugme"];

	
	if(reg.test(ime.value) == false)
	{
	greska.innerHTML = "Ime nije validno uneseno";
	ime.style.backgroundColor = "#ff704d";
	dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		ime.style.borderColor = "green";
		ime.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			ime.style.backgroundColor = "white";
		}
	}
	
	var greska2 = document.getElementById("prezimeGreska");
	var greska3 = document.getElementById("mailGreska");
	
	if(greska.innerHTML != "" || greska2.innerHTML != "" || greska3.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}
}

function validacijaPrezime(forma,polje)
{
	var reg = /^[a-zA-Z]{4,10}$/;
	var greska = document.getElementById("prezimeGreska");
	var prezime = document.forms[forma][polje];
	var dugme = document.forms[forma]["dugme"];
	
	
	if(reg.test(prezime.value) == false)
	{
	   greska.innerHTML = "Prezime nije validno uneseno";
	   prezime.style.backgroundColor = "#ff704d";
	   dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		prezime.style.borderColor = "green";
		prezime.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			prezime.style.backgroundColor = "white";
		}
	}
	
	
	var greska1 = document.getElementById("imeGreska");
	
	if(greska1.innerHTML != "" || greska.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}
}

function validacijaPassword(forma,polje)
{

	var greska = document.getElementById("lozinkaGreska");
	var lozinka = document.forms[forma][polje];
	var dugme = document.forms[forma]["dugme"];
	
	
	if(lozinka.value.length < 6 )
	{
	   greska.innerHTML = "Minimalno 6 karaktera za password";
	   lozinka.style.backgroundColor = "#ff704d";
	   dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		lozinka.style.borderColor = "green";
		lozinka.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			lozinka.style.backgroundColor = "white";
		}
	}
	
	
	var greska1 = document.getElementById("imeGreska");
	
	if(greska1.innerHTML != "" || greska.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}
}

function validacijaPotvrdaPassword(forma,polje)
{

	var greska = document.getElementById("potvrdaLozinkaGreska");
	var plozinka = document.forms[forma][polje];
	var lozinka = document.forms[forma]["lozinka"].value;
	var dugme = document.forms[forma]["dugme"];
	
	if(plozinka.value != lozinka && lozinka != "")
	{
	    greska.innerHTML = "Password se ne slaže sa unesenim";
	   plozinka.style.backgroundColor = "#ff704d";
	   dugme.disabled = true;
	}
	else if(lozinka == "" || lozinka == null)
	{
	    greska.innerHTML = "Unesite password u prethodno polje";
	   plozinka.style.backgroundColor = "#ff704d";
	   dugme.disabled = true;
	}
	
	else if(plozinka.value.length < 6 )
	{
	   greska.innerHTML = "Minimalno 6 karaktera za password";
	   plozinka.style.backgroundColor = "#ff704d";
	   dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		plozinka.style.borderColor = "green";
		plozinka.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			plozinka.style.backgroundColor = "white";
		}
	}
	
	
	var greska1 = document.getElementById("imeGreska");
	
	if(greska1.innerHTML != "" || greska.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}
}


function validacijaPoruka()
{
	var greska = document.getElementById("formaGreska");
	
	if(greska.innerHTML != "")
	{
	     greska.innerHTML = ""; 
	}
}

function validacijaEMail(forma,polje)
{
	var reg  = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var greska = document.getElementById("emailGreska");
	var mail = document.forms[forma][polje];
	var dugme = document.forms[forma]["dugme"];
	
	
    if(reg.test(mail.value) == false)
	{
		greska.innerHTML = "Mail nije validno unesen";
	    mail.style.backgroundColor = "#ff704d";
		dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		mail.style.borderColor = "green";
		mail.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			mail.style.backgroundColor = "white";
		}
	}
	
	
	var greska1 = document.getElementById("imeGreska");
	var greska2 = document.getElementById("prezimeGreska");
	
	if(greska1.innerHTML != "" || greska2.innerHTML != "" || greska.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}
}


function validacijaUsername(forma, polje)
{
	var reg = /^[A-Za-z][A-Za-z0-9]{4,15}$/;
	var greska = document.getElementById("usernameGreska");
	var uime = document.forms[forma][polje];
	var dugme = document.forms[forma]["dugme"];

	
	if(reg.test(uime.value) == false)
	{
	greska.innerHTML = "Username nije validno unesen";
	uime.style.backgroundColor = "#ff704d";
	dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		uime.style.borderColor = "green";
		uime.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			uime.style.backgroundColor = "white";
		}
	}
	
	var greska2 = document.getElementById("prezimeGreska");
	var greska3 = document.getElementById("mailGreska");
	
	if(greska.innerHTML != "" || greska2.innerHTML != "" || greska3.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}

}

function validacijaNaslov(forma, polje, dugme)
{
	var greska = document.getElementById("naslovGreska");
	var naslov = document.forms[forma][polje];
	var dugme = document.forms[forma][dugme];

	
	if(naslov.value == "" || naslov.value==null)
	{
	greska.innerHTML = "Naslov je obavezno polje";
	naslov.style.backgroundColor = "#ff704d";
	dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		naslov.style.borderColor = "green";
		naslov.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			naslov.style.backgroundColor = "white";
		}
	}
	
}

function validacijaSadrzaj(forma, polje)
{
	var greska = document.getElementById("textGreska");
	var naslov = document.forms[forma][polje];
	var dugme = document.forms[forma]["dodaj_novost"];

	
	if(naslov.value == "")
	{
	greska.innerHTML = "Naslov je obavezno polje";
	naslov.style.backgroundColor = "#ff704d";
	dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		naslov.style.borderColor = "green";
		naslov.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			naslov.style.backgroundColor = "white";
		}
	}

}

function validacijaSvaPolja(podstranica)
{
	var ime = document.forms.forma.Ime.value;
	var prezime = document.forms.forma.Prezime.value;
	var dugme = document.forms.forma.dugme;
	
    var greska1 = document.getElementById("imeGreska");
	var greska2 = document.getElementById("prezimeGreska");

	var greska = document.getElementById("formaGreska");
	
	if(podstranica === "zdravlje.html"){
		
	var recept = document.forms.forma.Recept.value;
	
	if(ime == "" || prezime == "" || recept == "" || recept == " ")
	    {
		if(ime == "") {greska1.innerHTML = "Unesite ime!";}
	    if(prezime == "") {greska2.innerHTML = "Unesite prezime!";}
	    if(recept == "" || recept == " ") {greska.innerHTML = "Napišite recept!";}
	     }
	else if(greska1.innerHTML != "" || greska2.innerHTML != "")
	     {
	  	dugme.disabled = true;
	    }
	else
	    {
	    greska1.innerHTML = "";
		greska2.innerHTML = "";
		greska.innerHTML = "";
		dugme.disabled = false;
	    }
	}

	else{
	  if(ime == "" || prezime == "")
	     {
		if(ime == "") {greska1.innerHTML = "Unesite ime!";}
	    if(prezime == "") {greska2.innerHTML = "Unesite prezime!";}
	     }
	    else if(greska1.innerHTML != "" || greska2.innerHTML != "")
	     {
		dugme.disabled = true;
	     }
	   else
	    {
		greska1.innerHTML = "";
		greska2.innerHTML = "";
		dugme.disabled = false;
	    }
	}
	
}


function validacijaImeKontakt()
{
	var reg = /^[a-zA-Z]{3,8}$/;
	var greska = document.getElementById("imeGreska");
	var ime = document.forms.formaKontakt.Ime;
	var dugme = document.forms.formaKontakt.dugme;
	
	if(reg.test(ime.value) == false)
	{
	greska.innerHTML = "Ime nije validno uneseno";
	ime.style.backgroundColor = "#ff704d";
	dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		ime.style.borderColor = "green";
		ime.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			ime.style.backgroundColor = "white";
		}
	}
	
	var greska2 = document.getElementById("prezimeGreska");
	var greska3 = document.getElementById("mailGreska");
	
	if(greska.innerHTML != "" || greska2.innerHTML != "" || greska3.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}
}

function validacijaPrezimeKontakt()
{
	var reg = /^[a-zA-Z]{4,10}$/;
	var greska = document.getElementById("prezimeGreska");
	var prezime = document.forms.formaKontakt.Prezime;
	var dugme = document.forms.formaKontakt.dugme;
  
   
	if(reg.test(prezime.value) == false)
	{
	   greska.innerHTML = "Prezime nije validno uneseno";
	   prezime.style.backgroundColor = "#ff704d";
	   dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		prezime.style.borderColor = "green";
		prezime.style.backgroundColor = "#b3ffb3"
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			prezime.style.backgroundColor = "white";
		}
	}
	
	
	var greska1 = document.getElementById("imeGreska");
	var greska3 = document.getElementById("mailGreska");
	
	if(greska1.innerHTML != "" || greska.innerHTML != "" || greska3.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}
}

function validacijaMailKontakt()
{
	var reg  = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var mail = document.forms.formaKontakt.Email;
	var greska = document.getElementById("mailGreska");
	var dugme = document.forms.formaKontakt.dugme;
	
	
    if(reg.test(mail.value) == false)
	{
		greska.innerHTML = "Mail nije validno unesen";
	    mail.style.backgroundColor = "#ff704d";
		dugme.disabled = true;
	}
	
	else
	{
		if(greska.innerHTML != ""){
		mail.style.borderColor = "green";
		mail.style.backgroundColor = "#b3ffb3";
		greska.innerHTML = "";
		dugme.disabled = false;
		}
		else
		{
			mail.style.backgroundColor = "white";
		}
	}
	
	
	var greska1 = document.getElementById("imeGreska");
	var greska2 = document.getElementById("prezimeGreska");
	
	if(greska1.innerHTML != "" || greska2.innerHTML != "" || greska.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		dugme.disabled = false;
	}
}

function validacijaSvaPoljaKontakt()
{
	var ime = document.forms.formaKontakt.Ime.value;
	var prezime = document.forms.formaKontakt.Prezime.value;
	var mail = document.forms.formaKontakt.Email.value;
	var poruka = document.forms.formaKontakt.poruka.value;
	
	var greska1 = document.getElementById("imeGreska");
	var greska2 = document.getElementById("prezimeGreska");
	var greska3 = document.getElementById("mailGreska");

	var greska = document.getElementById("formaGreska");
	

	if(ime == "" || prezime == "" || mail == "" || poruka == " " || poruka == "")
	{
		if(ime == "") {greska1.innerHTML = "Unesite ime!";}
	    if(prezime == "") {greska2.innerHTML = "Unesite prezime!";}
	    if(mail == "") {greska3.innerHTML = "Unesite mail!";}
	    if(poruka == "" || poruka == " ") {greska.innerHTML = "Napišite poruku!";}
	}
	else if(greska1.innerHTML != "" || greska2.innerHTML != "" || greska3.innerHTML != "")
	{
		dugme.disabled = true;
	}
	else
	{
		greska1.innerHTML = "";
		greska2.innerHTML = "";
		greska3.innerHTML = "";
		greska.innerHTML = "";
		dugme.disabled = false;
	}
	
}
