<?php 

session_start();
require_once("../connexion_bd/connexion_bd.php");

if (isset($_POST['btn_direction'])) {

    $n_hira=$_POST['n_hira'];
    $req =$bdd->prepare("SELECT * FROM structure_administrative WHERE n_hira=? ");
    $req->execute(array($n_hira));
    $nbre =$req->rowcount();

    if($nbre >= 1){
        $_SESSION['notife']="existe";
        header("Location:../direction.php");
    }
    else{

        $n_hira=$_POST['n_hira'];
        $fax_hira=$_POST['fax_hira'];
        $tel_hira=$_POST['tel_hira'];
        $email_hira=$_POST['email_hira'];
        $id_parent='1';
        $id_type_hira='2';
        $etage_hira=$_POST['etage_hira'];
        $porte_hira=$_POST['porte_hira'];
        $requete= $bdd ->prepare("INSERT INTO structure_administrative(n_hira,fax_hira,tel_hira,email_hira,id_parent,id_type_hira,etage_hira,porte_hira) VALUES(?,?,?,?,?,?,?,?)"); 
        $requete ->execute(array($n_hira,$fax_hira,$tel_hira,$email_hira,$id_parent,$id_type_hira,$etage_hira,$porte_hira));

        $_SESSION['notif']="ok"; 
        header("Location:../direction.php");

    }
}

if (isset($_POST['btn_directeur'])) {

    $id_hira=$_POST['id_hira'];
    $req_agent=$bdd->prepare("SELECT * FROM agent WHERE id_hira=? and dirige_agent='oui' ");
    $req_agent->execute(array($id_hira));
    $nbre_agent =$req_agent->rowcount();

    if ($nbre_agent >= 1) {

        $_SESSION['agent']="existe";
        header("Location:../directeur.php");
    }
    else{

        $np_agent=$_POST['np_agent'];
        $email_agent=$_POST['email_agent'];
        $tel_agent=$_POST['tel_agent'];
        $mdp_agent=md5($_POST['mdp_agent']);
        $id_hira=$_POST['id_hira'];
        $dirige_agent='oui';
        $assiste_agent='non';

        $requete= $bdd ->prepare("INSERT INTO agent(np_agent,email_agent,tel_agent,mdp_agent,dirige_agent,id_hira,assiste_agent) VALUES(?,?,?,?,?,?,?)");
        $requete ->execute(array($np_agent,$email_agent,$tel_agent,$mdp_agent,$dirige_agent,$id_hira,$assiste_agent));

        $_SESSION['notif']="ok";
        header("Location:../directeur.php");
    }
}

if (isset($_POST['btn_secretaire_directeur'])) {

        $np_agent=$_POST['np_agent'];
        $email_agent=$_POST['email_agent'];
        $tel_agent=$_POST['tel_agent'];
        $mdp_agent=md5($_POST['mdp_agent']);
        $id_hira=$_POST['id_hira'];
        $dirige_agent='non';
        $assiste_agent='oui';

        $requete= $bdd ->prepare("INSERT INTO agent(np_agent,email_agent,tel_agent,mdp_agent,dirige_agent,id_hira,assiste_agent) VALUES(?,?,?,?,?,?,?)");
        $requete ->execute(array($np_agent,$email_agent,$tel_agent,$mdp_agent,$dirige_agent,$id_hira,$assiste_agent));

        $_SESSION['notif']="ok";
        header("Location:../secretaire_directeur.php");
}

if (isset($_POST['btn_sous_directeur'])) {

    $id_hira=$_POST['id_hira'];
    $req_agent=$bdd->prepare("SELECT * FROM agent WHERE id_hira=? and dirige_agent='oui' ");
    $req_agent->execute(array($id_hira));
    $nbre_agent =$req_agent->rowcount();

    if ($nbre_agent >= 1) {

        $_SESSION['agent']="existe";
        header("Location:../sous_directeur.php");
    }
    else{

        $np_agent=$_POST['np_agent'];
        $email_agent=$_POST['email_agent'];
        $tel_agent=$_POST['tel_agent'];
        $mdp_agent=md5($_POST['mdp_agent']);
        $id_hira=$_POST['id_hira'];
        $dirige_agent='oui';
        $assiste_agent='non';

        $requete= $bdd ->prepare("INSERT INTO agent(np_agent,email_agent,tel_agent,mdp_agent,dirige_agent,id_hira,assiste_agent) VALUES(?,?,?,?,?,?,?)");
        $requete ->execute(array($np_agent,$email_agent,$tel_agent,$mdp_agent,$dirige_agent,$id_hira,$assiste_agent));

        $_SESSION['notif']="ok";
        header("Location:../sous_directeur.php");
    }
}

if (isset($_POST['btn_secretaire_sous_directeur'])) {

        $np_agent=$_POST['np_agent'];
        $email_agent=$_POST['email_agent'];
        $tel_agent=$_POST['tel_agent'];
        $mdp_agent=md5($_POST['mdp_agent']);
        $id_hira=$_POST['id_hira'];
        $dirige_agent='non';
        $assiste_agent='oui';

        $requete= $bdd ->prepare("INSERT INTO agent(np_agent,email_agent,tel_agent,mdp_agent,dirige_agent,id_hira,assiste_agent) VALUES(?,?,?,?,?,?,?)");
        $requete ->execute(array($np_agent,$email_agent,$tel_agent,$mdp_agent,$dirige_agent,$id_hira,$assiste_agent));

        $_SESSION['notif']="ok";
        header("Location:../secretaire_sous_directeur.php");

}

if (isset($_POST['btn_sous_direction'])) {

    $email_hira=$_POST['email_hira'];
    $req =$bdd->prepare("SELECT * FROM structure_administrative WHERE email_hira=? ");
    $req->execute(array($email_hira));
    $nbre =$req->rowcount();

    if($nbre >= 1){
        $_SESSION['notife']="existe";
        header("Location:../sous_direction.php");
    }
    else{

        $n_hira=$_POST['n_hira'];
        $fax_hira=$_POST['fax_hira'];
        $tel_hira=$_POST['tel_hira'];
        $email_hira=$_POST['email_hira'];
        $id_parent=$_POST['id_parent'];
        $id_type_hira='3';
        $etage_hira=$_POST['etage_hira'];
        $porte_hira=$_POST['porte_hira'];
        $requete= $bdd ->prepare("INSERT INTO structure_administrative(n_hira,fax_hira,tel_hira,email_hira,id_parent,id_type_hira,etage_hira,porte_hira) VALUES(?,?,?,?,?,?,?,?)"); 
        $requete ->execute(array($n_hira,$fax_hira,$tel_hira,$email_hira,$id_parent,$id_type_hira,$etage_hira,$porte_hira));

        $_SESSION['notif']="ok"; 
        header("Location:../sous_direction.php");

    }
}

if (isset($_POST['btn_service'])) {

    $email_hira=$_POST['email_hira'];
    $req =$bdd->prepare("SELECT * FROM structure_administrative WHERE email_hira=? ");
    $req->execute(array($email_hira));
    $nbre =$req->rowcount();

    if($nbre >= 1){
        $_SESSION['notife']="existe";
        header("Location:../service.php");
    }
    else{

        $n_hira=$_POST['n_hira'];
        $fax_hira=$_POST['fax_hira'];
        $tel_hira=$_POST['tel_hira'];
        $email_hira=$_POST['email_hira'];
        $id_parent=$_POST['id_parent'];
        $id_type_hira='4';
        $etage_hira=$_POST['etage_hira'];
        $porte_hira=$_POST['porte_hira'];
        $requete= $bdd ->prepare("INSERT INTO structure_administrative(n_hira,fax_hira,tel_hira,email_hira,id_parent,id_type_hira,etage_hira,porte_hira) VALUES(?,?,?,?,?,?)"); 
        $requete ->execute(array($n_hira,$fax_hira,$tel_hira,$email_hira,$id_parent,$id_type_hira,$etage_hira,$porte_hira));

        $_SESSION['notif']="ok"; 
        header("Location:../service.php");

    }
}



 ?>