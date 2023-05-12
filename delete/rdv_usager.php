<?php 
session_start();
require_once("../connexion_bd/connexion_bd.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$id_rdv=$_GET['id_rdv'];
$req=$bdd->prepare("UPDATE rdv SET statut_rdv='annuler' WHERE id_rdv=?");
$req->execute(array($id_rdv));
$element_rdv=$req->fetchall();

    $req =$bdd->prepare("SELECT * FROM usager,rdv WHERE rdv.id_usager=usager.id_usager and rdv.id_rdv=? ");
    $req->execute(array($_GET['id_rdv']));
    $element=$req->fetchall();

    foreach ($element as $elt) {

        require 'PHPMailer-master\src\Exception.php';
        require 'PHPMailer-master\src\PHPMailer.php';
        require 'PHPMailer-master\src\SMTP.php';

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true ;
        $mail->Username = 'ci.dbgf@gmail.com';
        $mail->Password = 'hqhoceyzfbpgvxxc';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('ci.dgbf@gmail.com');

        $mail->addAddress($elt['email_usager']);

        $mail->isHTML(true);

        $mail->Subject = 'Annulation de rendez-vous';
        $mail->Body = "Nous  vous informons que le rendez-vous 
                        que nous avions prévu pour le ".$elt['date_rdv']." à ".$elt['heure_rdv']."
                        a été annuler pour des raisons d'indisponibilités ";

        $mail->send();
    }

$_SESSION['notif_anu']="ok";
header("Location:../index_usager.php");


 ?>