<?php 
session_start();
require_once("../connexion_bd/connexion_bd.php");

$id_rdv=$_GET['id_rdv'];
$req=$bdd->prepare("UPDATE rdv SET statut_rdv='recu' WHERE id_rdv=?");
$req->execute(array($id_rdv));
$element_rdv=$req->fetchall();

header("Location:../liste_rdv.php");


 ?>