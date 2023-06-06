    <?php

session_start();
require_once("connexion_bd/connexion_bd.php");

if ($_SESSION['id_agent']=='') {
        header('location:login/login_v1/index.php');
    }

$req_rdv1=$bdd->prepare("SELECT * FROM rdv,usager where rdv.id_usager=usager.id_usager and rdv.id_hira=? ");
$req_rdv1->execute(array($_SESSION['id_hira']));
$element_rdv1=$req_rdv1->fetchall();
$nbre_rdv1 =$req_rdv1->rowcount();
foreach ($element_rdv1 as $elt_rdv1) {
    if(date('Y-m-d')==$elt_rdv1['date_rdv'] && date('H:m:i')>$elt_rdv1['heure_rdv']){
        $reqd=$bdd->prepare("UPDATE rdv SET statut_rdv='absent' WHERE id_rdv=?");
        $reqd->execute(array($elt_rdv1['id_rdv']));
        $element_rdvd=$reqd->fetchall();
    }
}

$cache_agent='';

    $id_agent = $_SESSION['id_agent'];
    $req_agent=$bdd->prepare("SELECT * FROM agent where id_agent=? ");
    $req_agent->execute(array($id_agent));
    $element_agent=$req_agent->fetchall();

$req_type_even=$bdd->prepare("SELECT * FROM type_even ");
$req_type_even->execute(array());
$element_type_even=$req_type_even->fetchall();

$id_agent = $_SESSION['id_agent'];
    $req_agent=$bdd->prepare("SELECT * FROM agent where id_agent=? ");
    $req_agent->execute(array($id_agent));
    $element_agent=$req_agent->fetchall();
    foreach ($element_agent as $elt_agent) {
        $_SESSION['id_hira']=$elt_agent['id_hira'];
    }

    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Chef de Service' || $_SESSION['poste']=='Secretaire' || $_SESSION['poste']=='Secretaire2') {
        $cache_agent='';

        $req_rdv1=$bdd->prepare("SELECT * FROM rdv,usager where rdv.id_usager=usager.id_usager and rdv.id_hira=? ");
        $req_rdv1->execute(array($_SESSION['id_hira']));
        $element_rdv1=$req_rdv1->fetchall();
        $nbre_rdv1 =$req_rdv1->rowcount();
        foreach ($element_rdv1 as $elt_rdv1) {
            if(date('Y-m-d')==$elt_rdv1['date_rdv'] && date('H:m:i')>$elt_rdv1['heure_rdv']){
                $reqd=$bdd->prepare("UPDATE rdv SET statut_rdv='absent' WHERE id_rdv=?");
                $reqd->execute(array($elt_rdv1['id_rdv']));
                $element_rdvd=$reqd->fetchall();
            }
        }

        $req_event=$bdd->prepare("SELECT * FROM event; ");
        $req_event->execute(array());
        $element_event=$req_event->fetchall();
        $nbre_event =$req_event->rowcount();


    }
    if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';
    }

if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';
    }
    
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
                                Liste des Rendez-Vous
                            </title>
                            <link href="assets/css/dashlite0226.css?ver=3.1.2" rel="stylesheet">
                                <link href="assets/css/theme0226.css?ver=3.1.2" id="skin-default" rel="stylesheet">
                                    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4">
                                    </script>
                                    <script>
                                        var $ = require('jquery');
                                        var DataTable = require('datatables.net')(window, $);
                                        var languageDE = require('datatables.net-plugins/i18n/de-DE.js');
                                         
                                        var table = new DataTable('#datatable', {
                                            language: languageDE,
                                        });
                                    </script>
                                </link>
                            </link>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body class="nk-body bg-lighter " >
        <div class="nk-app-root">
            <div class="nk-wrap " style="background-image: url('images/dgbf/bat 4.png'); background-position: button; background-size: cover; ">
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
                                        <li class="nk-menu-item has-sub" 
                                            style="display:
                                                <?php  
                                                    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur'){
                                                        echo $cache_direc;
                                                    }
                                                ?>;">
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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-between">
                                        <div class="nk-block-head-content ">
                                            <h3 class="nk-block-title page-title" style="text-align: center; color: white;">
                                                Liste des Rendez-Vous
                                            </h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <marquee> 
                                                <h3 class="nk-block-title page-title" style="color:orange;">

                                                </h3>
                                            </marquee> 
                                        </div>
                                        <div class="nk-block-head-content" style="display: <?php if ($_SESSION['poste']=='Chef de Service') { echo "none";  } ?>; " >
                                            <a class="btn btn-icon btn-primary btn-dim" href="rdv.php">
                                                <em class="icon ni ni-plus"></em>Planifier un Rendez-Vous 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table id="datatable" class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col nk-tb-col-check">                                                      </th>
                                                            <th class="nk-tb-col">
                                                                <span class="sub-text">
                                                                    Usager
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-mb">
                                                                <span class="sub-text">
                                                                    Contact
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md">
                                                                <span class="sub-text">
                                                                    Date
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md">
                                                                <span class="sub-text">
                                                                    Heure
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-lg">
                                                                <span class="sub-text">
                                                                    Motif
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md">
                                                                <span class="sub-text">
                                                                    Status
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end" >
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($element_rdv1 as $key => $value) { $start= new DateTime($value['date_rdv'])?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                <?php echo $key+1; ?>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                        <em class="icon ni ni-user-alt"></em>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <span class="tb-lead">
                                                                            <?php echo $value['np_usager']; ?>
                                                                            <span class="dot dot-success d-md-none ms-1">
                                                                            </span>
                                                                        </span>
                                                                        <span>
                                                                            <?php echo $value['email_usager']; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $value['tel_usager']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $start->format('d-m-Y'); ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $value['heure_rdv']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php 
                                                                        if($value['motif_rdv']==''){
                                                                            $req_idpres=$bdd->prepare("SELECT * FROM prestation where id_pres=? ");
                                                                            $req_idpres->execute(array($value['id_pres']));
                                                                            $element_idpres=$req_idpres->fetchall();
                                                                            foreach ($element_idpres as $val) {
                                                                                echo $val['n_pres'];
                                                                            }
                                                                        }else{
                                                                            echo $value['motif_rdv'];
                                                                        } 
                                                                    ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <?php if ($value['statut_rdv']=='annuler' || $value['statut_rdv']=='absent') {?>
                                                                <span class="tb-status text-<?php echo "danger"; ?>">
                                                                    <?php echo $value['statut_rdv']; ?>
                                                                </span>
                                                                <?php } ?>
                                                                <?php if ($value['statut_rdv']=='en attente') {?>
                                                                <span class="tb-status text-<?php echo "warning"; ?>">
                                                                    <?php echo $value['statut_rdv']; ?>
                                                                </span>
                                                                <?php } ?>
                                                                <?php if ($value['statut_rdv']=='recu') {?>
                                                                <span class="tb-status text-<?php echo "success"; ?>">
                                                                    <?php echo $value['statut_rdv']; ?>
                                                                </span>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools" >
                                                                <?php if ($value['statut_rdv']=='recu' || $value['statut_rdv']=='annuler' || $value['statut_rdv']=='absent' ){}else{?>
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" href="#">
                                                                                <em class="icon ni ni-more-h">
                                                                                </em>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <?php if ($value['date_rdv']==date('Y-m-d')){?>
                                                                                    <li>
                                                                                        <a href="update/recu_rdv.php?id_rdv=<?php echo $value['id_rdv']; ?>" class="text-success" >
                                                                                            <em class="icon ni ni ni-forward-alt-fill">
                                                                                            </em>
                                                                                            <span>
                                                                                                Recu
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <?php }?>
                                                                                    <li>
                                                                                        <a href="" class="text-primary" data-bs-target="#reportEventPopup<?php echo $value['id_rdv']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-edit">
                                                                                            </em>
                                                                                            <span>
                                                                                                Reporter
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="" class="text-danger" data-bs-target="#deleteEventPopup<?php echo $value['id_rdv']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-trash">
                                                                                            </em>
                                                                                            <span>
                                                                                                Annuler
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php } ?>
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
        <div class="modal fade" id="reportEventPopup<?php echo $value['id_rdv']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <form class="nk-modal py-4 form-validate" method="POST" action="update/rdv.php">
                            <h4 class="nk-modal-title">
                                Rendez-Vous Prévu 
                            </h4>
                            <h4 class="nk-modal-title">
                                pour le <?php echo $value['date_rdv']."  à  ".$value['heure_rdv']; ?> 
                            </h4>
                            <h4 class="nk-modal-title">
                                est réporte au  
                            </h4>
                            <h4 class="nk-modal-title">
                                <div class="row g-gs">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control" id="fv-full-name" name="date_rdv1" required="" type="date" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <h4 class="nk-modal-title">
                                                    à 
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select name="heure_rdv1" required="" class="form-control js-select2">
                                                    <?php 
                                                        if($value['id_pres']==''){$req_h=$bdd->prepare("SELECT * FROM heure ORDER BY heure.n_heure ASC ");
                                                        $req_h->execute(array());
                                                        $element_h=$req_h->fetchall();
                                                        foreach ($element_h as $valueh){?>
                                                    <option value="<?php echo $valueh['n_heure'] ?>">
                                                        <?php echo $valueh['n_heure'] ?>
                                                    </option>
                                                    <?php }}else{$req_h=$bdd->prepare("SELECT * FROM heure,prestation,prevue where prevue.id_pres=prestation.id_pres and prevue.id_heure=heure.id_heure and prestation.id_pres=? ORDER BY heure.n_heure ASC ");
                                                        $req_h->execute(array($value['id_pres']));
                                                        $element_h=$req_h->fetchall();
                                                        foreach ($element_h as $valueh){ ?>
                                                        <option value="<?php echo $valueh['n_heure'] ?>">
                                                            <?php echo $valueh['n_heure'] ?>
                                                        </option>
                                                        <?php }}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </h4>
                            <input style="display:none;" name="id_rdv" value="<?php echo $value['id_rdv']; ?>" type="text" />
                            <div class="col-md-12" style="text-align: center; justify-content:center;">
                                <div class="form-group ">
                                    <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_rdv">
                                        Enregistrer
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
        <div class="modal fade" id="deleteEventPopup<?php echo $value['id_rdv']; ?>">
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
                                    Voulez-vous vraiment supprimer cet rendez-vous ?.
                                </p>
                            </div>
                            <ul class="d-flex justify-content-center gx-4 mt-4">
                                <li>
                                    <a href="delete/rdv.php?id_rdv=<?php echo $value['id_rdv']; ?>" class="btn btn-success btn-dim">
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
                    title: "Rendez-Vous Annuler"
                })
            </script>
        <?php }  unset($_SESSION['notif_anu']); ?>

        <?php if(isset($_SESSION['date_inva'])=='ok') {?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Date Invalide"
                })
            </script>
        <?php }  unset($_SESSION['date_inva']); ?>

        <?php if(isset($_SESSION['date_modif'])=='ok') {?>
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Rendez-Vous Reporter"
                })
            </script>
        <?php }  unset($_SESSION['date_modif']); ?>

        <link href="notification/toastr.min.css" rel="stylesheet">
        <script src="notification/toastr.min.js"></script>
    </body>
</html>