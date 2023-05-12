    <?php

    session_start();
    require_once("connexion_bd/connexion_bd.php");
    require_once("mise_a_jour_auto.php");

    if ($_SESSION['id_usager']=='0' || $_SESSION['id_usager']=='') {
        header('location:login/login_v1/cons.php');
    }


    $id_usager = $_SESSION['id_usager'];
    $req_usager=$bdd->prepare("SELECT * FROM usager where id_usager=? ");
    $req_usager->execute(array($id_usager));
    $element_usager=$req_usager->fetchall();
    foreach ($element_usager as $elt_usager) {

        $req_rdv=$bdd->prepare("SELECT * FROM usager,rdv,structure_administrative where structure_administrative.id_hira=rdv.id_hira and usager.id_usager=rdv.id_usager and  usager.email_usager=? ");
        $req_rdv->execute(array($elt_usager['email_usager']));
        $element_rdv=$req_rdv->fetchall();
        $nbre_rdv =$req_rdv->rowcount();


        $req_rdv1=$bdd->prepare("SELECT * FROM usager,rdv,structure_administrative where structure_administrative.id_hira=rdv.id_hira and usager.id_usager=rdv.id_usager and  usager.email_usager=? and rdv.statut_rdv='annuler'");
        $req_rdv1->execute(array($elt_usager['email_usager']));
        $element_rdv1=$req_rdv1->fetchall();
        $nbre_rdv1 =$req_rdv1->rowcount();


        $req_rdv2=$bdd->prepare("SELECT * FROM usager,rdv,structure_administrative where structure_administrative.id_hira=rdv.id_hira and usager.id_usager=rdv.id_usager and  usager.email_usager=? and rdv.statut_rdv='absent'");
        $req_rdv2->execute(array($elt_usager['email_usager']));
        $element_rdv2=$req_rdv2->fetchall();
        $nbre_rdv2 =$req_rdv2->rowcount();

        $req_rdv3=$bdd->prepare("SELECT * FROM usager,rdv,structure_administrative where structure_administrative.id_hira=rdv.id_hira and usager.id_usager=rdv.id_usager and  usager.email_usager=? and rdv.statut_rdv='recu'");
        $req_rdv3->execute(array($elt_usager['email_usager']));
        $element_rdv3=$req_rdv3->fetchall();
        $nbre_rdv3 =$req_rdv3->rowcount();

        $req_rdv4=$bdd->prepare("SELECT * FROM usager,rdv,structure_administrative where structure_administrative.id_hira=rdv.id_hira and usager.id_usager=rdv.id_usager and  usager.email_usager=? and rdv.date_rdv=?");
        $req_rdv4->execute(array($elt_usager['email_usager'],date('Y-m-d')));
        $element_rdv4=$req_rdv4->fetchall();
        $nbre_rdv4 =$req_rdv4->rowcount();

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
                                    <div class="nk-block">
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="card card-bordered card-full " style="background:#ffffff; color: white;">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class=" amount text-warning">
                                                                    Rendez-Vous
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount" >
                                                            <span class="title text-warning">
                                                                <?php echo $nbre_rdv; ?>
                                                            </span>
                                                        </div>
                                                        <br>
                                                        <div class="invest-data col-md-12" >
                                                            <div class="invest-data-amount g-2">
                                                                <div class="invest-data-history " style="border: 1px solid white; padding: 10px; border-radius: 15px; background:orange; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Aujourd'hui
                                                                    </div>
                                                                    <div class=" amount text-white">
                                                                        <?php echo $nbre_rdv4; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history " style="border: 1px solid white; padding: 10px; border-radius: 15px; background:orange; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Terminé
                                                                    </div>
                                                                    <div class=" amount text-white">
                                                                        <?php echo $nbre_rdv3; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history " style="border: 1px solid white; padding: 10px; border-radius: 15px; background:orange; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Absent
                                                                    </div>
                                                                    <div class=" amount text-white">
                                                                        <?php echo $nbre_rdv2; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="invest-data-history " style="border: 1px solid white; padding: 10px; border-radius: 15px; background:orange; text-align: center;">
                                                                    <div class="amount text-white">
                                                                        Annuler
                                                                    </div>
                                                                    <div class=" amount text-white">
                                                                        <?php echo $nbre_rdv1; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" >
                                                <div class="card card-bordered" style="height: auto;" data-simplebar="">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">
                                                                    Rendez-Vous
                                                                </h6>
                                                                <a class="btn btn-primary btn-dim" href="rdv_ligne_usager.php" style="margin-right: 10px; padding: 10px;">
                                                                    Prendre Rendez-Vous
                                                                    <em class="icon ni ni-arrow-right-circle-fill"></em>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
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
                                                                    Structure Administrative
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col">
                                                                <span class="sub-text">
                                                                    Date
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-mb">
                                                                <span class="sub-text">
                                                                    Heure
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-md">
                                                                <span class="sub-text">
                                                                    Motif
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-lg">
                                                                <span class="sub-text">
                                                                    Statut  
                                                                </span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-lg">
                                                                <span class="sub-text">
                                                                    
                                                                </span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        <?php foreach ($element_rdv as $key => $elt_rdv) {?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                <?php echo $key+1; ?>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <span>
                                                                    <?php echo $elt_rdv['n_hira']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $elt_rdv['date_rdv']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php echo $elt_rdv['heure_rdv']; ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>
                                                                    <?php 
                                                                        if($elt_rdv['motif_rdv']==''){
                                                                            $req_idpres=$bdd->prepare("SELECT * FROM prestation where id_pres=? ");
                                                                            $req_idpres->execute(array($elt_rdv['id_pres']));
                                                                            $element_idpres=$req_idpres->fetchall();
                                                                            foreach ($element_idpres as $val) {
                                                                                echo $val['n_pres'];
                                                                            }
                                                                        }else{
                                                                            echo $elt_rdv['motif_rdv'];
                                                                        } 
                                                                    ?>
                                                                </span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <?php if ($elt_rdv['statut_rdv']=='annuler' || $elt_rdv['statut_rdv']=='absent') {?>
                                                                <span class="tb-status text-<?php echo "danger"; ?>">
                                                                    <?php echo $elt_rdv['statut_rdv']; ?>
                                                                </span>
                                                                <?php } ?>
                                                                <?php if ($elt_rdv['statut_rdv']=='en attente') {?>
                                                                <span class="tb-status text-<?php echo "warning"; ?>">
                                                                    <?php echo $elt_rdv['statut_rdv']; ?>
                                                                </span>
                                                                <?php } ?>
                                                                <?php if ($elt_rdv['statut_rdv']=='recu') {?>
                                                                <span class="tb-status text-<?php echo "success"; ?>">
                                                                    <?php echo $elt_rdv['statut_rdv']; ?>
                                                                </span>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <?php if ($elt_rdv['statut_rdv']=='recu' || $elt_rdv['statut_rdv']=='annuler' || $elt_rdv['statut_rdv']=='absent' ){}else{?>
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
                                                                                        <a href="" class="text-danger" data-bs-target="#deleteEventPopup<?php echo $elt_rdv['id_rdv']; ?>" data-bs-toggle="modal">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

<?php foreach ($element_rdv as $key => $value) {?>
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
                                    <a href="delete/rdv_usager.php?id_rdv=<?php echo $value['id_rdv']; ?>" class="btn btn-success btn-dim">
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
            <script src="assets/js/charts/gd-invest0226.js?ver=3.1.2">
            </script>

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

            <?php if(isset($_SESSION['notif_anu'])=='ok') {?>
                <script>
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: "Rendez-Vous"
                    })
                </script>
            <?php }  unset($_SESSION['notif_anu']); ?>

            <link href="notification/toastr.min.css" rel="stylesheet">
            <script src="notification/toastr.min.js"></script>
        </body>
    </html>