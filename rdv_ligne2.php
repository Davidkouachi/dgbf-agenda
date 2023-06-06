<?php

session_start();
require_once("connexion_bd/connexion_bd.php");

$req_pres=$bdd->prepare("SELECT * FROM prestation,structure_administrative where prestation.id_hira=structure_administrative.id_hira and id_pres=?");
$req_pres->execute(array($_GET['id_pres']));
$element_pres=$req_pres->fetchall();

$etat='active';
$etat1='';
$disabled='';
$disabled1='disabled';
$date_error=''; 
$date_info=''; 

if (isset($_POST['btn_suivant'])) {

    if (date('Y-m-d') == $_POST['date']) {

        $heure=date('H:i:s');
        $req9=$bdd->prepare("SELECT * FROM prevue,heure,prestation where prevue.id_pres=prestation.id_pres and prevue.id_heure=heure.id_heure and prestation.id_pres=? and heure.n_heure>=? ORDER BY heure.n_heure ASC ");
        $req9->execute(array($_GET['id_pres'],$heure));
        $nbre9 =$req9->rowcount();
        $element9=$req9->fetchall();
 

        if ($nbre9=='0') {

            $date_info="il n'y a pas d'heure disponible a cette date";

        }else{
            $etat='';
            $etat1='active';
            $disabled='';
            $disabled1='';
        }

         
        
    }
    elseif(date('Y-m-d') < $_POST['date']){

        $req9=$bdd->prepare("SELECT * FROM prevue,heure,prestation where prevue.id_pres=prestation.id_pres and prevue.id_heure=heure.id_heure and prestation.id_pres=? ORDER BY heure.n_heure ASC");
        $req9->execute(array($_GET['id_pres']));
        $nbre9 =$req9->rowcount();
        $element9=$req9->fetchall();

        $etat='';
        $etat1='active';
        $disabled='';
        $disabled1='';
    }
    elseif(date('Y-m-d') > $_POST['date']){

        $date_error='Saisie une date valide';   
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
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-lg mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title fw-normal text-white">
                                                Prise de Rendez-Vous
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block nk-block-lg col-md-12">
                                            <a href="rdv_ligne.php" style="margin-bottom: 5px;" class="col-md-3 btn btn-dim btn-lg btn-warning" >
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                <span>Choisir une Prestation</span>
                                            </a>
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
                                                                    <div class="col-md-12" style="display: none;" >
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-full-name">
                                                                                Prestation
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input disabled="" class="form-control text-center" name="n_pres" type="text" value="<?php  foreach ($element_pres as $value) { echo $value['n_pres'];} ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: none;">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="fv-full-name">
                                                                                Service
                                                                            </label>
                                                                            <div class="form-control-wrap">
                                                                                <input disabled="" class="form-control text-center" name="d_pres" type="text" value="<?php  foreach ($element_pres as $value) { echo $value['n_hira'];} ?>"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                                                            <label style="color: skyblue;">
                                                                                <?php echo $date_info; ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="text-align: center; justify-content:center;">
                                                                        <div class="form-group ">
                                                                            <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_suivant">
                                                                                suivant
                                                                                <em style="margin-left: 5px;" class="icon ni ni-arrow-right-circle-fill"></em>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <div class="tab-pane <?php echo $etat1; ?>" id="thisyear">
                                                                <form class="row g-gs invest-ov gy-2" action="save/rdv.php" method="POST" >
                                                                    <div class="row g-gs">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-full-name">
                                                                                    Nom et Prénom
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input onkeyup="this.value=this.value.toUpperCase()" class="form-control" id="fv-full-name" name="np_usager" required="" type="text" placeholder="Entrer votre Nom et Prénom"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-full-name">
                                                                                    Adresse Mail
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input class="form-control" id="fv-full-name" name="email_usager" required="" type="text" placeholder="Entrer votre Email"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-subject">
                                                                                    Télèphone
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input class="form-control" id="fv-subject" name="tel_usager" required="" type="text" placeholder="Entrer votre Contact" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
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
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-topics">
                                                                                    Heure
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <select class="form-control js-select2" name="heure_rdv">
                                                                                     <optgroup label="Heure disponible">
                                                                                        <?php foreach ($element9 as $elt9) {
                                                                                        $req91=$bdd->prepare("SELECT * FROM rdv,prestation where rdv.id_pres=prestation.id_pres and rdv.id_pres=? and rdv.date_rdv=? and rdv.heure_rdv=?");
                                                                                        $req91->execute(array($elt9['id_pres'],$_POST['date'],$elt9['n_heure']));
                                                                                        $nbre91=$req91->rowcount();
                                                                                        $element91=$req91->fetchall();
                                                                                        if ($nbre91>='1') {}else{?>
                                                                                            <option value="<?php echo $elt9['n_heure']; ?>"><?php echo $elt9['n_heure']; ?>
                                                                                            </option>
                                                                                        <?php }} ?>
                                                                                    </optgroup> 

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-full-name">
                                                                                    Prestation
                                                                                </label>
                                                                                <div class="form-control-wrap">
                                                                                    <input style="display: none" class="form-control " name="motif_rdv" type="text" value="<?php  foreach ($element_pres as $value) { echo $value['n_pres'];} ?>" />
                                                                                    <input disabled="" class="form-control " type="text" value="<?php  foreach ($element_pres as $value) { echo $value['n_pres'];} ?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6" >
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="fv-topics">
                                                                                    Service
                                                                                </label>
                                                                                <div class="form-control-wrap ">
                                                                                    <input style="display: none" class="form-control " name="id_pres" type="text" value="<?php  echo $_GET['id_pres'] ?>" />
                                                                                    <input style="display: none" class="form-control " name="id_hira" type="text" value="<?php  foreach ($element_pres as $value) { echo $value['id_hira'];} ?>" />
                                                                                    <input disabled="" class="form-control " type="text" value="<?php  foreach ($element_pres as $value) { echo $value['n_hira'];} ?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12" style="text-align: center; justify-content:center;">
                                                                            <div class="form-group ">
                                                                                <button style="text-align: center; justify-content:center;" class="col-md-4 btn btn-dim btn-lg btn-success" type="submit" name="btn_rdv_ligne">
                                                                                    Valider
                                                                                    <em style="margin-left: 5px;" class="icon ni ni-check-circle"></em>
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


        <script src="assets/js/bundle0226.js">
        </script>
        <script src="assets/js/scripts0226.js">
        </script>
        <script src="assets/js/demo-settings0226.js">
        </script>

        <link href="notification/toastr.min.css" rel="stylesheet">
        <script src="notification/toastr.min.js"></script>

    </body>
    <!-- Mirrored from dashlite.net/demo8/components/forms/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:57 GMT -->
</html>