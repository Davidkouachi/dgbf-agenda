
<?php 
session_start();
require_once("../connexion_bd/connexion_bd.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$id_event=$_POST['id_event'];
$req=$bdd->prepare("SELECT * FROM event where id_event=? ;");
$req->execute(array($id_event));
$element_rdv=$req->fetchall();
foreach ($element_rdv as $key => $value) {

	if ($_POST['start_event1']<$value['start_event'])
	{
		if ($_POST['start_event1']<date('Y-m-d'))
		{
			$_SESSION['date_inva']="ok";
			header("Location:../liste_event.php");
		}else{

			$req =$bdd->prepare("SELECT * FROM agent,event,participe,type_even WHERE participe.id_agent=agent.id_agent and participe.id_event=event.id_event and event.id_type_even=type_even.id_type_even and event.id_event=? ");
		    $req->execute(array($_POST['id_event']));
		    $element=$req->fetchall();
			
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

						foreach($element as $elt_notif)
							{
								$mail->addAddress($elt_notif['email_agent']);
							}
					
						$mail->isHTML(true);
					
						$mail->Subject = 'CONVOCATION';

						foreach($element as $elt_notif)
							{
								if ($elt_notif['start_event']==$elt_notif['end_event']) {

									$mail->Body = 'Nous vous informons que la '.$elt_notif['libelle_type_even']
										.' prévu pour le '.$elt_notif['start_event']
										." de ".$elt_notif['heure_event']." à ".$elt_notif['fin_event']." a été reporter au ".$_POST['start_event1']." de ".$_POST['heure_event1']." à ".$_POST['fin_event1'].". Nous nous exusons par avance pour ce contre-temps et les éventuels inconvénients que cela pourrait causer";
								}else{
									$mail->Body = 'Nous vous informons que la '.$elt_notif['libelle_type_even']
										.' prévu pour du '.$elt_notif['start_event']
										." au ".$elt_notif['end_event']." de ".$elt_notif['heure_event']." à ".$elt_notif['fin_event']." a été reporter du ".$_POST['start_event1']." au ".$_POST['end_event1']." de ".$_POST['heure_event1']." à ".$_POST['fin_event1'].". Nous nous exusons par avance pour ce contre-temps et les éventuels inconvénients que cela pourrait causer";
								}
							}
					
						$mail->send();

			$modif=$bdd->prepare("UPDATE event SET start_event=?,heure_event=?,end_event=?,fin_event=? WHERE id_event=?");
			$modif->execute(array($_POST['start_event1'],$_POST['heure_event1'],$_POST['end_event1'],$_POST['fin_event1'],$_POST['id_event']));

			$_SESSION['date_modif']="ok";
			header("Location:../liste_event.php");
		}
	}
	elseif ($_POST['start_event1']>=$value['start_event'])
	{

			$req =$bdd->prepare("SELECT * FROM agent,event,participe,type_even WHERE participe.id_agent=agent.id_agent and participe.id_event=event.id_event and event.id_type_even=type_even.id_type_even and event.id_event=? ");
		    $req->execute(array($_POST['id_event']));
		    $element=$req->fetchall();

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

						foreach($element as $elt_notif)
							{
								$mail->addAddress($elt_notif['email_agent']);
							}
					
						$mail->isHTML(true);
					
						$mail->Subject = 'CONVOCATION';

						foreach($element as $elt_notif)
							{
								if ($elt_notif['start_event']==$elt_notif['end_event']) {

									$mail->Body = 'Nous vous informons que la '.$elt_notif['libelle_type_even']
										.' prévu pour le '.$elt_notif['start_event']
										." de ".$elt_notif['heure_event']." à ".$elt_notif['fin_event']." a été reporter au ".$_POST['start_event1']." de ".$_POST['heure_event1']." à ".$_POST['fin_event1'].". Nous nous exusons par avance pour ce contre-temps et les éventuels inconvénients que cela pourrait causer";
								}else{
									$mail->Body = 'Nous vous informons que la '.$elt_notif['libelle_type_even']
										.' prévu pour du '.$elt_notif['start_event']
										." au ".$elt_notif['end_event']." de ".$elt_notif['heure_event']." à ".$elt_notif['fin_event']." a été reporter du ".$_POST['start_event1']." au ".$_POST['end_event1']." de ".$_POST['heure_event1']." à ".$_POST['fin_event1'].". Nous nous exusons par avance pour ce contre-temps et les éventuels inconvénients que cela pourrait causer";
								}
							}
					
						$mail->send();
			

		$modif=$bdd->prepare("UPDATE event SET start_event=?,heure_event=?,end_event=?,fin_event=? WHERE id_event=?");
		$modif->execute(array($_POST['start_event1'],$_POST['heure_event1'],$_POST['end_event1'],$_POST['fin_event1'],$_POST['id_event']));

		$_SESSION['date_modif']="ok";
		header("Location:../liste_event.php");
	}
	

}


 ?>