<?php 

$bd="dgbf";
$user="root";
$pwd="";

try {

	$bdd = new PDO ("mysql:host=localhost;dbname=$bd", $user, $pwd);
	
} catch (Exception $e) {

	die('erreur :' .$e->getmessage());
	
}

 ?>