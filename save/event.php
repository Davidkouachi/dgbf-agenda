<?php 

session_start();
require_once("../connexion_bd/connexion_bd.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['btn_enregistrer_event'])) {

		if (!empty($_POST['checkbox_selected'])) {

		$id_type_even=$_POST['id_type_even'];
		$color_event=$_POST['color_event'];
		$title_event=$_POST['title_event'];
		$start_event=$_POST['start_event'];
		$heure_event=$_POST['heure_event'];
		$end_event=$_POST['end_event'];
		$fin_event=$_POST['fin_event'];
		$id_hira=$_SESSION['id_hira'];
		$ordre_event=$_POST['ordre_event'];
		$lieu_event=$_POST['lieu_event'];
		$description_event=$_POST['description_event'];
		$statut_event=$_POST['statut_event'];
			if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous_Directeur' || $_SESSION['poste']=='Chef de Service') {
				$id_agent=$_SESSION['id_agent'];
			}elseif ($_SESSION['poste']=='Secretaire') {
					$req2=$bdd->prepare("SELECT * FROM structure_administrative,agent WHERE agent.id_hira=structure_administrative.id_hira and structure_administrative.id_hira=? and agent.dirige_agent='oui' ");
					$req2->execute(array($_SESSION['id_hira']));
					$element2=$req2->fetchall();
					foreach ($element2 as $elt2) {
						$id_agent=$elt2['id_agent'];
					}
			}elseif ($_SESSION['poste']=='Secretaire2'){
				$req2=$bdd->prepare("SELECT * FROM structure_administrative,agent WHERE agent.id_hira=structure_administrative.if_hira and structure_administrative.id_hira=? and agent.dirige_agent='oui' ");
					$req2->execute(array($_SESSION['id_hira']));
					$element2=$req2->fetchall();
					foreach ($element2 as $elt2) {
						$id_agent=$elt2['id_agent'];
					}
			}
		
		

		$requete= $bdd->prepare("INSERT INTO event(id_type_even,title_event,start_event,heure_event,end_event,fin_event,id_hira,color_event,ordre_event,lieu_event,description_event,statut_event,id_agent) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$requete ->execute(array($id_type_even,$title_event,$start_event,$heure_event,$end_event,$fin_event,$id_hira,$color_event,$ordre_event,$lieu_event,$description_event,$statut_event,$id_agent));

		$_SESSION['id_event']=$bdd->lastInsertId();

			foreach ($_POST['checkbox_selected'] as $value) {

				$id_agent=$value;

				$requete2= $bdd->prepare("INSERT INTO participe(id_event,id_agent) VALUES(?,?)");
				$requete2 ->execute(array($_SESSION['id_event'],$id_agent));
			}

				$req_notif=$bdd->prepare("SELECT * FROM agent,event,participe,type_even WHERE type_even.id_type_even=event.id_type_even and agent.id_agent=participe.id_agent and event.id_event=participe.id_event and participe.id_event=? ");
				$req_notif->execute(array($_SESSION['id_event']));
				$element_notif=$req_notif->fetchall();

					
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
					
						$mail->setFrom('ci.dbgf@gmail.com');
						$mail->AddReplyTo("ci.dbgf@gmail.com","dgbf.ci");

						foreach($element_notif as $elt_notif)
							{
								$mail->addAddress($elt_notif['email_agent']);
							}
					
						$mail->isHTML(true);
					
						$mail->Subject = 'CONVOCATION';

						foreach($element_notif as $elt_notif)
							{
								if ($elt_notif['start_event']==$elt_notif['end_event']) {

									$mail->Body = 'Vous etes inviter a participé a la '.$elt_notif['libelle_type_even']
										.' qui se tiendra le '.$elt_notif['start_event']
										." a partir de ".$elt_notif['heure_event']." à ".$elt_notif['lieu_event'];
								}else{
									$mail->Body = 'Vous etes inviter a participé a la '.$elt_notif['libelle_type_even']
										.' qui se tiendra du '.$elt_notif['start_event']
										." au ".$elt_notif['end_event']." de ".$elt_notif['heure_event']." à ".$elt_notif['fin_event']." à ".$elt_notif['lieu_event'];
								}
							}
					
						$mail->send();
					
					$_SESSION['eventp']="existep";
					header("Location:../event");

				}else{
			
			$_SESSION['eventpp']="existepp";
			header("Location:../event");

		}


		}
	
 ?>