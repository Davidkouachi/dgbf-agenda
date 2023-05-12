<?php 
session_start();
require_once("../connexion_bd/connexion_bd.php");

if (isset($_POST['btn_pres_doc'])) {

    $id_pres=$_POST['id_pres'];
    $d_pres=$_POST['d_pres'];
    $req=$bdd->prepare("UPDATE prestation SET d_pres=? WHERE id_pres=?");
    $req->execute(array($d_pres,$id_pres));
    $element_pres=$req->fetchall();

    $_SESSION['notif_update']="ok";
    header("Location:../liste_pres.php");

}

if (isset($_POST['btn_pres_heure'])) {

    if (!empty($_POST['heure_selection'])){

        $id_pres=$_POST['id_pres'];

        $req2=$bdd->prepare("DELETE FROM prevue where id_pres=? ");
        $req2->execute(array($id_pres)); 

        foreach ($_POST['heure_selection'] as $value) {

                $id_heure=$value;

                $requete2= $bdd->prepare("INSERT INTO prevue(id_pres,id_heure) VALUES(?,?)");
                $requete2 ->execute(array($id_pres,$id_heure));
    
            }

        $_SESSION['notif_update1']="ok";
        header("Location:../liste_pres.php");
    }

}



 ?>