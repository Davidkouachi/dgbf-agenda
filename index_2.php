    <?php

    session_start();
    require_once("connexion_bd/connexion_bd.php");

    if ($_SESSION['id_agent']=='') {
        header('location:login/login_v1/index.php');
    }

    $cache_agent='';
    $cache_chef=''; 

    $id_agent = $_SESSION['id_agent'];
    $req_agent=$bdd->prepare("SELECT * FROM agent where id_agent=? ");
    $req_agent->execute(array($id_agent));
    $element_agent=$req_agent->fetchall();
    foreach ($element_agent as $elt_agent) {
        $_SESSION['admin']=$elt_agent['admin_agent'];
    }

    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Chef de Service' || $_SESSION['poste']=='Secretaire' || $_SESSION['poste']=='Secretaire2' ) { 
        $cache_agent='';

        $req_rdv1=$bdd->prepare("SELECT * FROM rdv where  rdv.id_hira=? " );
        $req_rdv1->execute(array($_SESSION['id_hira']));
        $element_rdv1=$req_rdv1->fetchall();
        $nbre_rdv1 =$req_rdv1->rowcount();
        foreach ($element_rdv1 as $key => $value) {

            if((date('Y-m-d')==$value['date_rdv'] && date('H:m:i')>$value['heure_rdv']) || (date('Y-m-d')>$value['date_rdv'])){
                $reqd=$bdd->prepare("UPDATE rdv SET statut_rdv='absent' WHERE id_rdv=?");
                $reqd->execute(array($value['id_rdv']));
                $element_rdvd=$reqd->fetchall();
            }

            $date=date('Y-m-d');
            $req_rdv2=$bdd->prepare("SELECT * FROM rdv,usager where rdv.id_usager=usager.id_usager and rdv.id_hira=? and rdv.date_rdv=? ORDER BY rdv.heure_rdv ASC");
            $req_rdv2->execute(array($_SESSION['id_hira'],$date));
            $element_rdv2=$req_rdv2->fetchall();
            $nbre_rdv2 =$req_rdv2->rowcount();

            $demain = date('Y-m-d', strtotime("+1 day"));
            $req_rdv_statut=$bdd->prepare("SELECT * FROM rdv where rdv.id_hira=? and rdv.date_rdv=? ");
            $req_rdv_statut->execute(array($_SESSION['id_hira'],$demain));
            $element_rdv_statut=$req_rdv_statut->fetchall();
            $nbre_rdv_statut =$req_rdv_statut->rowcount();

            $req_rdv_statut3=$bdd->prepare("SELECT * FROM rdv where rdv.id_hira=? and rdv.statut_rdv='recu' ");
            $req_rdv_statut3->execute(array($_SESSION['id_hira']));
            $element_rdv_statut3=$req_rdv_statut3->fetchall();
            $nbre_rdv_statut3 =$req_rdv_statut3->rowcount();

            $req_rdv_statut4=$bdd->prepare("SELECT * FROM rdv where rdv.id_hira=? and rdv.statut_rdv='annuler' ");
            $req_rdv_statut4->execute(array($_SESSION['id_hira']));
            $element_rdv_statut4=$req_rdv_statut4->fetchall();
            $nbre_rdv_statut4 =$req_rdv_statut4->rowcount();

        }

        $req_event=$bdd->prepare("SELECT * FROM event where id_hira=? ");
        $req_event->execute(array($_SESSION['id_hira']));
        $element_event=$req_event->fetchall();
        $nbre_event =$req_event->rowcount();
        foreach ($element_event as $elt_event) {

            $date=date('Y-m-d');
            $req_event2=$bdd->prepare("SELECT * FROM event,type_even where event.id_type_even=type_even.id_type_even and event.start_event<=? and event.end_event>=? and event.id_hira=? and event.id_hira=? ORDER BY event.heure_event ASC");
            $req_event2->execute(array($date,$date,$_SESSION['id_hira'],$_SESSION['id_hira']));
            $element_event2=$req_event2->fetchall();
            $nbre_event2=$req_event2->rowcount();

            $demain = date('Y-m-d', strtotime("+1 day"));
            $req_event3=$bdd->prepare("SELECT * FROM event where start_event<=? and end_event>=? and event.id_hira=? ");
            $req_event3->execute(array($demain,$demain,$_SESSION['id_hira']));
            $element_event3=$req_event3->fetchall();
            $nbre_event3=$req_event3->rowcount();

            $req_event4=$bdd->prepare("SELECT * FROM event where statut_event>='terminer' and event.id_hira=? ");
            $req_event4->execute(array($_SESSION['id_hira']));
            $element_event4=$req_event4->fetchall();
            $nbre_event4=$req_event4->rowcount();

            $req_event5=$bdd->prepare("SELECT * FROM event where statut_event>='annuler' and event.id_hira=? ");
            $req_event5->execute(array($_SESSION['id_hira']));
            $element_event5=$req_event5->fetchall();
            $nbre_event5=$req_event5->rowcount();

        }


    }
    
    if ($_SESSION['poste']=='Agent') {
       
        $req_event=$bdd->prepare("SELECT * FROM event where id_hira=? ");
        $req_event->execute(array($_SESSION['id_hira']));
        $element_event=$req_event->fetchall();
        $nbre_event =$req_event->rowcount();
        foreach ($element_event as $elt_event) {

            $date=date('Y-m-d');
            $req_event2=$bdd->prepare("SELECT * FROM event,type_even where event.id_type_even=type_even.id_type_even and event.start_event<=? and event.end_event>=? and event.id_hira=? and event.id_hira=? ORDER BY event.heure_event ASC");
            $req_event2->execute(array($date,$date,$_SESSION['id_hira'],$_SESSION['id_hira']));
            $element_event2=$req_event2->fetchall();
            $nbre_event2=$req_event2->rowcount();

            $demain = date('Y-m-d', strtotime("+1 day"));
            $req_event3=$bdd->prepare("SELECT * FROM event where start_event<=? and end_event>=? and event.id_hira=? ");
            $req_event3->execute(array($demain,$demain,$_SESSION['id_hira']));
            $element_event3=$req_event3->fetchall();
            $nbre_event3=$req_event3->rowcount();

            $req_event4=$bdd->prepare("SELECT * FROM event where statut_event>='terminer' and event.id_hira=? ");
            $req_event4->execute(array($_SESSION['id_hira']));
            $element_event4=$req_event4->fetchall();
            $nbre_event4=$req_event4->rowcount();

            $req_event5=$bdd->prepare("SELECT * FROM event where statut_event>='annuler' and event.id_hira=? ");
            $req_event5->execute(array($_SESSION['id_hira']));
            $element_event5=$req_event5->fetchall();
            $nbre_event5=$req_event5->rowcount();

        }

    }
    if ($_SESSION['poste']=='Chef de Service') {
        $cache_chef='none';
    }
    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Agent') {
        $cache_direc='none';
    }


    ?>
    <!DOCTYPE html>
    <html class="js" lang="zxx">
        
        <!-- Mirrored from dashlite.net/demo8/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:16:35 GMT -->
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
                                    Tableau de bord
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
                                                    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur'){
                                                        echo $cache_direc;
                                                    }
                                                ?>;">
                                            <a class="nk-menu-link nk-menu-toggle" href="#" style="display:
                                                <?php  
                                                    if ($_SESSION['poste']=='Agent'){
                                                        echo 'none';
                                                    }
                                                ?>;">
                                                <span class="nk-menu-text">
                                                    Nouvelle enregistrement
                                                </span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item has-sub">
                                                    <a class="nk-menu-link" href="event.php" >
                                                        <span class="nk-menu-text">
                                                            Planifier un événement
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
                                                        echo 'none';
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
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h6 class="nk-block-title page-title" style="color:white;">
                                                    <?php 
                                                        if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Secretaire')
                                                            {
                                                            echo $_SESSION['structure_direction'];
                                                        }
                                                        elseif($_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Secretaire2'){

                                                            echo $_SESSION['structure_sous_direction'];
                                                        }
                                                        elseif($_SESSION['poste']=='Chef de Service')
                                                            {
                                                            echo $_SESSION['structure_service'];
                                                        }
                                                    ?>
                                                </h6>
                                            </div>
                                            <div class="nk-block-head-content" style="display:
                                                <?php  
                                                    if ($_SESSION['admin']=='non'){
                                                        echo 'none';
                                                    }
                                                ?>;">
                                                <div  class="toggle-wrap nk-block-tools-toggle">
                                                    <a class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu" href="#">
                                                        <em class="icon ni ni-more-v">
                                                        </em>
                                                    </a>
                                                    <div class="toggle-expand-content" data-content="pageMenu">
                                                        <ul class="nk-block-tools g-3">
                                                            <li class="nk-block-tools-opt">
                                                                <div class="drodown">
                                                                    <a class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown" href="#">
                                                                        <em class="icon ni ni-plus">
                                                                        </em>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li>
                                                                                <a href="agent.php" >
                                                                                    <em class="icon ni ni-user-add-fill">
                                                                                    </em>
                                                                                    <span>
                                                                                        Ajouter un nouvel agent
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="directeur.php" >
                                                                                    <em class="icon ni ni-user-add-fill">
                                                                                    </em>
                                                                                    <span>
                                                                                        Ajouter un nouveau direceteur
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="secretaire_directeur.php" >
                                                                                    <em class="icon ni ni-user-add-fill">
                                                                                    </em>
                                                                                    <span>
                                                                                        Ajouter secretaire de direction
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="sous_directeur.php" >
                                                                                    <em class="icon ni ni-user-add-fill">
                                                                                    </em>
                                                                                    <span>
                                                                                        Ajouter un nouveau sous-direceteur
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="secretaire_sous_directeur.php" >
                                                                                    <em class="icon ni ni-user-add-fill">
                                                                                    </em>
                                                                                    <span>
                                                                                        Ajouter secretaire de sous-direction
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="liste_agent.php" >
                                                                                    <em class="icon ni ni-table-view">
                                                                                    </em>
                                                                                    <span>
                                                                                        Liste des agents
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="direction.php">
                                                                                    <em class="icon ni ni-plus-circle-fill">
                                                                                    </em>
                                                                                    <span>
                                                                                        Créer une Direction
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="sous_direction.php" >
                                                                                    <em class="icon ni ni-plus-circle-fill">
                                                                                    </em>
                                                                                    </em>
                                                                                    <span>
                                                                                        Créer une Sous-Direction
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="service.php" >
                                                                                    <em class="icon ni ni-plus-circle-fill">
                                                                                    </em>
                                                                                    <span>
                                                                                        Créer un Service
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="row g-gs">
                                            <div class="col-md-6" style="display:<?php if($_SESSION['poste']=='Agent'){echo "none";}  ?>">
                                                <div class="card card-bordered card-full " style="background:#ffffff; color: white;">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class=" amount text-dark">
                                                                    Rendez-Vous
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount" style="margin-bottom: -20px;">
                                                            <span class="title text-dark" style="font-size: 20px;">
                                                                <?php echo 'Totals : '.$nbre_rdv1; ?>
                                                            </span>
                                                        </div>
                                                        <hr>
                                                        <div class="invest-data">
                                                            <div class="invest-data-amount g-2">
                                                                <div class="invest-data-history  " style="border: 1px solid white; padding: 10px; border-radius: 15px; background:#ff6100; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Aujourd'hui
                                                                    </div>
                                                                    <div class=" amount text-white">
                                                                        <?php 
                                                                            if ($nbre_rdv1==0){echo '0';}
                                                                            else { echo $nbre_rdv2;}  
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history " style="border: 1px solid white; padding: 10px; border-radius: 15px; background:#ff6100; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Demain
                                                                    </div>
                                                                    <div class="amount text-white">
                                                                        <?php 
                                                                            if ($nbre_rdv1==0){echo '0';}
                                                                            else { echo $nbre_rdv_statut;}  
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history " style="border: 1px solid white; padding: 10px; border-radius: 15px; background:#ff6100; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Terminés
                                                                    </div>
                                                                    <div class="amount text-white">
                                                                        <?php 
                                                                            if ($nbre_rdv1==0){echo '0';}
                                                                            else { echo $nbre_rdv_statut3;}  
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history " style="border: 1px solid white; padding: 10px; border-radius: 15px; background:#ff6100; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Annulés
                                                                    </div>
                                                                    <div class="amount text-white">
                                                                        <?php 
                                                                            if ($nbre_rdv1==0){echo '0';}
                                                                            else { echo $nbre_rdv_statut4;}  
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-<?php if ($_SESSION['poste']=='Agent'){ echo '12'; }else{ echo '6'; } ?>">
                                                <div class="card card-bordered card-full " style="background:#ffffff; color: white;">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class=" amount text-dark">
                                                                    Evénements
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount" style="margin-bottom: -20px;">
                                                            <span class="subtitle text-dark" style="font-size: 20px;">
                                                                <?php echo 'Totals : '.$nbre_event;?>
                                                            </span>
                                                        </div>
                                                        <hr >
                                                        
                                                        <div class="invest-data " >
                                                            <div class="invest-data-amount g-2">
                                                                <div class="invest-data-history" style="border: 1px solid white; padding: 10px; border-radius: 15px; background:green; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Aujourd'hui
                                                                    </div>
                                                                    <div class=" amount text-white">
                                                                    <?php 
                                                                    if ($nbre_event==0){echo '0';}
                                                                    else { echo $nbre_event2;}  
                                                                ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history" style="border: 1px solid white; padding: 10px; border-radius: 15px; background:green; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Demain
                                                                    </div>
                                                                    <div class="amount text-white">
                                                                    <?php 
                                                                    if ($nbre_event==0){echo '0';}
                                                                    else { echo $nbre_event3;}  
                                                                ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history" style="border: 1px solid white; padding: 10px; border-radius: 15px; background:green; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Terminés
                                                                    </div>
                                                                    <div class="amount text-white">
                                                                    <?php 
                                                                    if ($nbre_event==0){echo '0';}
                                                                    else { echo $nbre_event4;}  
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history" style="border: 1px solid white; padding: 10px; border-radius: 15px; background:green; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Annulés
                                                                    </div>
                                                                    <div class="amount text-white">
                                                                    <?php 
                                                                    if ($nbre_event==0){echo '0';}
                                                                    else { echo $nbre_event5;}  
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display:<?php if($_SESSION['poste']=='Agent'){echo "none";}  ?>">
                                                <div class="card card-bordered" style="height: 500px;" data-simplebar="">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">
                                                                    Rendez-Vous Aujourd'hui 
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="timeline" >
                                                            <ul class="timeline-list">
                                                                <li >
                                                                    <div class="timeline-des">
                                                                        <p>
                                                                            <?php  
                                                                                if($nbre_rdv1=='0'){echo "Aucun Rendez-Vous aujourd'hui...";}
                                                                                elseif($nbre_rdv2=='0'){echo "Aucun Rendez-Vous aujourd'hui...";}
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <?php if ($nbre_rdv1=='0'){}else{
                                                                    foreach ($element_rdv2 as $key => $value2) {?>  
                                                                <li class="timeline-item">
                                                                    <div class="timeline-status bg-primary is-outline">
                                                                    </div>
                                                                    <div class="timeline-date">
                                                                        <?php echo $value2['heure_rdv']; ?>
                                                                        <em class="icon ni ni-alarm-alt">
                                                                        </em>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <h6 class="timeline-title">
                                                                            <?php echo $value2['np_usager']; ?>
                                                                        </h6>
                                                                        <div class="timeline-des">
                                                                            <p>
                                                                                <?php 
                                                                                   if($value2['motif_rdv']==''){
                                                                                        $req_idpres=$bdd->prepare("SELECT * FROM prestation where id_pres=? ");
                                                                                        $req_idpres->execute(array($value2['id_pres']));
                                                                                        $element_idpres=$req_idpres->fetchall();
                                                                                        foreach ($element_idpres as $val) {
                                                                                            echo $val['n_pres'];
                                                                                        }
                                                                                   }else{
                                                                                        echo $value2['motif_rdv'];
                                                                                   } 
                                                                                ?>
                                                                            </p>
                                                                            <?php if ($value2['statut_rdv']=='en attente') {?>
                                                                                <span class="tb-status text-<?php echo "danger"; ?>">
                                                                                    <em class="icon ni ni-minus-round-fill">
                                                                                    </em>
                                                                                    <?php echo $value2['statut_rdv']; ?>
                                                                                </span>
                                                                                <?php } ?>
                                                                                <?php if ($value2['statut_rdv']=='recu') {?>
                                                                                <span class="tb-status text-<?php echo "success"; ?>">
                                                                                    <em class="icon ni ni-check-circle-cut">
                                                                                            </em>
                                                                                    <?php echo $value2['statut_rdv']; ?>
                                                                                </span>
                                                                                <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php }}?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-<?php if ($_SESSION['poste']=='Agent'){ echo '12'; }else{ echo '6'; } ?>" >
                                                <div class="card card-bordered" style="height: 500px;" data-simplebar="">
                                                    <div class="card-inner border-bottom" >
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">
                                                                    Evénement Aujourd'hui 
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner" >
                                                        <div class="timeline" >
                                                            <ul class="timeline-list">
                                                                <li >
                                                                    <div class="timeline-des">
                                                                        <p>
                                                                            <?php 
                                                                                if ($nbre_event=='0'){echo "Aucun Evénement aujourd'hui...";}
                                                                                elseif($nbre_event2=='0'){echo "Aucun Evénement aujourd'hui...";}
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <?php if ($nbre_event=='0'){}else{
                                                                    foreach ($element_event2 as $key => $value2) {?>  
                                                                <li class="timeline-item">
                                                                    <div class="timeline-status bg-primary is-outline">
                                                                    </div>
                                                                    <div class="timeline-date">
                                                                        <?php echo $value2['heure_event'].' à '.$value2['fin_event']; ?>
                                                                        <em class="icon ni ni-alarm-alt">
                                                                        </em>
                                                                    </div>
                                                                    <div class="timeline-data">
                                                                        <h6 class="timeline-title">
                                                                            <?php echo $value2['libelle_type_even']; ?>
                                                                        </h6>
                                                                        <div class="timeline-des">
                                                                            <p>
                                                                                <?php echo $value2['title_event']; ?>
                                                                            </p>
                                                                                
                                                                            <?php if ($value2['color_event']=='orange') {?>
                                                                                <span class="tb-status text-<?php echo "warning"; ?>">
                                                                                    ( Important )
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if ($value2['color_event']=='green') {?>
                                                                                <span class="tb-status text-<?php echo "success"; ?>">
                                                                                   ( Standard )
                                                                                </span>
                                                                            <?php } ?>
                                                                            <?php if ($value2['color_event']=='red') {?>
                                                                                <span class="tb-status text-<?php echo "error"; ?>">
                                                                                    ( Urgent )
                                                                                </span>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php }}?>
                                                            </ul>
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

            <div class="modal fade" id="agentEventPopup">
                <div class="modal-dialog modal-md modal-dialog-top " role="document">
                    <div class="modal-content">
                        <div class="modal-header" id="preview-event-header">
                                <h5 class="modal-title">
                                    <em class="icon ni ni-user-add-fill"></em>
                                    Nouvel Agent
                                </h5>
                            <a aria-label="Close" class="close" data-bs-dismiss="modal" href="#">
                                <em class="icon ni ni-cross">
                                </em>
                            </a>
                        </div>
                        <div class="modal-body modal-body-md">
                            <form action="save/agent.php" method="POST" class="form-validate">
                                <div class="row g-gs">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">
                                                Nom et Prénom
                                            </label>
                                            <div class="form-control-wrap">
                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control" id="fv-full-name" name="np_agent" required="" type="text" placeholder="Entrer votre Nom et Prénom"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">
                                                Poste
                                            </label>
                                            <div class="form-control-wrap">
                                                <input onkeyup="this.value=this.value.toUpperCase()" class="form-control" id="fv-full-name" name="poste_agent" required="" type="text" placeholder="Entrer votre Poste actuel"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">
                                                Adresse Mail
                                            </label>
                                            <div class="form-control-wrap">
                                                <input class="form-control" id="fv-full-name" name="email_agent" required="" type="text" placeholder="Entrer votre Email"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-subject">
                                                Télèphone
                                            </label>
                                            <div class="form-control-wrap">
                                                <input class="form-control" id="fv-subject" name="tel_agent" required="" type="text" placeholder="Entrer votre Contact" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-subject">
                                                Matricule
                                            </label>
                                            <div class="form-control-wrap">
                                                <input class="form-control" id="fv-subject" name="matricule_agent" required="" type="text" placeholder="Entrer votre Matricule" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-subject">
                                                Mot de passe
                                            </label>
                                            <div class="form-control-wrap">
                                                <a class="form-icon form-icon-right passcode-switch lg" data-target="password" href="#" tabindex="-1">
                                                    <em class="passcode-icon icon-show icon ni ni-eye">
                                                    </em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off">
                                                    </em>
                                                </a>
                                                <input autocomplete="new-password" class="form-control form-control-lg" id="password" placeholder="Entrer votre mot de passe" required="" type="password" name="mdp_agent"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-topics">
                                                Autorisation
                                            </label>
                                            <div class="form-control-wrap ">
                                                <select class="form-select " name="autorisation_agent">
                                                    <option value="non">
                                                        NON
                                                    </option>
                                                    <option value="oui">
                                                        OUI
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-md-12" style="text-align: center; justify-content:center;">
                                        <div class="form-group ">
                                            <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_enregistrer_agent">
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

            <div class="modal fade" id="typePopup">
                <div class="modal-dialog modal-md modal-dialog-top" role="document">
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
                                        <input onkeyup="this.value=this.value.toUpperCase()" autocomplete="off" class="form-control form-control-lg" id="email-address" placeholder="Entrer un type d'événement" required="" type="text" name="libelle_type_even" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="btn_enreg_type_event" class="btn btn-lg btn-success btn-dim btn-block">
                                        Enregistrer
                                    </button>
                            </form>
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
            <script src="assets/js/charts/gd-invest0226.js?ver=3.1.2">
            </script>

            <?php if(isset($_SESSION['notif'])=='ok') {?>
                <script>
                    toastr.success("Enregistrement éffectuée"," ",
                        {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                        preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                        showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
                </script>
            <?php }  unset($_SESSION['notif']); ?>

            <?php if(isset($_SESSION['erreur_admin'])=='non') {?>
                <script>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Connexion Réussi",
                        showConfirmButton: !1,
                        timer: 1000
                    })
                </script>
            <?php }  unset($_SESSION['erreur_admin']); ?>

            <?php if(isset($_SESSION['libelle_type_even'])=='existe') {?>
                <script>
                    toastr.error("Ce type d'événement existe déjà"," ",
                        {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                        preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                        showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
                </script>
            <?php }  unset($_SESSION['libelle_type_even']); ?>

            <?php if(isset($_SESSION['agent'])=='existe') {?>
                <script>
                    toastr.error("Cet agent existe déjà"," ",
                        {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                        preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                        showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
                </script>
            <?php }  unset($_SESSION['agent']); ?>

            <link href="notification/toastr.min.css" rel="stylesheet">
            <script src="notification/toastr.min.js"></script>
        </body>
    </html>