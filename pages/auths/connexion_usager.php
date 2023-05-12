<?php 

session_start();
require_once("../../connexion_bd/connexion_bd.php");

if (isset($_POST['btn_se_connecter'])) {

	$email=$_POST['email_usager'];
	$mdp=md5($_POST['mdp_usager']);
	$tel=$_POST['tel_usager'];
	$np=$_POST['np_usager'];

	$req =$bdd->prepare("SELECT * FROM usager WHERE email_usager=? and mdp_usager=? ");
	$req->execute(array($email,$mdp));
	$nbre =$req->rowcount();
	$element=$req->fetchall();
	if ($nbre=='1') {
		$_SESSION['erreur_admin']='oui';
		header("Location:../../login/login_v1/ins.php");
	}else{
		$requete= $bdd ->prepare("INSERT INTO usager(np_usager,email_usager,tel_usager,mdp_usager) VALUES(?,?,?,?)");
		$requete->execute(array($np,$email,$tel,$mdp));

		$_SESSION['id_usager']=$bdd->lastInsertId();
		$_SESSION['erreur_admin']='non';
		header("Location:../../index_usager.php");
	}

}

if (isset($_POST['btn_connecter'])) {

	$email=$_POST['email_usager'];
	$mdp=md5($_POST['mdp_usager']);

	$req =$bdd->prepare("SELECT * FROM usager WHERE email_usager=? and mdp_usager=? ");
	$req->execute(array($email,$mdp));
	$nbre =$req->rowcount();
	$element=$req->fetchall();

	if ($nbre=='1') {
		foreach ($element as $elt) {
			$_SESSION['id_usager']=$elt['id_usager'];
		}
		$_SESSION['erreur_admin']='non';
		header("Location:../../index_usager.php");
	}else{

		$_SESSION['erreur_admin']='oui';
		header("Location:../../login/login_v1/cons.php");
	}

}



 ?>