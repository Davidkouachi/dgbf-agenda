<?php 

require_once("connexion_bd/connexion_bd.php");

$req_rdv=$bdd->prepare("SELECT * FROM rdv ");
$req_rdv->execute(array());
$element_rdv=$req_rdv->fetchall();
$nbre_rdv =$req_rdv->rowcount();

foreach ($element_rdv as $val_rdv) {

    $date=date('Y-m-d');
    $heure=date('H:m:i');

    if ($val_rdv['date_rdv'] == $date && $val_rdv['heure_rdv'] >= $heure) 
    {
        $modif_rdv=$bdd->prepare("UPDATE rdv SET statut_rdv='annuler' WHERE rdv.id_rdv=? ");
        $modif_rdv->execute(array($val_rdv['id_rdv']));
    }
    elseif($val_rdv['date_rdv'] > $date ) 
    {
        $modif_rdv=$bdd->prepare("UPDATE rdv SET statut_rdv='annuler' WHERE rdv.id_rdv=? ");
        $modif_rdv->execute(array($val_rdv['id_rdv']));
    }
}



 ?>