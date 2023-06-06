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


$req1=$bdd->prepare("SELECT * FROM structure_administrative where id_type_hira='2' ");
$req1->execute(array());
$element1=$req1->fetchall();

$etat='active';
$etat1='';
$disabled='';
$disabled1='disabled';

if (isset($_POST['btn_suivant1'])) {

    $id_hira=$_POST['id_hira'];
    $req=$bdd->prepare("SELECT * FROM structure_administrative where id_parent=?");
    $req->execute(array($id_hira));
    $element=$req->fetchall();

    $etat='';
    $etat1='active';
    $disabled='';
    $disabled1='';
      
}

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
                                Nouveau Sous-Directeur
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
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-lg mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title fw-normal text-white">
                                                NOUVEAU SOUS-DIRECTEUR
                                            </h2>
                                            <a class="btn btn-primary btn-dim" href="index_2.php">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                Retour
                                            </a>
                                        </div>
                                    </div>
                                    <div class="nk-block nk-block-lg col-md-12">
                                                <div class="card card-bordered card-full">
                                                    <div class="card-inner">
                                                        <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                                            <li class="nav-item">
                                                                <a <?php echo $disabled; ?> class="nav-link <?php echo $etat; ?>" data-bs-toggle="tab" href="#overview">
                                                                    Etape 1
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a <?php echo $disabled1; ?> class="nav-link <?php echo $etat1; ?>" data-bs-toggle="tab" href="#thisyear">
                                                                    Etape 2
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content mt-0">
                                                            <div class="tab-pane <?php echo $etat; ?>" id="overview">
                                                                <form class="row g-gs invest-ov gy-2" action="" method="POST"  >
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-topics">
                                                                            Choisir Direction
                                                                        </label>
                                                                        <div class="form-control-wrap ">
                                                                            <select class="form-select js-select2" id="direction_select" name="id_hira" required="">
                                                                                <option value=" " selected>
                                                                                    --- Sélectionner une direction ---
                                                                                </option>
                                                                                <?php foreach ($element1 as $elt1) {?>
                                                                                    <option value="<?php echo $elt1['id_hira']; ?>">
                                                                                        <?php echo $elt1['n_hira']; ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
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
                                                                <form class="row g-gs invest-ov gy-2" action="save/direction_plus.php" method="POST"  >
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-topics">
                                                                            Choisir une sous-direction
                                                                        </label>
                                                                        <div class="form-control-wrap ">
                                                                            <select class="form-select js-select2" name="id_hira" required="">
                                                                                <option value=" " selected>
                                                                                    --- Sélectionner une sous-direction ---
                                                                                </option>
                                                                                <?php   
                                                                                    foreach ($element as $elt) {?>
                                                                                    <option value="<?php echo $elt['id_hira']; ?>">
                                                                                        <?php echo $elt['n_hira']; ?>
                                                                                    </option>
                                                                                <?php }?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                                            Adresse Mail
                                                                        </label>
                                                                        <div class="form-control-wrap">
                                                                            <input class="form-control" id="fv-full-name" name="email_agent" required="" type="text" placeholder="Entrer votre Email"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="fv-subject">
                                                                            Télèphone
                                                                        </label>
                                                                        <div class="form-control-wrap">
                                                                            <input class="form-control" id="fv-subject" name="tel_agent" required="" type="text" placeholder="Entrer votre Contact" />
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
                                                                <div class="col-md-12" style="text-align: center; justify-content:center;">
                                                                    <div class="form-group ">
                                                                        <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_sous_directeur">
                                                                            Enregistrer
                                                                        </button>
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


        <script src="assets/js/bundle0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/scripts0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/demo-settings0226.js?ver=3.1.2">
        </script>

        <?php if(isset($_SESSION['agent'])=='existe') {?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Cette Sous-Direction a déja un Directeur"
                })
            </script>
        <?php }  unset($_SESSION['agent']); ?>

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