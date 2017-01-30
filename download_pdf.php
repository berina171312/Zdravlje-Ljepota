<?php

   require("fpdf181/fpdf.php");
   
   $pdf = new FPDF();
   
   $pdf -> AddPage();
   $pdf->SetTitle("Lista korisnika");
   
   $pdf ->SetFont("Arial", "B", "20");
   $pdf ->SetTextColor(227, 52, 118);
   $pdf->Cell(0,20,"Zdravlje&Ljepota\n",1,1,'C');
   $pdf->Cell(0,10," ",0,1);
  
   date_default_timezone_set("Europe/Berlin");
   $pdf ->SetFont("Arial", "", "13");
   $pdf ->SetTextColor(0,0,0);
   $pdf->Cell(40,7,"Datum: ",1,0,'L',0);
   $pdf->Cell(0,7,date("Y.m.d"),1,1,'L',0);
   $pdf->Cell(40,7,"Vrijeme: ",1,0,'L',0);
   $pdf->Cell(0,7,date("h:i:sa"),1,1,'L',0);
   $pdf->Cell(0,20," ",0,1);
  
   $pdf ->SetFont("Arial", "B" ,"15");
   $pdf ->SetTextColor(0,0,0);
   $pdf->Cell(0,10,"Izvjestaj o korisnicima",'B',1,'C');
   $pdf->Cell(0,10," ",0,1);

	   
	   $pdf ->SetFont("Arial", "B" ,"14");
	   $pdf ->SetTextColor(255, 102, 153);
	   $pdf->Cell(15,10,'R. br.',1,0,'C',0);
	   $pdf->Cell(40,10,'Ime',1,0,'C',0);
       $pdf->Cell(50,10,'Prezime',1,0,'C',0);
       $pdf->Cell(40,10,'Username',1,0,'C',0);
	   $pdf->Cell(50,10,'Email',1,1,'C',0);
	  		
	   $xml = simplexml_load_file('Xml/korisnici.xml');
	   $broj_elemenata = $xml->children()->children()->count();
	   $korisnik = $xml->children()->children();
	   $br = 0;
	   
	   $pdf ->SetTextColor(0,0,0);
	   $pdf ->SetFont("Arial", "" ,"12");
	   
			   for($i= 0 ; $i < $broj_elemenata; $i++)
			   {
				    $br = $i + 1;

					$pdf->Cell(15,5,(string)$br,1,0,'L',0);
	                $pdf->Cell(40,5,$korisnik[$i]->ime,1,0,'L',0);
                    $pdf->Cell(50,5,$korisnik[$i]->prezime,1,0,'L',0);
                    $pdf->Cell(40,5,$korisnik[$i]->username,1,0,'L',0);
	                $pdf->Cell(50,5,$korisnik[$i]->email,1,1,'L',0);
					
			   }
			   
        $pdf->Output();
?>