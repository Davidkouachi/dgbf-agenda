
<?php 
session_start();
require_once("../connexion_bd/connexion_bd.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
if(date('Y-m-d')>$_POST['date_rdv1']){
	$_SESSION['date_inva']="ok";
	header("Location:../liste_rdv.php");
}else{

	$req =$bdd->prepare("SELECT * FROM usager,rdv WHERE rdv.id_usager=usager.id_usager and rdv.id_rdv=? ");
    $req->execute(array($_POST['id_rdv']));
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

	    $mail->Subject = 'Report de rendez-vous';
	    $mail->Body = 'Nous vous informons que le rendez-vous 
	    				que nous avions prévu pour le '.$elt['date_rdv'].' à '.$elt['heure_rdv'].'
	    				est reporté au '.$_POST['date_rdv1'].' à '.$_POST['heure_rdv1'];

	    $mail->send();
    }

	$modif=$bdd->prepare("UPDATE rdv SET date_rdv=?,heure_rdv=? WHERE id_rdv=?");
	$modif->execute(array($_POST['date_rdv1'],$_POST['heure_rdv1'],$_POST['id_rdv']));

    
					
	$_SESSION['notif']="ok";
	header("Location:../rdv.php");

	$_SESSION['date_modif']="ok";
	header("Location:../liste_rdv.php");
}
	



 ?>