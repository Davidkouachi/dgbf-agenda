<?php

session_start();
require_once("connexion_bd/connexion_bd.php");

if ($_SESSION['id_agent']=='') {
   header('location:login/login_v1/index.php');
}

$cache_agent='';

$id_agent = $_SESSION['id_agent'];
$req_agent=$bdd->prepare("SELECT * FROM agent,structure_administrative where agent.id_hira=structure_administrative.id_hira and id_agent=? ");
$req_agent->execute(array($id_agent));
$element_agent=$req_agent->fetchall();
foreach ($element_agent as $elt_agent) {
    $_SESSION['id_hira']=$elt_agent['id_hira'];
    $_SESSION['type_hira']=$elt_agent['id_type_hira'];
}

$req_type_even=$bdd->prepare("SELECT * FROM type_even ");
$req_type_even->execute(array());
$element_type_even=$req_type_even->fetchall();



if ($_SESSION['poste']=='Agent') {
    $cache_agent='none';
}


if ($_SESSION['type_hira']=='2')
{

}
elseif ($_SESSION['type_hira']=='3')
{

}elseif ($_SESSION['type_hira']=='4')
{

}


$req_event=$bdd->prepare("SELECT * FROM agent,structure_administrative where agent.id_hira=structure_administrative.id_hira");
$req_event->execute(array());
$element_event=$req_event->fetchall();
$nbre_event =$req_event->rowcount();
/*foreach ($element_event as $value) {
if ($value['id_type_hira']=='2')
{
    echo $value['n_hira'];
}
elseif ($value['id_type_hira']=='3') 
{
    $reqr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
    $reqr->execute(array($value['id_parent']));
    $nbrer=$reqr->rowcount();
    $elementr=$reqr->fetchall();
    foreach ($elementr as $valuer)
    {
        echo $valuer['n_hira'];
    }
}
elseif ($value['id_type_hira']=='4') 
{
    $reqr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
    $reqr->execute(array($value['id_parent']));
    $nbrer=$reqr->rowcount();
    $elementr=$reqr->fetchall();
    foreach ($elementr as $valuer)
    {
        $reqrr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
        $reqrr->execute(array($valuer['id_parent']));
        $nbrerr=$reqrr->rowcount();
        $elementrr=$reqrr->fetchall();
        foreach ($elementrr as $valuer)
        {
            echo $valuer['n_hira'];
        }
    }
}
}*/

$etat='active';
$etat1='';
$disabled='';
$disabled1='disabled';
$col='12';
$msg='';



if (isset($_POST['btn_suivant1'])) {

    if ($_POST['start_event1'] < date('Y-m-d')) {

        $msg='Saisir une date valide';

    }else{
        if ($_POST['start_event1']==date('Y-m-d')) {
            $reqh=$bdd->prepare("SELECT * FROM heure where n_heure>? ");
            $reqh->execute(array(date('H:m:i')));
            $elementh=$reqh->fetchall();
        }elseif ($_POST['start_event1']>date('Y-m-d')) {
            $reqh=$bdd->prepare("SELECT * FROM heure  ");
            $reqh->execute(array());
            $elementh=$reqh->fetchall();
        }

            $_POST['start_event']=$_POST['start_event1'];
            $_POST['end_event']=$_POST['end_event1'];

            $begin = new DateTime($_POST['start_event1']);
            $end = new DateTime($_POST['end_event1']);
            $end = $end->modify( '+1 day' );

            $interval = new DateInterval('P1D');
            $daterange = new DatePeriod($begin, $interval ,$end);

            $req_event1=$bdd->prepare("SELECT * FROM type_even,event,structure_administrative,type_hirachie where structure_administrative.id_type_hira=type_hirachie.id_type_hira and event.id_hira=structure_administrative.id_hira and event.id_type_even=type_even.id_type_even ORDER BY event.start_event, event.heure_event ASC ");
            $req_event1->execute(array());
            $element_event1=$req_event1->fetchall();
            $nbre_event1=$req_event1->rowcount();

            $etat='';
            $etat1='active';
            $disabled='';
            $disabled1='';
            $msg='';
            $col='9';

    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<!-- Mirrored from dashlite.net/demo8/components/forms/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:57 GMT -->
<!-- Added by HTTrack -->
<meta content="text/html;charset=utf-8" http-equiv="content-type"/>
<!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
        <meta content="Softnio" name="author">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                <meta content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." name="description">
                    <link href="images/dgbf/logo de cote d'ivoire.png" rel="shortcut icon">
                        <title>
                            Nouvelle Evénement
                        </title>
                        <link href="assets/css/dashlite0226.css?ver=3.1.2" rel="stylesheet">
                            <link href="assets/css/theme0226.css?ver=3.1.2" id="skin-default" rel="stylesheet">
                                <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4">
                                </script>
                                <script>
                                    window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-91615293-4');
                                </script>
                            </link>
                        </link>
                    </link>
                </meta>
            </meta>
        </meta>
    </meta>
</head>
<body class="nk-body bg-lighter ">
    <div class="nk-app-root">
        <div class="nk-wrap " style="background-image: url('images/dgbf/bat 2.png'); background-position: button; background-size: cover; ">
            <div class="nk"  >
                <img style=" background-size: cover;" src="images/dgbf/banniere-min.jpg"></img>
            </div>
            <div class="nk" style="background:white; border-top: 1px solid #DEDEDE;" >
                <div class="container-fluid" >
                            <div class="nk-header-wrap">
                                <div class="nk-menu-trigger me-sm-2 d-lg-none">
                                <a class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav" href="#">
                                    <em class="icon ni ni-menu">
                                    </em>
                                </a>
                            </div>
                            <div class="nk-header-brand">
                                <a class="logo-link" href="#">
                                    <img class="logo-img" src="images/dgbf/logo de cote d'ivoire.png" ></img>
                                </a>
                            </div>
                                <div class="nk-header-menu ms-auto" data-content="headerNav">
                                    <div class="nk-header-mobile">
                                        <div class="nk-header-brand">
                                            <a class="logo-link" href="#">
                                                <img class="logo-img" src="images/dgbf/logo de cote d'ivoire.png" ></img>
                                            </a>
                                        </div>
                                        <div class="nk-menu-trigger me-n2">
                                            <a class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav" href="#">
                                                <em class="icon ni ni-arrow-left">
                                                </em>
                                            </a>
                                        </div>
                                    </div>
                            <ul class="nk-menu nk-menu-main ui-s2">
                                    <li class="nk-menu-item has-sub">
                                        <a class="nk-menu-link " href="index_2.php">
                                            <span class="nk-menu-text">
                                                Tableau de Bord
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                            <a class="nk-menu-link nk-menu-toggle" href="#">
                                                <span class="nk-menu-text">
                                                    Calendrier
                                                </span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link " href="calendrier.php">
                                                        <span class="nk-menu-text">
                                                            Calendrier Général
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link " href="calendrier_struc.php">
                                                        <span class="nk-menu-text">
                                                            Calendrier <?php 
                                                            if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Secretaire') {
                                                                echo " de la direction";
                                                            }if ($_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Secretaire2') {
                                                                echo " de la sous-direction";
                                                            }if ($_SESSION['poste']=='Chef de Service') {
                                                                echo " du service";
                                                            } ?>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link " href="calendrier_personnel.php">
                                                        <span class="nk-menu-text">
                                                            Calendrier Personnel
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <li class="nk-menu-item has-sub" style="display:<?php echo $cache_agent; ?>;">
                                        <a class="nk-menu-link nk-menu-toggle" href="#">
                                            <span class="nk-menu-text">
                                                Nouvelle enregistrement
                                            </span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item has-sub">
                                                <a class="nk-menu-link" href="event.php" >
                                                    <span class="nk-menu-text">
                                                        Ajouter un événement
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item" style="display:
                                                <?php  
                                                    if ($_SESSION['poste']!='Chef de Service'){
                                                        echo 'none';
                                                    }
                                                ?>;">
                                                    <a class="nk-menu-link" href="prestation.php">
                                                        <span class="nk-menu-text">
                                                            Nouvelle Prestation
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nk-menu-item" style="display:
                                                <?php  
                                                    if ($_SESSION['poste']=='Chef de Service'){
                                                        echo 'none';
                                                    }
                                                ?>;">
                                                    <a class="nk-menu-link" href="rdv.php">
                                                        <span class="nk-menu-text">
                                                            Planifier un Rendez-Vous
                                                        </span>
                                                    </a>
                                                </li>
                                        </ul>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a class="nk-menu-link nk-menu-toggle" href="#">
                                            <span class="nk-menu-text">
                                                Listes
                                            </span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a class="nk-menu-link" href="liste_event.php">
                                                    <span class="nk-menu-text">
                                                        Listes des événements
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item has-sub" style="display:
                                                <?php
                                                    if ($_SESSION['poste']=='Agent') {
                                                        echo $cache_agent;
                                                    }
                                                ?>;">
                                                    <a class="nk-menu-link nk-menu-toggle" href="liste_rdv.php">
                                                        <span class="nk-menu-text">
                                                            Liste des Rendez-Vous
                                                        </span>
                                                    </a>
                                                    <ul class="nk-menu-sub">
                                                        <li class="nk-menu-item">
                                                            <a class="nk-menu-link " href="liste_rdv_today.php">
                                                                <span class="nk-menu-text">
                                                                    Aujourd'hui
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="nk-menu-item">
                                                            <a class="nk-menu-link " href="liste_rdv.php">
                                                                <span class="nk-menu-text">
                                                                    Totals
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            <li class="nk-menu-item" style="display:
                                                <?php  
                                                    if ($_SESSION['poste']!='Chef de Service'){
                                                        echo 'none';
                                                    }
                                                ?>;">
                                                    <a class="nk-menu-link" href="liste_pres.php">
                                                        <span class="nk-menu-text">
                                                            Liste des Prestations
                                                        </span>
                                                    </a>
                                                </li>
                                        </ul>
                                    </li>
                                </ul>   
                        </div>
                        <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt">
                                                    </em>
                                                </div>
                                                <div class="user-info">
                                                    <?php foreach($element_agent as $elt_agent) {?>
                                                        <span class="lead-text">
                                                            <?php echo $elt_agent['np_agent']; ?>
                                                        </span>
                                                        <span class="sub-text">
                                                            <?php echo $elt_agent['email_agent']; ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                                            <form method="POST" class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="deconnexion.php">
                                                            <em class="icon ni ni-signout">
                                                            </em>
                                                            <span>
                                                                Se déconnecter
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="components-preview ">
                                <div class="nk-block-head nk-block-head-lg wide-sm">
                                    <div class="nk-block-head-content">
                                        <h2 class="nk-block-title fw-normal text-white">
                                            NOUVEL EVENEMENT 
                                        </h2>
                                    </div>
                                </div>
                                
                                <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-md-<?php echo $col; ?>" style="height: 900px;">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                                        <li class="nav-item">
                                                            <a <?php echo $disabled; ?> class="nav-link <?php echo $etat; ?>" data-bs-toggle="tab" href="#overview">
                                                                Véification de la Date
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a <?php echo $disabled1; ?> class="nav-link <?php echo $etat1; ?>" data-bs-toggle="tab" href="#thisyear">
                                                                Formulaire
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content mt-0" >
                                                        <div class="tab-pane <?php echo $etat; ?>" id="overview" data-simplebar="" style="height: 800px;">
                                                            <form class="row g-gs invest-ov gy-2" action="" method="POST"  >
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Date</label>
                                                                        <div class="form-control-wrap">
                                                                            <div class="input-daterange date-picker-range input-group">
                                                                                <input data-date-format="yyyy-mm-dd" type="text" autocomplete="off" class="form-control date-picker" name="start_event1" />
                                                                            <div class="input-group-addon">Au</div>
                                                                                <input data-date-format="yyyy-mm-dd" type="text" autocomplete="off" class="form-control date-picker" name="end_event1" />
                                                                            </div>
                                                                        </div>
                                                                        <label style="color: red;"><?php echo $msg; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12" style="text-align: center; justify-content:center;">
                                                                    <div class="form-group ">
                                                                        <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_suivant1">
                                                                            suivant
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane <?php echo $etat1; ?>" id="thisyear"data-simplebar="" style="height: 800px;">
                                                            <form action="save/event.php" method="POST" class="form-validate row g-gs invest-ov gy-2">
                                                            <div class="row g-gs">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-topics">
                                                                            Type d'événement
                                                                        </label>
                                                                        <div class="form-control-wrap ">
                                                                            <select class="form-control js-select2" name="id_type_even" required="">
                                                                                <option value="a" disabled selected>
                                                                                    Sélectionner un type d'événement
                                                                                </option>
                                                                                <?php foreach ($element_type_even as $elt_type_even) {?>
                                                                                    <option value="<?php echo $elt_type_even['id_type_even'] ?>">
                                                                                        <?php echo $elt_type_even['libelle_type_even'] ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-topics">
                                                                            Importance
                                                                        </label>
                                                                        <div class="form-control-wrap ">
                                                                            <select class="form-control js-select2" name="color_event" required="">
                                                                                <option value="a" disabled selected>
                                                                                    Sélectionner une importance
                                                                                </option>
                                                                                <option value="red">
                                                                                    Urgent
                                                                                </option>
                                                                                <option value="orange" >
                                                                                    Imporant
                                                                                </option>
                                                                                <option value="green" >
                                                                                    standard
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-full-name">
                                                                            Objet
                                                                        </label>
                                                                        <div class="form-control-wrap">
                                                                            <input autocomplete="off" class="form-control" id="fv-full-name" name="title_event" required="" type="text"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Date </label>    <div class="form-control-wrap">
                                                                            <div class="input-daterange date-picker-range input-group">
                                                                                <input disabled="" type="text" autocomplete="off" class="form-control" name="start_event1" value="<?php echo $_POST['start_event1'] ?>" />
                                                                                <input style="display: none;" type="text" autocomplete="off" class="form-control" name="start_event" value="<?php echo $_POST['start_event1'] ?>" />
                                                                            <div class="input-group-addon">Au</div>
                                                                                <input disabled="" type="text" autocomplete="off" class="form-control" name="end_event1" value="<?php echo $_POST['end_event1'] ?>"/>
                                                                                <input style="display: none;" type="text" autocomplete="off" class="form-control" name="end_event" value="<?php echo $_POST['end_event1'] ?>"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Heure Début</label> 
                                                                        <select class="form-control js-select2" name="heure_event">
                                                                            <option value="a" disabled selected>
                                                                                Sélectionner une heure
                                                                            </option>
                                                                            <?php foreach ($elementh as $elth) {?>
                                                                                <option value="<?php echo $elth['n_heure'] ?>">
                                                                                    <?php echo $elth['n_heure'] ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Heure Fin</label> 
                                                                        <select class="form-control js-select2" name="fin_event">
                                                                            <option value="a" disabled selected>
                                                                                Sélectionner une heure
                                                                            </option>
                                                                            <?php foreach ($elementh as $elth) {?>
                                                                                <option value="<?php echo $elth['n_heure'] ?>">
                                                                                    <?php echo $elth['n_heure'] ?>
                                                                                </option>
                                                                            <?php } ?> 
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-full-name">
                                                                            Ordre du Jour
                                                                        </label>
                                                                        <div class="form-control-wrap">
                                                                            <textarea style="resize: none;" class="form-control" id="fv-full-name" name="ordre_event" ></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-full-name">
                                                                            Lieu
                                                                        </label>
                                                                        <div class="form-control-wrap">
                                                                            <input autocomplete="off" class="form-control" id="fv-full-name" name="lieu_event" required="" type="text"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6" style="display: none;">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-full-name">
                                                                            Statut
                                                                        </label>
                                                                        <div class="form-control-wrap">
                                                                            <input class="form-control" id="fv-full-name" name="statut_event" value="en attente" type="text"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6" style="display: none;">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-full-name">
                                                                            Statut
                                                                        </label>
                                                                        <div class="form-control-wrap">
                                                                            <input class="form-control" id="fv-full-name" name="id_hira" value="<?php echo $_SESSION['id_direction'] ?>" type="text"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-full-name">
                                                                            Informations Suplémentaires
                                                                        </label>
                                                                        <div class="form-control-wrap">
                                                                            <textarea style="resize: none;" class="form-control" id="fv-full-name" name="description_event" rows="10"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-full-name">
                                                                            Participants
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                        
                                                    <div class="card  card-preview">
                                                    <div class="card-inner">
                                                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                                                            <thead>
                                                                <tr class="nk-tb-item nk-tb-head">
                                                                    <th class="nk-tb-col nk-tb-col-check">

                                                                    </th>
                                                                    <th class="nk-tb-col tb-col-mb">
                                                                        <span class="sub-text">
                                                                            Agent
                                                                        </span>
                                                                    </th>
                                                                    <th class="nk-tb-col tb-col-mb">
                                                                        <span class="sub-text">
                                                                            Contact
                                                                        </span>
                                                                    </th>
                                                                    <th class="nk-tb-col tb-col-md">
                                                                        <span class="sub-text">
                                                                            Fonction
                                                                        </span>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($element_agent as $elt_agent) {
                                                                    if ($elt_agent['id_type_hira']=='2'){?>

                                                                    <?php foreach ($element_event as $value) {
                                                                        if ($value['id_type_hira']=='2' && $value['n_hira']==$_SESSION['structure_direction']) {?>
                                                                    <tr class="nk-tb-item">
                                                                        <td class="nk-tb-col nk-tb-col-check">
                                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                                <input class="custom-control-input" id="uid<?php echo $value['id_agent']; ?>" type="checkbox" name="checkbox_selected[]" value="<?php echo $value['id_agent']; ?>">
                                                                                <label class="custom-control-label" for="uid<?php echo $value['id_agent']; ?>">
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <div class="user-card">
                                                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                                    <em class="icon ni ni-user-alt"></em>
                                                                                </div>
                                                                                <div class="user-info">
                                                                                    <span class="tb-lead">
                                                                                        <?php echo $value['np_agent']; ?>
                                                                                        <span class="dot dot-success d-md-none ms-1">
                                                                                        </span>
                                                                                    </span>
                                                                                    <span>
                                                                                        <?php echo $value['email_agent']; ?>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <span class="tb-amount">
                                                                                <?php echo $value['tel_agent']; ?>
                                                                            </span>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-md">
                                                                            <span class="tb-amount">
                                                                                <?php 
                                                                                if ($value['dirige_agent']=='oui' && $value['id_type_hira']=='2')
                                                                                {
                                                                                    echo "Directeur";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Sous-Directeur "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='4') 
                                                                                {
                                                                                    echo "Chef de Service "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='2') 
                                                                                {
                                                                                    echo "Secretaire "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Secretaire "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='non' && $value['dirige_agent']=='non') 
                                                                                {
                                                                                    echo "Agent "."(".$value['n_hira'].")";
                                                                                }

                                                                                ?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }} ?>
                                                                    <?php foreach ($element_event as $value) {
                                                                        if ($value['id_type_hira']=='3') {
                                                                            $reqr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
                                                                            $reqr->execute(array($value['id_parent']));
                                                                            $nbrer=$reqr->rowcount();
                                                                            $elementr=$reqr->fetchall();
                                                                            foreach ($elementr as $eltr) {
                                                                                if ($eltr['n_hira']==$_SESSION['structure_direction']) {?>
                                                                    <tr class="nk-tb-item">
                                                                        <td class="nk-tb-col nk-tb-col-check">
                                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                                <input class="custom-control-input" id="uid<?php echo $value['id_agent']; ?>" type="checkbox" name="checkbox_selected[]" value="<?php echo $value['id_agent']; ?>">
                                                                                <label class="custom-control-label" for="uid<?php echo $value['id_agent']; ?>">
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <div class="user-card">
                                                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                                    <em class="icon ni ni-user-alt"></em>
                                                                                </div>
                                                                                <div class="user-info">
                                                                                    <span class="tb-lead">
                                                                                        <?php echo $value['np_agent']; ?>
                                                                                        <span class="dot dot-success d-md-none ms-1">
                                                                                        </span>
                                                                                    </span>
                                                                                    <span>
                                                                                        <?php echo $value['email_agent']; ?>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <span class="tb-amount">
                                                                                <?php echo $value['tel_agent']; ?>
                                                                            </span>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-md">
                                                                            <span class="tb-amount">
                                                                                <?php 
                                                                                if ($value['dirige_agent']=='oui' && $value['id_type_hira']=='2')
                                                                                {
                                                                                    echo "Directeur";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Sous-Directeur  "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='4') 
                                                                                {
                                                                                    echo "Chef de Service "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='2') 
                                                                                {
                                                                                    echo "Secretaire "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Secretaire  "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='non' && $value['dirige_agent']=='non') 
                                                                                {
                                                                                    echo "Agent "."(".$value['n_hira'].")";
                                                                                }

                                                                                ?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }}}} ?>
                                                                    <?php foreach ($element_event as $value) {
                                                                        if ($value['id_type_hira']=='4') {
                                                                            $reqr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
                                                                            $reqr->execute(array($value['id_parent']));
                                                                            $nbrer=$reqr->rowcount();
                                                                            $elementr=$reqr->fetchall();
                                                                            foreach ($elementr as $eltr) {
                                                                            $reqrr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
                                                                            $reqrr->execute(array($eltr['id_parent']));
                                                                            $nbrerr=$reqrr->rowcount();
                                                                            $elementrr=$reqrr->fetchall();
                                                                            foreach ($elementrr as $eltrr) {
                                                                                 if ($eltrr['n_hira']==$_SESSION['structure_direction']) {?>
                                                                    <tr class="nk-tb-item">
                                                                        <td class="nk-tb-col nk-tb-col-check">
                                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                                <input class="custom-control-input" id="uid<?php echo $value['id_agent']; ?>" type="checkbox" name="checkbox_selected[]" value="<?php echo $value['id_agent']; ?>">
                                                                                <label class="custom-control-label" for="uid<?php echo $value['id_agent']; ?>">
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <div class="user-card">
                                                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                                    <em class="icon ni ni-user-alt"></em>
                                                                                </div>
                                                                                <div class="user-info">
                                                                                    <span class="tb-lead">
                                                                                        <?php echo $value['np_agent']; ?>
                                                                                        <span class="dot dot-success d-md-none ms-1">
                                                                                        </span>
                                                                                    </span>
                                                                                    <span>
                                                                                        <?php echo $value['email_agent']; ?>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <span class="tb-amount">
                                                                                <?php echo $value['tel_agent']; ?>
                                                                            </span>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-md">
                                                                            <span class="tb-amount">
                                                                                <?php 
                                                                                if ($value['dirige_agent']=='oui' && $value['id_type_hira']=='2')
                                                                                {
                                                                                    echo "Directeur";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Sous-Directeur "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='4') 
                                                                                {
                                                                                    echo "Chef de Service  "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='2' || $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Secretaire "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='non' && $value['dirige_agent']=='non') 
                                                                                {
                                                                                    echo "Agent "."(".$value['n_hira'].")";
                                                                                }

                                                                                ?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }}}}} ?>

                                                                <?php }elseif ($elt_agent['id_type_hira']=='3'){?>

                                                                    <?php foreach ($element_event as $value) {
                                                                        if ($value['id_type_hira']=='3') {
                                                                            $reqr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
                                                                            $reqr->execute(array($value['id_parent']));
                                                                            $nbrer=$reqr->rowcount();
                                                                            $elementr=$reqr->fetchall();
                                                                            foreach ($elementr as $eltr) {?>
                                                                    <tr class="nk-tb-item">
                                                                        <td class="nk-tb-col nk-tb-col-check">
                                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                                <input class="custom-control-input" id="uid<?php echo $value['id_agent']; ?>" type="checkbox" name="checkbox_selected[]" value="<?php echo $value['id_agent']; ?>">
                                                                                <label class="custom-control-label" for="uid<?php echo $value['id_agent']; ?>">
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <div class="user-card">
                                                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                                    <em class="icon ni ni-user-alt"></em>
                                                                                </div>
                                                                                <div class="user-info">
                                                                                    <span class="tb-lead">
                                                                                        <?php echo $value['np_agent']; ?>
                                                                                        <span class="dot dot-success d-md-none ms-1">
                                                                                        </span>
                                                                                    </span>
                                                                                    <span>
                                                                                        <?php echo $value['email_agent']; ?>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <span class="tb-amount">
                                                                                <?php echo $value['tel_agent']; ?>
                                                                            </span>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-md">
                                                                            <span class="tb-amount">
                                                                                <?php 
                                                                                if ($value['dirige_agent']=='oui' && $value['id_type_hira']=='2')
                                                                                {
                                                                                    echo "Directeur";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Sous-Directeur  "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='4') 
                                                                                {
                                                                                    echo "Chef de Service "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='2') 
                                                                                {
                                                                                    echo "Secretaire "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Secretaire  "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='non' && $value['dirige_agent']=='non') 
                                                                                {
                                                                                    echo "Agent "."(".$value['n_hira'].")";
                                                                                }

                                                                                ?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }}} ?>
                                                                    <?php foreach ($element_event as $value) {
                                                                        if ($value['id_type_hira']=='4') {
                                                                            $reqr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
                                                                            $reqr->execute(array($value['id_parent']));
                                                                            $nbrer=$reqr->rowcount();
                                                                            $elementr=$reqr->fetchall();
                                                                            foreach ($elementr as $eltr) {
                                                                            $reqrr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
                                                                            $reqrr->execute(array($eltr['id_parent']));
                                                                            $nbrerr=$reqrr->rowcount();
                                                                            $elementrr=$reqrr->fetchall();
                                                                            foreach ($elementrr as $eltrr) {?>
                                                                    <tr class="nk-tb-item">
                                                                        <td class="nk-tb-col nk-tb-col-check">
                                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                                <input class="custom-control-input" id="uid<?php echo $value['id_agent']; ?>" type="checkbox" name="checkbox_selected[]" value="<?php echo $value['id_agent']; ?>">
                                                                                <label class="custom-control-label" for="uid<?php echo $value['id_agent']; ?>">
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <div class="user-card">
                                                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                                    <em class="icon ni ni-user-alt"></em>
                                                                                </div>
                                                                                <div class="user-info">
                                                                                    <span class="tb-lead">
                                                                                        <?php echo $value['np_agent']; ?>
                                                                                        <span class="dot dot-success d-md-none ms-1">
                                                                                        </span>
                                                                                    </span>
                                                                                    <span>
                                                                                        <?php echo $value['email_agent']; ?>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <span class="tb-amount">
                                                                                <?php echo $value['tel_agent']; ?>
                                                                            </span>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-md">
                                                                            <span class="tb-amount">
                                                                                <?php 
                                                                                if ($value['dirige_agent']=='oui' && $value['id_type_hira']=='2')
                                                                                {
                                                                                    echo "Directeur";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Sous-Directeur "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='4') 
                                                                                {
                                                                                    echo "Chef de Service  "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='2' || $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Secretaire"."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='non' && $value['dirige_agent']=='non') 
                                                                                {
                                                                                    echo "Agent "."(".$value['n_hira'].")";
                                                                                }

                                                                                ?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }}}} ?>

                                                                <?php }elseif ($elt_agent['id_type_hira']=='4') {?>

                                                                    <?php foreach ($element_event as $value) {
                                                                    if ($value['id_type_hira']=='4') {
                                                                        $reqr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
                                                                        $reqr->execute(array($value['id_parent']));
                                                                        $nbrer=$reqr->rowcount();
                                                                        $elementr=$reqr->fetchall();
                                                                        foreach ($elementr as $eltr) {
                                                                        $reqrr=$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
                                                                        $reqrr->execute(array($eltr['id_parent']));
                                                                        $nbrerr=$reqrr->rowcount();
                                                                        $elementrr=$reqrr->fetchall();
                                                                        foreach ($elementrr as $eltrr) {
                                                                             if ($eltrr['n_hira']==$_SESSION['structure_direction']) {?>
                                                                    <tr class="nk-tb-item">
                                                                        <td class="nk-tb-col nk-tb-col-check">
                                                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                                <input class="custom-control-input" id="uid<?php echo $value['id_agent']; ?>" type="checkbox" name="checkbox_selected[]" value="<?php echo $value['id_agent']; ?>">
                                                                                <label class="custom-control-label" for="uid<?php echo $value['id_agent']; ?>">
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <div class="user-card">
                                                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                                    <em class="icon ni ni-user-alt"></em>
                                                                                </div>
                                                                                <div class="user-info">
                                                                                    <span class="tb-lead">
                                                                                        <?php echo $value['np_agent']; ?>
                                                                                        <span class="dot dot-success d-md-none ms-1">
                                                                                        </span>
                                                                                    </span>
                                                                                    <span>
                                                                                        <?php echo $value['email_agent']; ?>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-mb">
                                                                            <span class="tb-amount">
                                                                                <?php echo $value['tel_agent']; ?>
                                                                            </span>
                                                                        </td>
                                                                        <td class="nk-tb-col tb-col-md">
                                                                            <span class="tb-amount">
                                                                                <?php 
                                                                                if ($value['dirige_agent']=='oui' && $value['id_type_hira']=='2')
                                                                                {
                                                                                    echo "Directeur";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Sous-Directeur "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='4') 
                                                                                {
                                                                                    echo "Chef de Service  "."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='2' || $value['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Secretaire"."(".$value['n_hira'].")";
                                                                                }
                                                                                elseif ($value['assiste_agent']=='non' && $value['dirige_agent']=='non') 
                                                                                {
                                                                                    echo "Agent "."(".$value['n_hira'].")";
                                                                                }

                                                                                ?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }}}}} ?>

                                                                <?php }} ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                                <div class="col-md-12" style="text-align: center; justify-content:center;">
                                                                    <div class="form-group ">
                                                                        <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_enregistrer_event">
                                                                            Enregistrer
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($nbre_event1)>='1') { ?>
                                    <div class="col-md-3" style="height: 900px;" >
                                        <div class="card card-bordered card-full" data-simplebar="">
                                            <div class="card-inner">
                                                <div class="timeline">
                                                    <?php foreach($daterange as $dat){
                                                        $date=$dat->format("Y-m-d");
                                                        $date1=$dat->format("d m Y");
                                                        ?>
                                                    <h6 class="timeline-head" style="padding-top: 5px;">
                                                       <?php echo $date1; ?>
                                                    </h6>
                                                    
                                                    <ul class="timeline-list" >
                                                        <?php foreach ($element_event1 as $elt_event1){ 
                                                        if ($elt_event1['start_event'] <= $date && $date <= $elt_event1['end_event']){?>
                                                        <li class="timeline-item" >
                                                            <div class="timeline-status bg-primary is-outline">
                                                            </div>
                                                            <div class="timeline-date">
                                                                <?php echo $elt_event1['libelle_type_even']; ?>
                                                                <em class="icon ni ni-alarm-alt">
                                                                </em>
                                                            </div>
                                                            <div class="timeline-data">
                                                                <h1 class="timeline-title">
                                                                    <?php echo $elt_event1['heure_event'].' à '.$elt_event1['fin_event']; ?>
                                                                </h1>
                                                                <div class="timeline-des">
                                                                    <p style="color:<?php echo $elt_event1['color_event']; ?>;"> 
                                                                       <?php 
                                                                       if ($elt_event1['color_event']=='red'){
                                                                            echo 'Urgent';
                                                                        }elseif ($elt_event1['color_event']=='orange') {
                                                                            echo 'Important';
                                                                        }elseif ($elt_event1['color_event']=='green') {
                                                                            echo 'Standard';
                                                                        }
                                                                       ?>
                                                                    </p>
                                                                    <span class="time">
                                                                        <?php 
                                                                            if ($elt_event1['id_type_hira']=='2') {
                                                                                echo "Organisé par le Directeur de la ".$elt_event1['n_hira'];
                                                                            }elseif ($elt_event1['id_type_hira']=='3') {
                                                                                echo "Organisé par le Directeur de la ".$elt_event1['n_hira'];
                                                                            }elseif ($elt_event1['id_type_hira']=='4') {
                                                                                echo "Organisé par le Chef du ".$elt_event1['n_hira'];
                                                                            }
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php }}?>
                                                    </ul>
                                                   <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }else{} ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="typeEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" id="preview-event-header">
                    <h5 class="modal-title">
                        Nouveau type d'événement
                    </h5>
                    <a aria-label="Close" class="close" data-bs-dismiss="modal" href="#">
                        <em class="icon ni ni-cross">
                        </em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="save/type_even.php" method="POST" autocomplete="off" class="form-validate is-alter">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input autocomplete="off" class="form-control form-control-lg" id="email-address" placeholder="Entrer un type d'événement" required="" type="text" name="libelle_type_even" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="btn_enreg_type_event" class="btn btn-lg btn-success btn-dim btn-block">
                                            Enregistrer
                                        </button>
                                </form>
                    <!-- <ul class="d-flex justify-content-between gx-4 mt-3">
                        <li>
                            <button class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#editEventPopup" data-bs-toggle="modal">
                                Edit Event
                            </button>
                        </li>
                        <li>
                            <button class="btn btn-danger btn-dim" data-bs-dismiss="modal" data-bs-target="#deleteEventPopup" data-bs-toggle="modal">
                                Delete
                            </button>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/bundle0226.js?ver=3.1.2">
    </script>
    <script src="assets/js/scripts0226.js?ver=3.1.2">
    </script>
    <script src="assets/js/demo-settings0226.js?ver=3.1.2">
    </script>

    <?php if(isset($_SESSION['eventp'])=="existep" ) {?>
        <script>
            Swal.fire({
                        icon: "success",
                        title: "Succès"
                    })
        </script>
    <?php } unset($_SESSION['eventp']); unset($_SESSION['id_event']);  ?>

    <?php if(isset($_SESSION['eventpp'])=="existepp" ) {?>
        <script>
            Swal.fire({
                        icon: "error",
                        title: "Aucun agent n'a été Convoqué"
                    })
        </script>
    <?php } unset($_SESSION['eventpp']);  ?>


    <link href="notification/toastr.min.css" rel="stylesheet">
    <script src="notification/toastr.min.js"></script>

</body>
<!-- Mirrored from dashlite.net/demo8/components/forms/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:57 GMT -->
</html>