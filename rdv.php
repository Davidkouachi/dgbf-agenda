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


if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';
    }

$etat='active';
$etat1='';
$disabled='';
$disabled1='disabled';
$date_error=''; 

if (isset($_POST['btn_suivant1'])) {

    if (date('Y-m-d') == $_POST['date']) {

        $req9=$bdd->prepare("SELECT * FROM heure where n_heure>?  ORDER BY n_heure ASC ");
        $req9->execute(array(date('H:m:i')));
        $nbre9 =$req9->rowcount();
        $element9=$req9->fetchall();  

        $etat='';
        $etat1='active';
        $disabled='';
        $disabled1='';

        

    }
    elseif(date('Y-m-d') < $_POST['date']){

        $req9=$bdd->prepare("SELECT * FROM heure ORDER BY n_heure ASC ");
        $req9->execute(array());
        $nbre9 =$req9->rowcount();
        $element9=$req9->fetchall();  

        $etat='';
        $etat1='active';
        $disabled='';
        $disabled1='';
    }
    elseif(date('Y-m-d') > $_POST['date']){

        $date_error='Saisie un date valide';  
    }
    
    
      
}

/*$time=date('12:00:00');
echo $time."   ".date("H:i:s", strtotime('+10 minutes',strtotime($time)));*/
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
                                Nouveau Rendez-Vous
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
                                            <a class="nk-menu-link " href="#" style="display:
                                                <?php
                                                    if ($_SESSION['poste']!='Directeur' || $_SESSION['poste']!='Sous-Directeur' || $_SESSION['poste']=='Secretaire' || $_SESSION['poste']=='Secretaire2') {
                                                        echo 'none';
                                                    }
                                                ?>;">
                                                <span class="nk-menu-text">
                                                    Prendre Rendez-Vous
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
                                                <li class="nk-menu-item">
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
                                                NOUVEAU RENDEZ-VOUS
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block nk-block-lg col-md-12">
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
                                                        <div class="tab-content mt-0">
                                                            <div class="tab-pane <?php echo $etat; ?>" id="overview">
                                                                <form class="row g-gs invest-ov gy-2" action="" method="POST"  >
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-full-name">
                                                                                Date
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input autocomplete="off"  data-date-format="yyyy-mm-dd" placeholder="Selectionner une date" class="form-control text-center date-picker" name="date" required="" type="text" />
                                                                            </div>
                                                                            <label style="color: red;">
                                                                                <?php echo $date_error; ?>
                                                                            </label>
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

                                                            <div class="tab-pane <?php echo $etat1; ?>" id="thisyear">
                                                                <form class="row g-gs invest-ov gy-2" action="save/rdv.php" method="POST" enctype="multipart/form-data" >
                                                                    <div class="row g-gs">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-full-name">
                                                                                    Nom et Prénom
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input onkeyup="this.value=this.value.toUpperCase()" class="form-control" id="fv-full-name" name="np_usager" required="" type="text" placeholder="Entrer votre Nom et Prénom"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-full-name">
                                                                                    Adresse Mail
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input class="form-control" id="fv-full-name" name="email_usager" required="" type="text" placeholder="Entrer votre Email"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-subject">
                                                                                    Télèphone
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input class="form-control" id="fv-subject" name="tel_usager" required="" type="text" placeholder="Entrer votre Contact" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-full-name">
                                                                                    Date
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input style="display: none;" class="form-control " name="date_rdv" type="date" value="<?php echo $_POST['date'] ?>" />
                                                                                    <input disabled class="form-control text-center date-picker" type="date" value="<?php echo $_POST['date'] ?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-topics">
                                                                                    Heure
                                                                                </label>
                                                                                 <div class="form-control-wrap">
                                                                                    <select class="form-control js-select2" name="heure_rdv">
                                                                                     <optgroup label="Heure disponible">
                                                                                        <?php foreach ($element9 as $elt9) {?>
                                                                                            <option value="<?php echo $elt9['n_heure'] ?>"><?php echo $elt9['n_heure'] ?>
                                                                                            </option>
                                                                                        <?php } ?>
                                                                                    </optgroup> 

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-full-name">
                                                                                    Motif
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input class="form-control " name="motif_rdv" type="text" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12" style="display: none;">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-topics">
                                                                                    Agent
                                                                                </label>
                                                                                <div class="form-control-wrap ">
                                                                                    <input class="form-control " name="id_hira" type="text" value="<?php echo $_SESSION['id_hira']; ?>"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12" style="text-align: center; justify-content:center;">
                                                                            <div class="form-group ">
                                                                                <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_rdv">
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
                </div>
            </div>
        </div>


        <script src="assets/js/bundle0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/scripts0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/demo-settings0226.js?ver=3.1.2">
        </script>

        <?php if(isset($_SESSION['notif'])=='ok') {?>
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "Succès"
                    })
                </script>
            <?php }  unset($_SESSION['notif']); ?>

        <link href="notification/toastr.min.css" rel="stylesheet">
        <script src="notification/toastr.min.js"></script>

    </body>
    <!-- Mirrored from dashlite.net/demo8/components/forms/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:57 GMT -->
</html>