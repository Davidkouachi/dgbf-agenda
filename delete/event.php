<?php 
session_start();
require_once("../connexion_bd/connexion_bd.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$id_event=$_GET['id_event'];
$req=$bdd->prepare("UPDATE event SET statut_event='annuler' WHERE id_event=?");
$req->execute(array($id_event));
$element_rdv=$req->fetchall();

$req =$bdd->prepare("SELECT * FROM agent,event,participe,type_even WHERE participe.id_agent=agent.id_agent and participe.id_event=event.id_event and event.id_type_even=type_even.id_type_even and event.id_event=? ");
            $req->execute(array($_GET['id_event']));
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

                                    $mail->Body = "Nous vous informons que la ".$elt_notif['libelle_type_even']." 
                                        qui etais prévu pour le ".$elt_notif['start_event']." de ".$elt_notif['heure_event']." à ".$elt_notif['fin_event']." a été annuler pour des raisons d'indisponibilités";
                                }else{
                                    $mail->Body = "Nous vous informons que la ".$elt_notif['libelle_type_even']." 
                                        qui etais prévu pour du ".$elt_notif['start_event']." au ".$elt_notif['end_event']." de ".$elt_notif['heure_event']." à ".$elt_notif['fin_event']." a été annuler pour des raisons d'indisponibilités";
                                }
                            }
                    
                        $mail->send();

$_SESSION['notif_anu']="ok";
header("Location:../liste_event.php");


 ?>