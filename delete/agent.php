<?php 

session_start();
require_once("../connexion_bd/connexion_bd.php");

$id_agent=$_GET['id_agent'];

$req1=$bdd->prepare("DELETE FROM agent where id_agent=? ");
$req1->execute(array($id_agent));

$_SESSION['notif']="ok";
header("Location:../liste_agent.php");

 ?>