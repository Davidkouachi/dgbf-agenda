<?php

session_start();
require_once("connexion_bd/connexion_bd.php");

if ($_POST['type_event']=='Rendez-Vous') {

    $req=$bdd->prepare("SELECT * FROM rdv,usager where usager.id_usager=rdv.id_usager and  id_rdv=? ");
    $req->execute(array($_POST['id_event']));
    $element=$req->fetchall();
}
if ($_POST['type_event']!='Rendez-Vous') {

    $req=$bdd->prepare("SELECT * FROM event,agent,type_even,structure_administrative where agent.id_hira=structure_administrative.id_hira and event.id_type_even=type_even.id_type_even and agent.id_agent=event.id_agent and event.id_event=? ");
    $req->execute(array($_POST['id_event']));
    $element=$req->fetchall();
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
                                Calendrier
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
    <body class="nk-body bg-lighter " >
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-between">
                                        <div class="nk-block-head-content ">
                                            <h3 class="nk-block-title page-title" style="text-align: center; color: white;">
                                                
                                            </h3>
                                            <a class="btn btn-primary btn-dim" href="calendrier_personnel.php">
                                                <em class="icon ni ni-arrow-left-circle-fill"></em>
                                                Retour
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-12">
                                            <div class="card-inner" style="background: white; border-radius: 5px;">
                                                <ul class="timeline-list">
                                                <?php if ($_POST['type_event']=='Rendez-Vous'){ foreach ($element as $elt) {?>
                                                    <h6 class="nk-block-title page-title text-center text-dark">
                                                        Rendez-Vous
                                                    </h6>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h4 class="timeline-title text-primary ">
                                                                Date et Heure:
                                                            </h4>
                                                            <h4 class="timeline-title text-primary ">
                                                                <?php echo $elt['date_rdv'].' à '.$elt['heure_rdv'] ?>
                                                            </h4>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h4 class="timeline-title text-primary ">
                                                                Demander par :
                                                            </h4>
                                                            <h4 class="timeline-title text-primary ">
                                                                <?php echo 'Nom : '.$elt['np_usager'] ?>
                                                            </h4>
                                                            <h2 class="timeline-title text-primary ">
                                                                <?php echo 'Email : '.$elt['email_usager'] ?>
                                                            </h2>
                                                            <h2 class="timeline-title text-primary ">
                                                                <?php echo 'Contact : '.$elt['tel_usager'] ?>
                                                            </h2>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-primary ">
                                                                Motif :
                                                            </h6>
                                                            <h6 class="timeline-title text-primary ">
                                                                <?php if ($elt['motif_rdv']=='') {
                                                                    $req1=$bdd->prepare("SELECT * FROM prestation where id_pres=? ");
                                                                    $req1->execute(array($elt['id_pres']));
                                                                    $element1=$req1->fetchall();
                                                                    foreach ($element1 as $elt1) {
                                                                        echo $elt1['n_pres'];
                                                                    }
                                                                } else{
                                                                        echo $elt['motif_rdv'];
                                                                    }
                                                                ?>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                <?php }} ?>

                                                <?php if ($_POST['type_event']!='Rendez-Vous'){ foreach ($element as $elt) { $start= new DateTime($elt['start_event']); $end= new DateTime($elt['end_event']);?>
                                                    <h6 class="nk-block-title page-title text-center text-dark">
                                                        <?php echo $elt['libelle_type_even']; ?>
                                                    </h6>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h4 class="timeline-title text-primary ">
                                                                Date et Heure:
                                                            </h4>
                                                            <h4 class="timeline-title ">
                                                                <?php if ($elt['start_event']==$elt['end_event']) {
                                                                    echo $start->format('d-m-Y').' de '.$elt['heure_event'].' à '.$elt['fin_event'];
                                                                }else{ echo 'Du '.$start->format('d-m-Y').' au '.$end->format('d-m-Y').' de '.$elt['heure_event'].' à '.$elt['fin_event']; }  ?>
                                                            </h4>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h4 class="timeline-title text-primary ">
                                                                Demander par :
                                                            </h4>
                                                            <h4 class="timeline-title ">

                                                                    <?php if ($elt['dirige_agent']=='oui' && $elt['id_type_hira']=='2')
                                                                                {
                                                                                    echo "Directeur de la ".$elt['n_hira'];;
                                                                                }
                                                                                elseif ($elt['dirige_agent']=='oui' && $elt['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Directeur de la ".$elt['n_hira'];
                                                                                }
                                                                                elseif ($elt['dirige_agent']=='oui' && $elt['id_type_hira']=='4') 
                                                                                {
                                                                                    echo "Chef du ".$elt['n_hira'];
                                                                                }
                                                                                elseif ($elt['assiste_agent']=='oui' && $elt['id_type_hira']=='2') 
                                                                                {
                                                                                    echo "Secretaire de la ".$elt['n_hira'];
                                                                                }
                                                                                elseif ($elt['assiste_agent']=='oui' && $elt['id_type_hira']=='3') 
                                                                                {
                                                                                    echo "Secretaire de la ".$elt['n_hira'];
                                                                                }
                                                                                elseif ($elt['assiste_agent']=='non' && $elt['dirige_agent']=='non') 
                                                                                {
                                                                                    echo "Agent "."(".$elt['n_hira'].")";
                                                                                }

                                                                     ?>
                                                            </h4>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-primary ">
                                                                Objet :
                                                            </h6>
                                                            <h6 class="timeline-title ">
                                                                <?php echo $elt['title_event']; ?>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-primary ">
                                                                Lieu :
                                                            </h6>
                                                            <h6 class="timeline-title ">
                                                                <?php echo $elt['lieu_event']; ?>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-primary ">
                                                                Ordre du jour :
                                                            </h6>
                                                            <h6 class="timeline-title ">
                                                                <?php echo $elt['ordre_event']; ?>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-primary ">
                                                                Informations supplémentaires :
                                                            </h6>
                                                            <h6 class="timeline-title ">
                                                                <?php echo $elt['description_event']; ?>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-primary ">
                                                                Participants :
                                                            </h6>
                                                            <h6 class="timeline-title ">
                                                                <ul class="timeline-list">
                                                                <?php $req1=$bdd->prepare("SELECT * FROM event,agent,participe where agent.id_agent=participe.id_agent and event.id_event=participe.id_event and participe.id_event=? ");
                                                                        $req1->execute(array($_POST['id_event']));
                                                                        $element1=$req1->fetchall();
                                                                        foreach ($element1 as $elt1) {?>
                                                                    <li class="timeline-item">
                                                                        <?php echo '- '.$elt1['np_agent'].'<br>'. $elt1['email_agent'] ?>
                                                                    </li>
                                                                <?php } ?>
                                                                 </ul>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                <?php }} ?>
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


        <script src="assets/js/bundle0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/scripts0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/demo-settings0226.js?ver=3.1.2">
        </script>
        <script src='js/index.global.min.js'></script>

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

        <link href="notification/toastr.min.css" rel="stylesheet">
        <script src="notification/toastr.min.js"></script>
    </body>
</html>