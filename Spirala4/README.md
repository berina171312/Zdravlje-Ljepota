# Zdravlje&Ljepota

Berina Muhovi�
17131

Opis teme: 
Zdravlje&Ljepota je web-stranica koja slu�i za informisanje korisnika o top temama koje se ti�u 
zdravlja �to podrazumijeva zdrav na�in �ivota sa aspekta zdrave ishrane, odr�avanja tjelesne ravnote�e,
bavljenja sportskim i relaksiraju�im aktivnostima, za�tita od gripa i bolesti itd. Pored tematike o zdravlju,
stranica je namijenjena za pisanje �lanaka koji se ti�u brige o ljepoti i tijelu - kozmetika. Uz to, korisnici 
mogu prona�i i recepte za zdrav i ugodan �ivot, ali i tekstove o popularnim i uspje�nim dijetama.



Dokumentacija Spirale 1:


  1.) Ura�eno je:
          
      - Skice svih predvi�enih podstranica: desktop izgled i izgled za mobitele.
      - Stranice su responzivne i imaju grid-view izgled.
      - Napravljen je izgled za mobilne ure�aje.
      - Implementirane su 3 html forme.
      - Meni web stranice je implementiran i vidljiv na svim postranicama.
      - Izgled je konzistentan, bez primje�enih glitcheva, elementi poravnati.

  2.) //

  3.) i 4.) Nisam primijetila bug-ove.

  5.) Skice - nalaze se skice podstranica za desktop i mobile izgled.
      
      slike - slike koje se koriste u html dokumentima (tako�er slike pozadina).
      
      Dokumenti- svi .css i .html fajlovi zajedno sa folderom "slike".


Dokumentacija Spirale 2:

   1.) Ura�eno je:
            
        - Validacija formi na podstranicama "zdravlje.html", "lifestyle.html", "kontakt.html". Ura�eno je da dok sva polja ne budu validirana 
          button je disabled.
        - Dropdown menu na meni opciji "Ljepota".
        - Galerija slika na meni opciji "Ljepota" -> "Fashion Week". Ura�eno je da se slika ra�iri preko cijelog ekrana.
        - Uz pomo� ajaxa podstranice se u�itavaju bez reload-a.

  2.) Nisam koristila biblioteke i frameworke.

  3.) i 4.) Nisam primijetila bug-ove.

  5.) Ostali su prethodno navedeni fajlovi i nalaze se u fajlu "Spirala_1 + _2".

  
Dokumentacija Spirale 3:

1.) Ura�eno je:

     - omogu�ena je registracija novih �lanova stranice
     - za postoje�e �lanove omogu�en je login
     - za admina odvojen je poseban interfejs sa mogu�nostima za ure�ivanje novosti,
       tj. dodavanje, brisanje i izmjenu novosti
          opcija Novosti: pregled najnovijih novosti dodane od strane admina bez obzira na kategoriju.
          opcija Dodaj Novost: dodaje novost, tj. serijalizuje je u XML -> novosti.xml
          opcija Uredi Novosti: ponu�ena lista svih novosti, iznad svake novosti postoji dugme za izmjenu. Kada se na njega klikne otvara se forma u kojoj se nalaze trenutni podaci o novosti, te mogu�nost izmjene.
          Tu je omogu�eno i brisanje
          opcija Korisnici: lista svih korisnika iz korisnici.XML; iznad svakog korisnika je dugme obrisi, ako admin zeli obrisati korisnika
          
     - pored toga, admin mo�e da pregleda listu korisnika, te da obri�e korisnika
     - ura�ena je validacija i u php-u i js i to forme za registraciju, kao i formi koje slu�e
       unos novosti i izmjenu novosti. 
     -koristila sam funkciju htmlspecialchars() kako bih sprije�ila XSS ranjivost koda
     - unos, izmjenu i brisanje moze da obavlja samo admin

     - kada je admin ulogovan, na podstranici novosti prikazuju se lista posljednih dodanih novosti
     - tu postoji dugme koje omogu�ava �uvanje podataka u vidu csv datoteke u kojoj se nalazi naslov novosti, sadrzaj i kategorija novosti
     - omogu�eno je i da admin-korisnik na tabu Korisnici generise izvjestaj o korisnicima u .pdf formatu. Generisani izvjestaj predstavlja tabelu korisnika.
     - ura�ena je i pretraga korisnika na osnovu imena i prezimena na tabu Korisnici, stranica se ne reload-a pri pretrazi
     - ura�en je deployment stranice na OpenShift https://developers.openshift.com.

     - na svim podstranicama ovisno o kategorijama clanaka nalaze se najnovije vijesti iz XML
     - u novosti.xml nalazi se odredjeni broj dodanih novosti po kategorijama
     - u korisnici.xml je tako�er dodan odre�eni broj korisnika, npr. ako je user1 onda mu je sifra "user1user1", ukoliko je potrebno da vidite kako izgleda stranica kada
       je obi�ni korisnik ulogovan.
     
2.) //

3.) i 4.) Nisam primijetila bug-ove

5.) Ostali su prethodno navedeni fajlovi, te svi novi fajlovi (.php, .js, .css) iz "Spirala3".
Tu se nalazi folder slike, Xml(xml fajlovi) i fpdf folder.
     
