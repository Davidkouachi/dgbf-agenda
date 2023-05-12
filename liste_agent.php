<?php

session_start();
require_once("connexion_bd/connexion_bd.php");

if ($_SESSION['id_agent']=='') {
        header('location:pages/auths/auth-login.php');
    }

$cache_agent='';

    $id_agent = $_SESSION['id_agent'];
    $req_agent=$bdd->prepare("SELECT * FROM agent where id_agent=? ");
    $req_agent->execute(array($id_agent));
    $element_agent=$req_agent->fetchall();
    foreach ($element_agent as $elt_agent) {
        $_SESSION['id_hira']=$elt_agent['id_hira'];
    }


    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Chef de Service') {
        $cache_agent='';

        $req_rdv1=$bdd->prepare("SELECT * FROM agent,structure_administrative where agent.id_hira=structure_administrative.id_hira ");
        $req_rdv1->execute(array());
        $element_rdv1=$req_rdv1->fetchall();
        $nbre_rdv1 =$req_rdv1->rowcount();

    }
    if ($_SESSION['poste']=='Secretaire') {
        $cache_agent='';

        $req_rdv1=$bdd->prepare("SELECT * FROM agent,structure_administrative where agent.id_hira=structure_administrative.id_hira ");
        $req_rdv1->execute(array());
        $element_rdv1=$req_rdv1->fetchall();
        $nbre_rdv1 =$req_rdv1->rowcount();
    }
    if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';
    }

/*$date=date('Y-m-d');
$req_eventd=$bdd->prepare("SELECT * FROM event WHERE start_event <= $date and end_event >= $date ");
$req_eventd->execute(array($date));
$nbre_eventd =$req_eventd->rowcount();
$element_eventd=$req_eventd->fetchall();*/

if ($_SESSION['poste']=='Agent') {
        $cache_agent='none';
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
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-between">
                                        <div class="nk-block-head-content ">
                                            <h3 class="nk-block-title page-title" style="text-align: center; color: white;">
                                                Liste des Agents
                                            </h3>
                                            <a class="btn btn-primary btn-dim" href="index_2.php">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                Retour
                                            </a>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <marquee> 
                                                <h3 class="nk-block-title page-title" style="color:orange;">

                                                </h3>
                                            </marquee> 
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
                                                                    Nom et Prénoms
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col">
                                                                <span class="sub-text">
                                                                    Adresse E-mail
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
                                                            <th class="nk-tb-col tb-col-lg">
                                                                <span class="sub-text">
                                                                    Direction   
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-lg">
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
                                                            <td class="nk-tb-col">
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
                                                                        <!-- <span>
                                                                            
                                                                        </span> -->
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $value['email_agent']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $value['tel_agent']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php 
                                                                    if ($value['dirige_agent']=='oui' && $value['id_type_hira']=='2')
                                                                    {
                                                                        echo "Directeur";
                                                                    }
                                                                    elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='3') 
                                                                    {
                                                                        echo "Sous-Directeur ";
                                                                    }
                                                                    elseif ($value['dirige_agent']=='oui' && $value['id_type_hira']=='4') 
                                                                    {
                                                                        echo "Chef de Service";
                                                                    }
                                                                    elseif ($value['assiste_agent']=='oui' && $value['id_type_hira']=='2' || $value['id_type_hira']=='3') 
                                                                    {
                                                                        echo "Secretaire";
                                                                    }
                                                                    elseif ($value['assiste_agent']=='non' && $value['dirige_agent']=='non') 
                                                                    {
                                                                        echo "Agent";
                                                                    }

                                                                    ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php 
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
                                                                    ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
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
                                                                                        <a href="" class="text-danger" data-bs-target="#deleteEventPopup<?php echo $value['id_agent']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-trash">
                                                                                            </em>
                                                                                            <span>
                                                                                                Licencié
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
        <div class="modal fade" id="deleteEventPopup<?php echo $value['id_agent']; ?>">
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
                                    <a href="delete/agent.php?id_agent=<?php echo $value['id_agent']; ?>" class="btn btn-success btn-dim">
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

        <script src="assets/js/bundle0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/scripts0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/demo-settings0226.js?ver=3.1.2">
        </script>
        <!-- <script src="assets/js/libs/fullcalendar0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/apps/calendar0226.js?ver=3.1.2">
        </script> -->
        <script src='js/index.global.min.js'></script>

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
</html>