<?php 

session_start();
require_once("../connexion_bd/connexion_bd.php");

if (isset($_POST['btn_enregistrer_agent'])) {

	$email=$_POST['email_agent'];
	$req_agent=$bdd->prepare("SELECT * FROM agent WHERE email_agent=? ");
    $req_agent->execute(array($email));
    $nbre_agent =$req_agent->rowcount();

	if ($nbre_agent >= 1) {

		$_SESSION['agent']="existe";
		header("Location:../agent.php");
	}
	else{

		if ($_POST['chef_service']=='oui') {

			$np_agent=$_POST['np_agent'];
			$email_agent=$_POST['email_agent'];
			$admin_agent=$_POST['admin_agent'];
			$tel_agent=$_POST['tel_agent'];
			$mdp_agent=md5($_POST['mdp_agent']);
			$id_hira=$_POST['id_hira'];
			$dirige_agent='oui';
			$assiste_agent='non';

			$requete= $bdd ->prepare("INSERT INTO agent(np_agent,email_agent,admin_agent,tel_agent,mdp_agent,dirige_agent,id_hira,assiste_agent) VALUES(?,?,?,?,?,?,?,?)");
			$requete ->execute(array($np_agent,$email_agent,$admin_agent,$tel_agent,$mdp_agent,$dirige_agent,$id_hira,$assiste_agent));

			$_SESSION['notif']="ok";
			header("Location:../agent.php");
		}else{

			$np_agent=$_POST['np_agent'];
			$email_agent=$_POST['email_agent'];
			$tel_agent=$_POST['tel_agent'];
			$mdp_agent=md5($_POST['mdp_agent']);
			$id_hira=$_POST['id_hira'];
			$dirige_agent='non';
			$assiste_agent='non';

			$requete= $bdd ->prepare("INSERT INTO agent(np_agent,email_agent,tel_agent,mdp_agent,dirige_agent,id_hira,assiste_agent) VALUES(?,?,?,?,?,?,?)");
			$requete ->execute(array($np_agent,$email_agent,$tel_agent,$mdp_agent,$dirige_agent,$id_hira,$assiste_agent));

			$_SESSION['notif']="ok";
			header("Location:../agent.php");
		}

		
	}
}
 ?>