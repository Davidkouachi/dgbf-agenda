<?php

session_start();
require_once("connexion_bd/connexion_bd.php");

$req_pres=$bdd->prepare("SELECT * FROM prestation,structure_administrative where prestation.id_hira=structure_administrative.id_hira");
$req_pres->execute(array());
$element_pres=$req_pres->fetchall();

$id_usager = $_SESSION['id_usager'];
    $req_usager=$bdd->prepare("SELECT * FROM usager where id_usager=? ");
    $req_usager->execute(array($id_usager));
    $element_usager=$req_usager->fetchall();



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
                                Prise de Rendez-Vous
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
    <body class="nk-body bg-lighter ">
        <div class="nk-app-root">
            <div class="nk-wrap " style="background-image: url('images/dgbf/bat 4.png'); background-position: button; background-size: cover; ">
                <div class="nk"  >
                    <img style=" background-size: cover;" src="images/dgbf/banniere-min.jpg"></img>
                </div>
                <div class="nk" style="background:white; border-top: 1px solid #DEDEDE;" >
                    <div class="container-fluid" >
                        <div class="nk-header-wrap">
                            <div class="nk-header-menu ms-auto" data-content="headerNav">
                                <div class="nk-header-mobile">
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
                                                
                                            </span>
                                        </a>
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
                                                        <?php foreach($element_usager as $elt_usager) {?>
                                                            <span class="lead-text">
                                                                <?php echo $elt_usager['np_usager']; ?>
                                                            </span>
                                                            <span class="sub-text">
                                                                <?php echo $elt_usager['email_usager']; ?>
                                                            </span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1 is-light">
                                                <form method="POST" class="dropdown-inner">
                                                    <ul class="link-list">
                                                        <li>
                                                            <a href="deconnexion_usager.php">
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
                                                Prise de Rendez-Vous
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block nk-block-lg col-md-12">
                                            <a href="index_usager.php" style="margin-bottom: 5px;" class="col-md-2 btn btn-dim btn-lg btn-danger text-center" >
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                <span>Tableau de Bord</span>
                                            </a>
                                                <div class="card card-bordered card-full">
                                                    <div class="card-inner">
                                                        <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-bs-toggle="tab" href="#overview0">
                                                                    Choix de la Prestation
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content mt-0">
                                                            <div class="tab-pane active" id="overview0">
                                                                <form class="row g-gs invest-ov gy-2" action="" method="POST"  >
                                                                    <table id="datatable" class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                                        <thead>
                                                                            <tr class="nk-tb-item nk-tb-head" style="background: green;">
                                                                                <th class="nk-tb-col col-4">
                                                                                    <span class="sub-text text-white">
                                                                                        Prestations
                                                                                    </span>
                                                                                </th>
                                                                                <th class="nk-tb-col">
                                                                                    <span class="sub-text text-white">
                                                                                        Service en Charge
                                                                                    </span>
                                                                                </th>
                                                                                <th class="nk-tb-col">
                                                                                    <span class="sub-text text-white">
                                                                                        Direction
                                                                                    </span>
                                                                                </th>
                                                                                <th class="nk-tb-col">
                                                                                    <span class="sub-text text-white">
                                                                                        
                                                                                    </span>
                                                                                </th>
                                                                                <th class="nk-tb-col">
                                                                                    
                                                                                </th>
                                                                                <th class="nk-tb-col">
                                                                                    
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($element_pres as $elt_pres){?>
                                                                            <tr class="nk-tb-item" style="font-size: 13px;">
                                                                                <td class="nk-tb-col tb-col-md">
                                                                                    <span>
                                                                                        <?php echo $elt_pres['n_pres']; ?>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="nk-tb-col tb-col-md">
                                                                                    <span>
                                                                                        <?php echo $elt_pres['n_hira']; ?>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="nk-tb-col tb-col-md">
                                                                                    <span>
                                                                                        <?php 
                                                                                            $req_pres1=$bdd->prepare("SELECT * FROM structure_administrative where id_hira=?");
                                                                                            $req_pres1->execute(array($elt_pres['id_parent']));
                                                                                            $element_pres1=$req_pres1->fetchall();
                                                                                            foreach($element_pres1 as $elt_pres1){
                                                                                                $req_pres2=$bdd->prepare("SELECT * FROM structure_administrative where id_hira=?");
                                                                                                $req_pres2->execute(array($elt_pres1['id_parent']));
                                                                                                $element_pres2=$req_pres2->fetchall();
                                                                                                foreach ($element_pres2 as $elt_pres2) {
                                                                                                    echo $elt_pres2['n_hira'];
                                                                                                }
                                                                                            } ?>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="nk-tb-col tb-col-md">
                                                                                    <span>
                                                                                    <?php echo $elt_pres['etage_hira']." Etage, ".$elt_pres['porte_hira']." Porte"; ?>
                                                                                        <!-- <?php 
                                                                                            $req_pres1=$bdd->prepare("SELECT * FROM structure_administrative where id_hira=?");
                                                                                            $req_pres1->execute(array($elt_pres['id_parent']));
                                                                                            $element_pres1=$req_pres1->fetchall();
                                                                                            foreach($element_pres1 as $elt_pres1){
                                                                                                    echo $elt_pres1['n_hira'];
                                                                                            } 
                                                                                        ?> -->
                                                                                    </span>
                                                                                </td>
                                                                                <td class="nk-tb-col tb-col-md">
                                                                                    <span>
                                                                                        <a href="rdv_ligne2_usager.php?id_pres=<?php echo $elt_pres['id_pres']; ?>" class="btn btn-success btn-dim" >
                                                                                            <em class="icon ni ni-arrow-right-circle-fill"></em>
                                                                                            <span>Suivant</span>
                                                                                        </a>
                                                                                    </span>
                                                                                </td>
                                                                                <td class="nk-tb-col tb-col-md">
                                                                                    <span>
                                                                                        <input name="id_hira" type="text" style="display: none;" value="<?php echo $elt_pres['id_hira']; ?>" />
                                                                                        <input name="id_pres0" type="text" style="display: none;" value="<?php echo $elt_pres['id_pres']; ?>"/>
                                                                                        <a href="" class="btn btn-primary btn-dim" data-bs-target="#reportEventPopup<?php echo $elt_pres['id_pres']; ?>" data-bs-toggle="modal">
                                                                                            <em class="icon ni ni-blank"></em>
                                                                                             <span>Document Réquis</span>
                                                                                        </a>
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
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

        <?php foreach ($element_pres as $key => $value) {?>
        <div class="modal fade" id="reportEventPopup<?php echo $value['id_pres']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <form class="nk-modal py-4 form-validate" method="" action="">
                            <h4 class="nk-modal-title">
                                Document réquis 
                            </h4>
                            <h6 class="nk-modal-title">
                                <div class="row g-gs">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <?php echo $value['d_pres']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </h6>
                        </form>
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