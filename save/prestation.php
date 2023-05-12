<?php 

session_start();
require_once("../connexion_bd/connexion_bd.php");

if (isset($_POST['btn_pres'])) {

	if (!empty($_POST['heure_selection'])) {

		$n_pres=$_POST['n_pres'];
		$d_pres=$_POST['d_pres'];
		$id_hira=$_SESSION['id_hira'];

		$requete= $bdd ->prepare("INSERT INTO prestation(n_pres,d_pres,id_hira) VALUES(?,?,?)");
		$requete ->execute(array($n_pres,$d_pres,$id_hira));

		$_SESSION['id_pres']=$bdd->lastInsertId();

		foreach ($_POST['heure_selection'] as $value) {

				$id_heure=$value;

				$requete2= $bdd->prepare("INSERT INTO prevue(id_pres,id_heure) VALUES(?,?)");
				$requete2 ->execute(array($_SESSION['id_pres'],$id_heure));

				
			}

		$_SESSION['notif']="ok";
		header("Location:../prestation.php");
	}	

}
 ?>