<?php 

session_start();
require_once("../connexion_bd/connexion_bd.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['btn_rdv'])) {

	/*$req_event1 =$bdd->prepare("SELECT * FROM event WHERE id_hira=? ");
	$req_event1->execute(array($elt['id_hira']));
	$nbre_event1 =$req_event1->rowcount();
	$element_event1=$req_event1->fetchall();*/

	$np_usager=$_POST['np_usager'];
	$email_usager=$_POST['email_usager'];
	$tel_usager=$_POST['tel_usager'];

	$requete= $bdd ->prepare("INSERT INTO usager(np_usager,email_usager,tel_usager) VALUES(?,?,?)");
	$requete->execute(array($np_usager,$email_usager,$tel_usager));
					

	$id_usager=$bdd->lastInsertId();
	$date_rdv=$_POST['date_rdv'];
	$heure_rdv=$_POST['heure_rdv'];
	$date_crea_rdv=date('Y-m-d H:i:s');
	$statut_rdv='en attente';
	$motif_rdv=$_POST['motif_rdv'];
	$id_hira=$_POST['id_hira'];


	$requete1= $bdd ->prepare("INSERT INTO rdv(date_rdv,date_crea_rdv,statut_rdv,heure_rdv,id_usager,motif_rdv,id_hira) VALUES(?,?,?,?,?,?,?)");
	$requete1 ->execute(array($date_rdv,$date_crea_rdv,$statut_rdv,$heure_rdv,$id_usager,$motif_rdv,$id_hira));

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

    $mail->addAddress($_POST['email_usager']);


    $mail->isHTML(true);

    $mail->Subject = 'Confirmation de rendez-vous';
    $mail->Body = 'Nous voudrions confirmer votre rendez-vous prévu le '.$_POST['date_rdv'].' à '.$_POST['heure_rdv'].'.
					Veuillez me contacter en cas de changement.';

    $mail->send();
					
	$_SESSION['notif']="ok";
	header("Location:../rdv.php");

} elseif (isset($_POST['btn_rdv_ligne'])) {

	$np_usager=$_POST['np_usager'];
	$email_usager=$_POST['email_usager'];
	$tel_usager=$_POST['tel_usager'];

	$requete= $bdd ->prepare("INSERT INTO usager(np_usager,email_usager,tel_usager) VALUES(?,?,?)");
	$requete->execute(array($np_usager,$email_usager,$tel_usager));
					

	$id_usager=$bdd->lastInsertId();
	$date_rdv=$_POST['date_rdv'];
	$date_crea_rdv=date('Y-m-d H:i:s');
	$heure_rdv=$_POST['heure_rdv'];
	$statut_rdv='en attente';
	$id_pres=$_POST['id_pres'];
	$id_hira=$_POST['id_hira'];


	$requete1= $bdd ->prepare("INSERT INTO rdv(date_rdv,date_crea_rdv,statut_rdv,heure_rdv,id_usager,id_pres,id_hira) VALUES(?,?,?,?,?,?,?)");
	$requete1 ->execute(array($date_rdv,$date_crea_rdv,$statut_rdv,$heure_rdv,$id_usager,$id_pres,$id_hira));
					
	$_SESSION['notif']="ok";
	header('location:../rdv_ligne.php');

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

    $mail->addAddress($_POST['email_usager']);

    $mail->isHTML(true);

    $mail->Subject = 'Confirmation de rendez-vous';
    $mail->Body = 'Nous voudrions confirmer votre rendez-vous prévu le '.$_POST['date_rdv'].' à '.$_POST['heure_rdv'].'. 
					Veuillez me contacter en cas de changement.';

    $mail->send();
					
	$_SESSION['notif']="ok";
	
	if ($_SESSION['id_usager']>'0') {
        header("Location:../rdv_ligne_usager.php");
    }else{
    	header("Location:../rdv_ligne.php");
    }
	

} elseif (isset($_POST['btn_rdv_ligne_usager'])) {					

	$id_usager=$_SESSION['id_usager'];
	$date_rdv=$_POST['date_rdv'];
	$date_crea_rdv=date('Y-m-d H:i:s');
	$heure_rdv=$_POST['heure_rdv'];
	$statut_rdv='en attente';
	$id_pres=$_POST['id_pres'];
	$id_hira=$_POST['id_hira'];


	$requete1= $bdd ->prepare("INSERT INTO rdv(date_rdv,date_crea_rdv,statut_rdv,heure_rdv,id_usager,id_pres,id_hira) VALUES(?,?,?,?,?,?,?)");
	$requete1 ->execute(array($date_rdv,$date_crea_rdv,$statut_rdv,$heure_rdv,$id_usager,$id_pres,$id_hira));
					
	$_SESSION['notif']="ok";
	header('location:../rdv_ligne.php');

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

    $mail->addAddress($_POST['email_usager']);

    $mail->isHTML(true);

    $mail->Subject = 'Confirmation de rendez-vous';
    $mail->Body = 'Nous voudrions confirmer votre rendez-vous prévu le '.$_POST['date_rdv'].' à '.$_POST['heure_rdv'].'. 
					Veuillez me contacter en cas de changement.';

    $mail->send();
					
	$_SESSION['notif']="ok";
	header("Location:../rdv_ligne_usager.php");

}

 ?>