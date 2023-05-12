<?php 

session_start();
require_once("../connexion_bd/connexion_bd.php");

if (isset($_POST['btn_enreg_type_event'])) {

    $libelle_type_even=$_POST['libelle_type_even'];
    $req =$bdd->prepare("SELECT * FROM type_even WHERE libelle_type_even=? ");
    $req->execute(array($libelle_type_even));
    $nbre =$req->rowcount();

    if($nbre >= 1){
        $_SESSION['libelle_type_even']="existe";
        header("Location:../type_even.php");
    }
    else{

        $libelle_type_even=$_POST['libelle_type_even'];
        $requete= $bdd ->prepare("INSERT INTO type_even(libelle_type_even) VALUES(?)"); 
        $requete ->execute(array($libelle_type_even));

        $_SESSION['notif']="ok"; 
        header("Location:../type_even.php");

        }
}

 ?>