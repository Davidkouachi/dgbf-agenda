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

$req_type_even=$bdd->prepare("SELECT * FROM type_even ");
$req_type_even->execute(array());
$element_type_even=$req_type_even->fetchall();

if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';
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
                                Nouveau Type d'évenement
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
                                            <a class="nk-menu-link " href="calendrier.php">
                                                <span class="nk-menu-text">
                                                    Calendrier Général
                                                </span>
                                            </a>
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
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link" href="type_event.php" >
                                                        <span class="nk-menu-text">
                                                            Nouveau type d'événement
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
                                                <li class="nk-menu-item">
                                                    <a class="nk-menu-link" href="liste_rdv.php">
                                                        <span class="nk-menu-text">
                                                            Liste des Rendez-Vous
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
                                                            <span class="sub-text">
                                                                <?php echo $_SESSION['poste']; ?>
                                                            </span>
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
                                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                    <div class="user-card">
                                                        <div class="user-avatar sm">
                                                        <em class="icon ni ni-user-alt">
                                                        </em>
                                                    </div>
                                                    <div class="user-info">
                                                        <?php foreach($element_agent as $elt_agent) {?>
                                                            <span class="sub-text">
                                                                <?php echo $_SESSION['poste']; ?>
                                                            </span>
                                                            <span class="lead-text">
                                                                <?php echo $elt_agent['np_agent']; ?>
                                                            </span>
                                                            <span class="sub-text">
                                                                <?php echo $elt_agent['email_agent']; ?>
                                                            </span>
                                                        <?php } ?>
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
                                                                    Voir profil
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
                                <div class="components-preview wide-lg mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title fw-normal text-white">
                                                NOUVEL ENREGISTREMENT
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form action="save/event.php" method="POST" class="form-validate">
                                                    <div class="row g-gs">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label text-center" for="fv-full-name">
                                                                    Type d'événement
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <input class="form-control text-center" id="fv-full-name" name="title_event" required="" type="text"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="text-align: center; justify-content:center;">
                                                            <div class="form-group ">
                                                                <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_enregistrer">
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
                        <div class="col-md-12" >
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
                                </div>
                            </form>
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

        <?php if(isset($_SESSION['libelle_type_even'])=='existe') {?>
            <script>
                toastr.error("Ce type d'événement existe déjà"," ",
                    {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                    preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                    showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
        <?php }  unset($_SESSION['libelle_type_even']); ?>

        <?php if(isset($_SESSION['libelle_type_evenp'])=='existep') {?>
            <script>
                toastr.success("Enregistrement éffectuée"," ",
                    {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                    preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                    showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
        <?php }  unset($_SESSION['libelle_type_evenp']); ?>

        <?php if(isset($_SESSION['eventp'])=="existep" ) {?>
            <script>
                toastr.success("Enregistrement éffectuée"," ",
                    {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                    preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                    showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
        <?php } unset($_SESSION['eventp']);  ?>

        <link href="notification/toastr.min.css" rel="stylesheet">
        <script src="notification/toastr.min.js"></script>

    </body>
    <!-- Mirrored from dashlite.net/demo8/components/forms/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:57 GMT -->
</html>