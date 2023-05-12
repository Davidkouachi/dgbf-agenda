<?php

session_start();
require_once("connexion_bd/connexion_bd.php");

if ($_SESSION['id_agent']=='') {
        header('location:login/login_v1/index.php');
    }

$cache_agent='';

    $id_agent = $_SESSION['id_agent'];
    $req_agent=$bdd->prepare("SELECT * FROM agent where id_agent=? ");
    $req_agent->execute(array($id_agent));
    $element_agent=$req_agent->fetchall();
    foreach ($element_agent as $elt_agent) {
        $_SESSION['id_hira']=$elt_agent['id_hira'];
    }

    $id_agent = $_SESSION['id_agent'];
    $req_agent=$bdd->prepare("SELECT * FROM agent where id_agent=? ");
    $req_agent->execute(array($id_agent));
    $element_agent=$req_agent->fetchall();
    foreach ($element_agent as $elt_agent) {
        $_SESSION['id_hira']=$elt_agent['id_hira'];
    }

    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Chef de Service' || $_SESSION['poste']=='Secretaire' || $_SESSION['poste']=='Secretaire2') {
        $cache_agent='';

        $req_rdv1=$bdd->prepare("SELECT * FROM agent,event,type_even,structure_administrative where agent.id_agent=event.id_agent and event.id_type_even=type_even.id_type_even and event.id_hira=structure_administrative.id_hira and event.id_hira=? ");
        $req_rdv1->execute(array($_SESSION['id_hira']));
        $element_rdv1=$req_rdv1->fetchall();
        $nbre_rdv1 =$req_rdv1->rowcount();

    }


    if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';

        $req_rdv1=$bdd->prepare("SELECT * FROM event,type_even,participe,agent where participe.id_agent=agent.id_agent and participe.id_event=event.id_event and event.id_type_even=type_even.id_type_even and participe.id_agent=? ");

        $req_rdv1->execute(array($_SESSION['id_agent']));
        $element_rdv1=$req_rdv1->fetchall();
        $nbre_rdv1 =$req_rdv1->rowcount();

        foreach ($element_rdv1 as $key => $value) {
            // code...
        }
    }

/*$date=date('Y-m-d');
$req_eventd=$bdd->prepare("SELECT * FROM event WHERE start_event <= $date and end_event >= $date ");
$req_eventd->execute(array($date));
$nbre_eventd =$req_eventd->rowcount();
$element_eventd=$req_eventd->fetchall();*/

if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';
    }

    $reqh=$bdd->prepare("SELECT * FROM heure ");
    $reqh->execute(array());
    $elementh=$reqh->fetchall();
    $nbreh =$reqh->rowcount();

    if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';
    }
    if ($_SESSION['poste']=='Chef de Service') {
        $cache_chef='none';
    }
    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur') {
        $cache_direc='none';
    }

?>

<!DOCTYPE html>
<html class="js" lang="zxx">
    <!-- Mirrored from dashlite.net/demo8/apps-calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:36 GMT -->
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
                                Liste des Evénements
                            </title>
                            <link href="assets/css/dashlite0226.css" rel="stylesheet">
                                <link href="assets/css/theme0226.css" id="skin-default" rel="stylesheet"></link>
                            </link>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body class="nk-body bg-lighter " >
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
                                                            }if ($_SESSION['poste']=='Chef de Service' || $_SESSION['poste']=='Agent') {
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
                                        <li class="nk-menu-item has-sub" 
                                            style="display:
                                                <?php  
                                                    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Agent'){
                                                        echo 'none';
                                                    }
                                                ?>;">
                                            <a class="nk-menu-link nk-menu-toggle" href="#">
                                                <span class="nk-menu-text">
                                                    Nouvelle enregistrement
                                                </span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-between">
                                        <div class="nk-block-head-content ">
                                            <h3 class="nk-block-title page-title" style="text-align: center; color: white;">
                                                Liste des Evénements
                                            </h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <marquee> 
                                                <h3 class="nk-block-title page-title" style="color:orange;">

                                                </h3>
                                            </marquee> 
                                        </div>
                                        <div class="nk-block-head-content" style="display: <?php if ($_SESSION['poste']=='Agent') { echo 'none'; } ?>;">
                                            <a style="padding:5px;" class="btn btn-icon btn-primary btn-dim" href="event.php">
                                                <em class="icon ni ni-plus"></em>
                                                Planifier un Evénement  
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table id="datatable" class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead class="text-center">
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col nk-tb-col-check">
                                                                    
                                                            </th>
                                                            <th class="nk-tb-col">
                                                                <span class="sub-text">
                                                                    Type
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col">
                                                                <span class="sub-text">
                                                                    Objet
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-mb">
                                                                <span class="sub-text">
                                                                    Date
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md">
                                                                <span class="sub-text">
                                                                    Heure
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md">
                                                                <span class="sub-text">
                                                                    Lieu
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md">
                                                                <span class="sub-text">
                                                                    Organiser Par
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                                <span class="sub-text">
                                                                    Statut
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md" >
                                                                <span class="sub-text">
                                                                    
                                                                </span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        <?php foreach ($element_rdv1 as $key => $value) {?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                <?php echo $key+1; ?>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $value['libelle_type_even']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $value['title_event']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php if ($value['start_event']==$value['end_event']) {
                                                                        echo $value['start_event'];
                                                                    }else{
                                                                       echo $value['start_event']." au ".$value['end_event']; 
                                                                    }  ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $value['heure_event']." à ".$value['fin_event'];  ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $value['lieu_event']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span style="display: <?php if ($_SESSION['poste']=='Agent') { echo ' '; } ?>;">
                                                                    <?php 
                                                                        $reqh1=$bdd->prepare("SELECT * FROM agent,event,type_even,structure_administrative where agent.id_agent=event.id_agent and event.id_type_even=type_even.id_type_even and event.id_hira=structure_administrative.id_hira and event.id_event=?");
                                                                        $reqh1->execute(array($value['id_event']));
                                                                        $elementh1=$reqh1->fetchall();
                                                                        foreach ($elementh1 as $elth1) {

                                                                            if ($elth1['dirige_agent']=='oui' && $elth1['id_type_hira']=='2')
                                                                                {
                                                                                    echo "Directeur de la ".$elth1['n_hira'];;
                                                                                }
                                                                                elseif ($elth1['dirige_agent']=='oui' && $elth1['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Directeur de la ".$elth1['n_hira'];
                                                                                }
                                                                                elseif ($elth1['dirige_agent']=='oui' && $elth1['id_type_hira']=='4') 
                                                                                {
                                                                                    echo "Chef du ".$elth1['n_hira'];
                                                                                }
                                                                                elseif ($elth1['assiste_agent']=='oui' && $elth1['id_type_hira']=='2') 
                                                                                {
                                                                                    echo "Secretaire de la ".$elth1['n_hira'];
                                                                                }
                                                                                elseif ($elth1['assiste_agent']=='oui' && $elth1['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Secretaire de la ".$elth1['n_hira'];
                                                                                }
                                                                                elseif ($elth1['assiste_agent']=='non' && $elth1['dirige_agent']=='non') 
                                                                                {
                                                                                    echo "Agent "."(".$elth1['n_hira'].")";
                                                                                }
                                                                        }

                                                                     ?>
                                                                </span>
                                                                <span style="display: <?php if ($_SESSION['poste']=='Agent') { echo 'none'; } ?>;">
                                                                     
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <?php if ($value['statut_event']=='annuler' || $value['statut_event']=='absent') {?>
                                                                <span class="tb-status text-<?php echo "danger"; ?>">
                                                                    <?php echo $value['statut_event']; ?>
                                                                </span>
                                                                <?php } ?>
                                                                <?php if ($value['statut_event']=='en attente') {?>
                                                                <span class="tb-status text-<?php echo "warning"; ?>">
                                                                    <?php echo $value['statut_event']; ?>
                                                                </span>
                                                                <?php } ?>
                                                                <?php if ($value['statut_event']=='recu') {?>
                                                                <span class="tb-status text-<?php echo "success"; ?>">
                                                                    <?php echo $value['statut_event']; ?>
                                                                </span>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1" >
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" href="#">
                                                                                <em class="icon ni ni-more-h">
                                                                                </em>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                <?php if ($value['id_hira']==$_SESSION['id_hira']) {?>
                                                                                    <?php if ($value['statut_event']!='annuler') {?>
                                                                                        <?php if (($value['start_event'] > date('Y-m-d')) || ($value['start_event'] == date('Y-m-d') && $value['heure_event'] < date('H:m:i'))) {?>
                                                                                    <li style="display: <?php if ($_SESSION['poste']=='Agent') { echo 'none'; } ?>;">
                                                                                        <a href="" class="text-primary" data-bs-target="#reportEventPopup<?php echo $value['id_event']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-edit">
                                                                                            </em>
                                                                                            <span>
                                                                                                Reporter
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                        <?php } ?>
                                                                                    <li style="display: <?php if ($_SESSION['poste']=='Agent') { echo 'none'; } ?>;">
                                                                                        <a href="" class="text-danger" data-bs-target="#deleteEventPopup<?php echo $value['id_event']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-trash">
                                                                                            </em>
                                                                                            <span>
                                                                                                Annuler
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                                    <li>
                                                                                        <a href="" class="text-warning" data-bs-target="#voirEventPopup<?php echo $value['id_event']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-user-list-fill">
                                                                                            </em>
                                                                                            <span>
                                                                                                Liste des convoquées
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($element_rdv1 as $key => $value) {?>
        <div class="modal fade" id="reportEventPopup<?php echo $value['id_event']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <form class="nk-modal py-4 form-validate" method="POST" action="update/event.php">
                            <h4 class="nk-modal-title">
                                <?php echo $value['libelle_type_even']." "; ?> est réporte au 
                            </h4>
                            <h4 class="nk-modal-title">
                                <div class="row g-gs">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input style="display: none;" type="text" name="id_event" value="<?php echo $value['id_event']; ?>">
                                            <div class="input-daterange date-picker-range input-group">
                                                <input data-date-format="yyyy-mm-dd" type="text" value="<?php echo $value['start_event']; ?>" autocomplete="off" class="form-control date-picker" name="start_event1" />
                                            <div class="input-group-addon">Au</div>
                                                <input data-date-format="yyyy-mm-dd" type="text" value="<?php echo $value['end_event']; ?>" autocomplete="off" class="form-control date-picker" name="end_event1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Heure Début</label> 
                                                <select class="form-control js-select2" name="heure_event1">
                                                    <option value="<?php echo $value['heure_event']; ?>" selected>
                                                        <?php echo $value['heure_event']; ?>
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
                                            <select class="form-control js-select2" name="fin_event1">
                                                <option value="<?php echo $value['end_event']; ?>"selected>
                                                <?php echo $value['fin_event']; ?>
                                                </option>
                                                <?php foreach ($elementh as $elth) {?>
                                                    <option value="<?php echo $elth['n_heure'] ?>">
                                                        <?php echo $elth['n_heure'] ?>
                                                    </option>
                                                <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                            </h4>
                            <input style="display:none;" name="id_event" value="<?php echo $value['id_event']; ?>" type="text" />
                            <div class="col-md-12" style="text-align: center; justify-content:center;">
                                <div class="form-group ">
                                    <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-primary" type="submit" name="btn_event">
                                        Mise à jour
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php foreach ($element_rdv1 as $key => $value) {?>
        <div class="modal fade" id="deleteEventPopup<?php echo $value['id_event']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal py-4">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger">
                            </em>
                            <h4 class="nk-modal-title">
                                Suppression ?
                            </h4>
                            <div class="nk-modal-text mt-n2">
                                <p class="text-soft">
                                    Voulez-vous vraiment supprimer cet événement ?.
                                </p>
                            </div>
                            <ul class="d-flex justify-content-center gx-4 mt-4">
                                <li>
                                    <a href="delete/event.php?id_event=<?php echo $value['id_event']; ?>" class="btn btn-success btn-dim">
                                        oui
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-danger btn-dim" data-bs-dismiss="modal">
                                        non
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php foreach ($element_rdv1 as $key => $value) {?>
        <div class="modal fade" id="voirEventPopup<?php echo $value['id_event']; ?>">
            <div class="modal-dialog "  role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Liste des personnes convoquées</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body text-center" style="height: 450px;" data-simplebar="">
                        <ul class="custom-control-group custom-control-vertical w-100 ">
                        <?php 
                        $req=$bdd->prepare("SELECT * FROM participe,agent,structure_administrative,type_hirachie WHERE id_event=? and agent.id_agent=participe.id_agent and structure_administrative.id_hira=agent.id_hira and structure_administrative.id_type_hira=type_hirachie.id_type_hira");
                        $req->execute(array($value['id_event']));
                        $nbre=$req->rowcount();
                        $element=$req->fetchall();
                        foreach ($element as $elt) { if ($nbre>='1') {?>   
                            <li class="">        
                                <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                    <!-- <input type="checkbox" class="custom-control-input" id="user-selection-s<?php echo $elt['id_agent']; ?>" name="agent_checkbox[]" value="<?php echo $elt['id_agent']; ?>">
                                    <label class="custom-control-label" for="user-selection-s<?php echo $elt['id_agent']; ?>"> -->
                                        <span class="user-card">                    
                                            <span class="user-avatar sq">                        
                                                <em class="icon ni ni-user-alt"></em>
                                            </span>
                                            <span class="user-info">
                                                <span class="lead-text"><?php echo $elt['np_agent']; ?></span>
                                                <span class="sub-text">
                                                    <?php if ($elt['dirige_agent']=='oui' && $elt['id_type_hira']=='2'){
                                                        echo 'Directeur';
                                                    }elseif ($elt['assiste_agent']=='oui' && $elt['id_type_hira']=='2') {
                                                        echo 'Secretaire du Directeur';
                                                    }
                                                    elseif ($elt['dirige_agent']=='oui' && $elt['id_type_hira']=='3') {
                                                        echo 'Sous-Directeur ';
                                                    }
                                                    elseif ($elt['assiste_agent']=='oui' && $elt['id_type_hira']=='3') {
                                                        echo 'Secretaire ';
                                                    }
                                                    elseif ($elt['dirige_agent']=='oui' && $elt['id_type_hira']=='4') {
                                                        echo 'Chef du '.$elt['n_hira'];
                                                    }
                                                    elseif ($elt['dirige_agent']=='non' && $elt['assiste_agent']=='non') {
                                                        echo 'Agent';
                                                    }  ?>
                                                    
                                                </span>
                                            </span>  
                                        </span>
                                    </label>
                                </div>
                            </li>
                        <?php }else { echo "Aucune Personne n'a été participe"; }} ?>
                        </ul>

                        
                    </div>
                     <!-- <div class="modal-footer bg-white">
                        <ul class="d-flex justify-content-center gx-4 mt-4">
                            <li>
                                <a href="delete/event.php?id_event=<?php echo $value['id_event']; ?>" class="btn btn-success btn-dim">
                                    Retirer
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-danger btn-dim" data-bs-dismiss="modal">
                                    non
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        <?php } ?>
        


        <script src="assets/js/bundle0226.js">
        </script>
        <script src="assets/js/scripts0226.js">
        </script>
        <script src="assets/js/demo-settings0226.js">
        </script>
        <!-- <script src="assets/js/libs/fullcalendar0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/apps/calendar0226.js?ver=3.1.2">
        </script> -->
        <script src='js/index.global.min.js'></script>

        <?php if(isset($_SESSION['notif_anu'])=='ok') {?>
            <script>
                    Swal.fire({
                        icon: "success",
                        title: "Succès"
                    })
                </script>
        <?php }  unset($_SESSION['notif_anu']); ?>

        <?php if(isset($_SESSION['date_modif'])=='ok') {?>
            <script>
                    Swal.fire({
                        icon: "success",
                        title: "Succès"
                    })
                </script>
        <?php }  unset($_SESSION['date_modif']); ?>

        <link href="notification/toastr.min.css" rel="stylesheet">
        <script src="notification/toastr.min.js"></script>
    </body>
</html>