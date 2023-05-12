<?php

session_start();
require_once("connexion_bd/connexion_bd.php");

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
                        <link href="images/favicon.png" rel="shortcut icon">
                            <title>
                                jQuery Validation - General | DashLite Admin Template
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
            <div class="nk-wrap ">
                <div class="nk"  >
                    <img style=" background-size: cover;" src="images/dgbf/banniere-min.jpg"></img>
                </div>
                <div class="nk" style="background:white; border-top: 1px solid #DEDEDE;" >
                    <div class="container-fluid" >
                        <div class="nk-header-wrap">
                            <div class="nk-header-menu ms-auto" data-content="headerNav">
                                <div class="nk-header-mobile">
                                    <div class="nk-header-brand">
                                        <a class="logo-link" href="index-2.html">
                                            <img alt="logo" class="logo-light logo-img" src="images/logo.png" srcset="/demo8/images/logo2x.png 2x">
                                                <img alt="logo-dark" class="logo-dark logo-img" src="images/logo-dark.png" srcset="/demo8/images/logo-dark2x.png 2x"/>
                                            </img>
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
                                        <a class="nk-menu-link" href="index.php">
                                            <span class="nk-menu-text">
                                                Tableau de bord
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a class="nk-menu-link " href="calendrier.php">
                                            <span class="nk-menu-text">
                                                Calendrier Général
                                            </span>
                                            <!-- <span class="badge badge-dot bg-primary">Primary</span> -->
                                        </a>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a class="nk-menu-link nk-menu-toggle" href="#">
                                            <span class="nk-menu-text">
                                                Nouvelle enregistrement
                                            </span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a href="event.php" class="nk-menu-link" >
                                                    <span class="nk-menu-text">
                                                         Ajouter un événement
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a class="nk-menu-link" href="type_event.php">
                                                    <span class="nk-menu-text">
                                                         Nouveau type d'événement
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a class="nk-menu-link" href="index-2.html">
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
                                                <a class="nk-menu-link" href="index-2.html">
                                                    <span class="nk-menu-text">
                                                        Listes des événements
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a class="nk-menu-link" href="index-2.html">
                                                    <span class="nk-menu-text">
                                                        Liste des Rendez-Vous
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a class="nk-menu-link nk-menu-toggle" href="#">
                                            <span class="nk-menu-text">
                                                Jour de réceptions
                                            </span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a class="nk-menu-link" href="index-2.html">
                                                    <span class="nk-menu-text">
                                                        Ajouter un nouveau jour
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a class="nk-menu-link" href="index-2.html">
                                                    <span class="nk-menu-text">
                                                        Liste des jours
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
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>
                                                            DK
                                                        </span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">
                                                            DAVID Kouachi
                                                        </span>
                                                        <span class="sub-text">
                                                            davidkouachi01@gmail.com
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="user-profile-regular.html">
                                                            <em class="icon ni ni-user-alt">
                                                            </em>
                                                            <span>
                                                                Voir profile
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="user-profile-setting.html">
                                                            <em class="icon ni ni-eye-alt">
                                                            </em>
                                                            <span>
                                                                Mot de passe oublié
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <form method="POST" class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="pages/auths/auth-login.php">
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
                                <div class="components-preview wide-lg mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title fw-normal">
                                                JOUR DE RECEPTION
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form action="save/direction_plus.php" method="POST" class="form-validate">
                                                    <div class="row g-gs" >
                                                        <div class="col-md-12" >
                                                            <div class="form-group " style="align-items:center; justify-content:center;" >
                                                                <ul class="custom-control-group custom-control-vertical" style="margin-left: 32%;" >
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                                                            <input type="checkbox" class="custom-control-input" id="user-selection-s" name="user-selection">
                                                                            <label class="custom-control-label" for="user-selection-s">
                                                                                <span style="margin-right: 55px;" class="user-card">
                                                                                    <span class="lead-text">Lundi</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                                <span style="margin-right: 15px; margin-left: 15px;" class="user-card">
                                                                                    <span class="lead-text">à</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                                                            <input type="checkbox" class="custom-control-input" id="user-selection-s1" name="user-selection">
                                                                            <label class="custom-control-label" for="user-selection-s1">
                                                                                <span style="margin-right: 50px;" class="user-card">
                                                                                    <span class="lead-text">Mardi</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                                <span style="margin-right: 15px; margin-left: 15px;" class="user-card">
                                                                                    <span class="lead-text">à</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                                                            <input type="checkbox" class="custom-control-input" id="user-selection-s2" name="user-selection">
                                                                            <label class="custom-control-label" for="user-selection-s2">
                                                                                <span style="margin-right: 30px;" class="user-card">
                                                                                    <span class="lead-text">Mercredi</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                                <span style="margin-right: 15px; margin-left: 15px;" class="user-card">
                                                                                    <span class="lead-text">à</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                                                            <input type="checkbox" class="custom-control-input" id="user-selection-s3" name="user-selection">
                                                                            <label class="custom-control-label" for="user-selection-s3">
                                                                                <span style="margin-right: 50px;" class="user-card">
                                                                                    <span class="lead-text">Jeudi</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                                <span style="margin-right: 15px; margin-left: 15px;" class="user-card">
                                                                                    <span class="lead-text">à</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                                                            <input type="checkbox" class="custom-control-input" id="user-selection-s4" name="user-selection">
                                                                            <label class="custom-control-label" for="user-selection-s4">
                                                                                <span style="margin-right: 30px;" class="user-card">
                                                                                    <span class="lead-text">Vendredi</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                                <span style="margin-right: 15px; margin-left: 15px;" class="user-card">
                                                                                    <span class="lead-text">à</span>
                                                                                </span>
                                                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_direction" required="" type="time"/>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="text-align: center; justify-content:center;">
                                                            <div class="form-group ">
                                                                <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_direction">
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
                        </div>
                    </div>
                </div>
                <div class="nk-footer bg-white">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright">
                                © 2022 Dashlite. Template by
                                <a href="https://softnio.com/" target="_blank">
                                    Softnio
                                </a>
                            </div>
                        </div>
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

        <?php if(isset($_SESSION['a_direction'])=='existe') {?>
            <script>
                toastr.error("Cette direction existe déjà"," ",
                    {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                    preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                    showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
        <?php }  unset($_SESSION['a_direction']); ?>

        <?php if(isset($_SESSION['notif'])=='ok') {?>
                <script>
                    toastr.success("Enregistrement éffectuée"," ",
                        {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                        preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                        showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
                </script>
            <?php }  unset($_SESSION['notif']); ?>

        <link href="notification/toastr.min.css" rel="stylesheet">
        <script src="notification/toastr.min.js"></script>

    </body>
    <!-- Mirrored from dashlite.net/demo8/components/forms/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:57 GMT -->
</html>