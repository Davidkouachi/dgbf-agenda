<?php 
session_start();
require_once("../connexion_bd/connexion_bd.php");

$id_pres=$_GET['id_pres'];

    $req1=$bdd->prepare("DELETE FROM prestation where id_pres=? ");
    $req1->execute(array($id_pres));

    $req2=$bdd->prepare("DELETE FROM prevue where id_pres=? ");
    $req2->execute(array($id_pres));

    $req3=$bdd->prepare("DELETE FROM rdv where id_pres=? ");
    $req3->execute(array($id_pres));

$_SESSION['notif_anu']="ok";
header("Location:../liste_pres.php");


 ?>