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
                                Nouvelle Direction
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
                                                NOUVELLE DIRECTION
                                            </h2>
                                            <a class="btn btn-primary btn-dim" href="index_2.php">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                Retour
                                            </a>
                                        </div>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form action="save/direction_plus.php" method="POST" class="form-validate">
                                                    <div class="row g-gs">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label text-center" for="fv-full-name">
                                                                    Nom de la Direction
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <input autocomplete="off" onkeyup="this.value=this.value.toUpperCase()" class="form-control text-center" id="fv-full-name" name="n_hira" required="" type="text"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label text-center" for="fv-full-name">
                                                                    Fax
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <input autocomplete="off" class="form-control text-center" id="fv-full-name" name="fax_hira" required="" type="text"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label text-center" for="fv-full-name">
                                                                    Contact
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <input autocomplete="off" class="form-control text-center" id="fv-full-name" name="tel_hira" required="" type="number"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label text-center" for="fv-full-name">
                                                                    Email
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <input autocomplete="off" class="form-control text-center" id="fv-full-name" name="email_hira" required="" type="text"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label text-center" for="fv-full-name">
                                                                    Etage
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control js-select2" name="etage_hira">
                                                                        <option value=" " selected>--- Sélectionner un etage ---</option>
                                                                        <option value="1"> 1 Etage</option>
                                                                        <option value="2"> 2 Etage</option>
                                                                        <option value="3"> 3 Etage</option>
                                                                        <option value="4"> 4 Etage</option>
                                                                        <option value="5"> 5 Etage</option>
                                                                        <option value="6"> 6 Etage</option>
                                                                        <option value="7"> 7 Etage</option>
                                                                        <option value="8"> 8 Etage</option>
                                                                        <option value="9"> 9 Etage</option>
                                                                        <option value="10"> 10 Etage</option>
                                                                        <option value="11"> 11 Etage</option>
                                                                        <option value="12"> 12 Etage</option>
                                                                        <option value="13"> 13 Etage</option>
                                                                        <option value="14"> 14 Etage</option>
                                                                        <option value="15"> 15 Etage</option>
                                                                        <option value="16"> 16 Etage</option>
                                                                        <option value="17"> 17 Etage</option>
                                                                        <option value="18"> 18 Etage</option>
                                                                        <option value="19"> 19 Etage</option>
                                                                        <option value="20"> 20 Etage</option>
                                                                        <option value="21"> 21 Etage</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label text-center" for="fv-full-name">
                                                                    Porte
                                                                </label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-control js-select2" name="porte_hira">
                                                                        <option value=" " selected>--- Sélectionner une porte ---</option>
                                                                        <option value="1"> 1 Porte</option>
                                                                        <option value="2"> 2 Porte</option>
                                                                        <option value="3"> 3 Porte</option>
                                                                        <option value="4"> 4 Porte</option>
                                                                        <option value="5"> 5 Porte</option>
                                                                        <option value="6"> 6 Porte</option>
                                                                        <option value="7"> 7 Porte</option>
                                                                        <option value="8"> 8 Porte</option>
                                                                        <option value="9"> 9 Porte</option>
                                                                        <option value="10"> 10 Porte</option>
                                                                        <option value="11"> 11 Porte</option>
                                                                        <option value="12"> 12 Porte</option>
                                                                    </select>
                                                                </div>
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
            </div>
        </div>


        <script src="assets/js/bundle0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/scripts0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/demo-settings0226.js?ver=3.1.2">
        </script>

        <?php if(isset($_SESSION['notife'])=='existe') {?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Cette direction existe déjà"
                })
            </script>
        <?php }  unset($_SESSION['notife']); ?>

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