# Zdravlje&Ljepota

Berina Muhoviæ
17131

Opis teme: 
Zdravlje&Ljepota je web-stranica koja služi za informisanje korisnika o top temama koje se tièu 
zdravlja što podrazumijeva zdrav naèin života sa aspekta zdrave ishrane, održavanja tjelesne ravnoteže,
bavljenja sportskim i relaksirajuæim aktivnostima, zaštita od gripa i bolesti itd. Pored tematike o zdravlju,
stranica je namijenjena za pisanje èlanaka koji se tièu brige o ljepoti i tijelu - kozmetika. Uz to, korisnici 
mogu pronaæi i recepte za zdrav i ugodan život, ali i tekstove o popularnim i uspješnim dijetama.



Dokumentacija Spirale 1:


  1.) Uraðeno je:
          
      - Skice svih predviðenih podstranica: desktop izgled i izgled za mobitele.
      - Stranice su responzivne i imaju grid-view izgled.
      - Napravljen je izgled za mobilne ureðaje.
      - Implementirane su 3 html forme.
      - Meni web stranice je implementiran i vidljiv na svim postranicama.
      - Izgled je konzistentan, bez primjeæenih glitcheva, elementi poravnati.

  2.) //

  3.) i 4.) Nisam primijetila bug-ove.

  5.) Skice - nalaze se skice podstranica za desktop i mobile izgled.
      
      slike - slike koje se koriste u html dokumentima (takoðer slike pozadina).
      
      Dokumenti- svi .css i .html fajlovi zajedno sa folderom "slike".


Dokumentacija Spirale 2:

   1.) Uraðeno je:
            
        - Validacija formi na podstranicama "zdravlje.html", "lifestyle.html", "kontakt.html". Uraðeno je da dok sva polja ne budu validirana 
          button je disabled.
        - Dropdown menu na meni opciji "Ljepota".
        - Galerija slika na meni opciji "Ljepota" -> "Fashion Week". Uraðeno je da se slika raširi preko cijelog ekrana.
        - Uz pomoæ ajaxa podstranice se uèitavaju bez reload-a.

  2.) Nisam koristila biblioteke i frameworke.

  3.) i 4.) Nisam primijetila bug-ove.

  5.) Ostali su prethodno navedeni fajlovi i nalaze se u fajlu "Spirala_1 + _2".

  
Dokumentacija Spirale 3:

1.) Uraðeno je:

     - omoguæena je registracija novih èlanova stranice
     - za postojeæe èlanove omoguæen je login
     - za admina odvojen je poseban interfejs sa moguænostima za ureðivanje novosti,
       tj. dodavanje, brisanje i izmjenu novosti
          opcija Novosti: pregled najnovijih novosti dodane od strane admina bez obzira na kategoriju.
          opcija Dodaj Novost: dodaje novost, tj. serijalizuje je u XML -> novosti.xml
          opcija Uredi Novosti: ponuðena lista svih novosti, iznad svake novosti postoji dugme za izmjenu. Kada se na njega klikne otvara se forma u kojoj se nalaze trenutni podaci o novosti, te moguænost izmjene.
          Tu je omoguæeno i brisanje
          opcija Korisnici: lista svih korisnika iz korisnici.XML; iznad svakog korisnika je dugme obrisi, ako admin zeli obrisati korisnika
          
     - pored toga, admin može da pregleda listu korisnika, te da obriše korisnika
     - uraðena je validacija i u php-u i js i to forme za registraciju, kao i formi koje služe
       unos novosti i izmjenu novosti. 
     -koristila sam funkciju htmlspecialchars() kako bih sprijeèila XSS ranjivost koda
     - unos, izmjenu i brisanje moze da obavlja samo admin

     - kada je admin ulogovan, na podstranici novosti prikazuju se lista posljednih dodanih novosti
     - tu postoji dugme koje omoguæava èuvanje podataka u vidu csv datoteke u kojoj se nalazi naslov novosti, sadrzaj i kategorija novosti
     - omoguæeno je i da admin-korisnik na tabu Korisnici generise izvjestaj o korisnicima u .pdf formatu. Generisani izvjestaj predstavlja tabelu korisnika.
     - uraðena je i pretraga korisnika na osnovu imena i prezimena na tabu Korisnici, stranica se ne reload-a pri pretrazi
     - uraðen je deployment stranice na OpenShift https://developers.openshift.com.

     - na svim podstranicama ovisno o kategorijama clanaka nalaze se najnovije vijesti iz XML
     - u novosti.xml nalazi se odredjeni broj dodanih novosti po kategorijama
     - u korisnici.xml je takoðer dodan odreðeni broj korisnika, npr. ako je user1 onda mu je sifra "user1user1", ukoliko je potrebno da vidite kako izgleda stranica kada
       je obièni korisnik ulogovan.
     
2.) //

3.) i 4.) Nisam primijetila bug-ove

5.) Ostali su prethodno navedeni fajlovi, te svi novi fajlovi (.php, .js, .css) iz "Spirala3".
Tu se nalazi folder slike, Xml(xml fajlovi) i fpdf folder.
     
