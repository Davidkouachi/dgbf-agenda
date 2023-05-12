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

    $req3=$bdd->prepare("SELECT * FROM heure ORDER BY n_heure ASC");
    $req3->execute(array());
    $element3=$req3->fetchall();

    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Chef de Service' || $_SESSION['poste']=='Secretaire' || $_SESSION['poste']=='Secretaire2') {
        $cache_agent='';

        $req_pres=$bdd->prepare("SELECT * FROM prestation,structure_administrative where structure_administrative.id_hira=prestation.id_hira and prestation.id_hira=? ");
        $req_pres->execute(array($_SESSION['id_hira']));
        $element_pres=$req_pres->fetchall();
        $nbre_pres =$req_pres->rowcount();

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
                                                Liste des Prestations
                                            </h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <marquee> 
                                                <h3 class="nk-block-title page-title" style="color:orange;">

                                                </h3>
                                            </marquee> 
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a class="btn btn-icon btn-primary btn-dim" href="rdv.php">
                                                <em class="icon ni ni-plus"></em>Nouvelle Prestation 
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
                                                            <th class="nk-tb-col nk-tb-col-check">
                                                                
                                                            </th>
                                                            <th class="nk-tb-col">
                                                                <span class="sub-text">
                                                                    Prestation
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end" >

                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($element_pres as $key => $value) {?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                <?php echo $key+1; ?>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                        <em class="icon ni ni-property"></em>
                                                                    </div>
                                                                    <div class="user-info ">
                                                                        <span class="tb-lead">
                                                                            <?php echo $value['n_pres']; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools" >
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" href="#">
                                                                                <em class="icon ni ni-more-h">
                                                                                </em>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li>
                                                                                        <a href="" class="text-primary" data-bs-target="#heureEventPopup<?php echo $value['id_pres']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-eye">
                                                                                            </em>
                                                                                            <span>
                                                                                                heures de receptions
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="" class="text-warning" data-bs-target="#docEventPopup<?php echo $value['id_pres']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-file">
                                                                                            </em>
                                                                                            <span>
                                                                                                Documents requis
                                                                                            </span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="" class="text-danger" data-bs-target="#deleteEventPopup<?php echo $value['id_pres']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-trash">
                                                                                            </em>
                                                                                            <span>
                                                                                                Supprimer
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

        <?php foreach ($element_pres as $key => $value) {?>
        <div class="modal fade" id="docEventPopup<?php echo $value['id_pres']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <form class="nk-modal py-4 form-validate" method="POST" action="update/pres.php">
                            <h4 class="nk-modal-title">
                                Document réquis 
                            </h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <textarea style="resize: none;" class="form-control" id="fv-full-name" name="d_pres" rows="10" ><?php echo $value['d_pres']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12" style="text-align: center; justify-content:center;">
                                <input style="display:none;" name="id_pres" value="<?php echo $value['id_pres']; ?>" type="text" />
                                <div class="form-group ">
                                    <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-primary" type="submit" name="btn_pres_doc">
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

        <?php foreach ($element_pres as $key => $value) {?>
        <div class="modal fade" id="heureEventPopup<?php echo $value['id_pres']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <form class="nk-modal py-4 form-validate" method="POST" action="update/pres.php">
                            <h4 class="nk-modal-title">
                                Heure de Receptions
                            </h4>
                            <h4 class="nk-modal-title">
                                <div class="row g-gs">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-control " style="height: 218px;" data-simplebar="">
                                                <ul class="custom-control-group custom-control-vertical w-100">
                                                    <?php  foreach ($element3 as $valueh) {?>
                                                    <li>
                                                        <div class="custom-control custom-control-sm custom-checkbox custom-control">
                                                            <input type="checkbox" 
                                                            <?php $req_pres1=$bdd->prepare("SELECT * FROM prestation,prevue,heure where prevue.id_pres=prestation.id_pres and prevue.id_heure=heure.id_heure and prestation.id_pres=? ");
                                                        $req_pres1->execute(array($value['id_pres']));
                                                        $element_pres1=$req_pres1->fetchall();
                                                        $nbre_pres1 =$req_pres1->rowcount();foreach ($element_pres1 as $elt_pres1) {  if ($elt_pres1['n_heure']==$valueh['n_heure']) { echo 'checked'; }} ?> class="custom-control-input" id="user-selection-<?php echo $valueh['id_heure']; ?>" name="heure_selection[]" value="<?php echo $valueh['id_heure']; ?>">
                                                            <label class="custom-control-label" for="user-selection-<?php echo $valueh['id_heure']; ?>">
                                                                <span class="user-info">
                                                                    <span class="lead-text"><?php echo $valueh['n_heure']; ?></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </h4>
                            <input style="display:none;" name="id_pres" value="<?php echo $value['id_pres']; ?>" type="text" />
                            <div class="col-md-12" style="text-align: center; justify-content:center;">
                                <div class="form-group ">
                                    <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-primary" type="submit" name="btn_pres_heure">
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

        <?php foreach ($element_pres as $key => $value) {?>
        <div class="modal fade" id="deleteEventPopup<?php echo $value['id_pres']; ?>">
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
                                    Voulez-vous vraiment supprimer cette Prestation ?.
                                </p>
                            </div>
                            <ul class="d-flex justify-content-center gx-4 mt-4">
                                <li>
                                    <a href="delete/pres.php?id_pres=<?php echo $value['id_pres']; ?>" class="btn btn-success btn-dim">
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
                    title: "Succès"
                })
            </script>
        <?php }  unset($_SESSION['notif_anu']); ?>

        <?php if(isset($_SESSION['notif_update'])=='ok') {?>
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Succès"
                })
            </script>
        <?php }  unset($_SESSION['notif_update']); ?>

        <?php if(isset($_SESSION['notif_update1'])=='ok') {?>
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Succès"
                })
            </script>
        <?php }  unset($_SESSION['notif_update1']); ?>

        <link href="notification/toastr.min.css" rel="stylesheet">
        <script src="notification/toastr.min.js"></script>
    </body>
</html>