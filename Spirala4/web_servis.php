<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}

function rest_get($request, $data) { }
function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data);
        
		$veza = new PDO("mysql:dbname=wtspirala4;host=localhost;charset=utf8", "wtberina", "wt.moja.lozinka.1.s4");
       $veza->exec("set names utf8");
		if(isset($_GET['idN'])){
	   $id_k = $_GET['idN'];
		
	   
	   
	   $upit = $veza->prepare("SELECT * FROM Novost WHERE id = :Id");
	   $upit -> bindValue(":Id", $id_k, PDO::PARAM_INT);
	   $upit ->execute();
	   
		$enkodiraj = array();
        while($red=$upit -> fetch(PDO::FETCH_ASSOC)) {
			
            $enkodiraj[] = $red;
			
        }   

         echo json_encode($enkodiraj);			 
		}
		
		elseif(isset($_GET['idK'])){
	   $id_k = $_GET['idK'];

	   $upit = $veza->prepare("SELECT * FROM Korisnik WHERE id = :Id");
	   $upit -> bindValue(":Id", $id_k, PDO::PARAM_INT);
	   $upit ->execute();
	   
		$enkodiraj = array();
        while($red=$upit -> fetch(PDO::FETCH_ASSOC)) {
			
            $enkodiraj[] = $red;
			
        }   

         echo json_encode($enkodiraj);			 
		}
		
		
		elseif(isset($_GET['user'])){
	   $k = $_GET['user'];

	   $upit = $veza->prepare("SELECT * FROM Korisnik WHERE Username= :kat");
	   $upit -> bindValue(":kat", $k, PDO::PARAM_STR);
	   $upit ->execute();
	   
		$enkodiraj = array();
        while($red=$upit -> fetch(PDO::FETCH_ASSOC)) {
			
            $enkodiraj[] = $red;
			
        }   

         echo json_encode($enkodiraj);			 
		}
		
		
		
		break;
		
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}









?>