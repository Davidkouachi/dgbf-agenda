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

    if ($_SESSION['poste']=='Directeur' || $_SESSION['poste']=='Secretaire') {
        $cache_agent='';

        $req_event=$bdd->prepare("SELECT * FROM event,type_even,structure_administrative,agent where agent.id_agent=event.id_agent and structure_administrative.id_hira=event.id_hira and event.id_type_even=type_even.id_type_even and structure_administrative.id_hira=? UNION SELECT * FROM event,type_even,structure_administrative,agent where agent.id_agent=event.id_agent and structure_administrative.id_hira=event.id_hira and event.id_type_even=type_even.id_type_even and structure_administrative.id_parent=? UNION SELECT * FROM event,type_even,structure_administrative,agent WHERE agent.id_agent=event.id_agent and structure_administrative.id_hira=event.id_hira and event.id_type_even=type_even.id_type_even and structure_administrative.id_parent in (SELECT id_hira FROM structure_administrative WHERE structure_administrative.id_parent=? ) ");
        $req_event->execute(array($_SESSION['id_hira'],$_SESSION['id_hira'],$_SESSION['id_hira']));
        $element_event=$req_event->fetchall();
        $nbre_event =$req_event->rowcount();

    }
    if ($_SESSION['poste']=='Sous-Directeur' || $_SESSION['poste']=='Secretaire2' || $_SESSION['poste']=='Chef de Service' || $_SESSION['poste']=='Agent') {
        $cache_agent='';

        $req_event=$bdd->prepare("SELECT * FROM event,type_even,structure_administrative,agent where agent.id_agent=event.id_agent and structure_administrative.id_hira=event.id_hira and event.id_type_even=type_even.id_type_even and structure_administrative.id_hira=? UNION SELECT * FROM event,type_even,structure_administrative,agent where agent.id_agent=event.id_agent and structure_administrative.id_hira=event.id_hira and event.id_type_even=type_even.id_type_even and structure_administrative.id_parent=? UNION SELECT * FROM event,type_even,structure_administrative,agent WHERE agent.id_agent=event.id_agent and structure_administrative.id_hira=event.id_hira and event.id_type_even=type_even.id_type_even and structure_administrative.id_parent in (SELECT id_hira FROM structure_administrative WHERE structure_administrative.id_parent=? ) ");
        $req_event->execute(array($_SESSION['id_direction'],$_SESSION['id_direction'],$_SESSION['id_direction']));
        $element_event=$req_event->fetchall();
        $nbre_event =$req_event->rowcount();

    }

if ($_SESSION['poste']=='Agent') {
    $cache_agent='none';
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
                                                    if ($_SESSION['poste']=='Agent') {
                                                        echo $cache_agent;
                                                    }
                                                ?>;">
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
                                    <div class="nk-between">
                                        <div class="nk-block-head-content ">
                                            <h3 class="nk-block-title page-title" style="text-align: center; color: white;">
                                                CALENDRIER GENERAL
                                            </h3>
                                        </div>
                                        <!-- <div class="nk-block-head-content">
                                            <marquee> 
                                                <h3 class="nk-block-title page-title" style="color:orange;">
                                                </h3>
                                            </marquee> 
                                        </div> -->
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-2">
                                            <div class="card-inner" style="background: white; border-radius: 10px;">
                                                <ul class="timeline-list">
                                                    <h3 class="nk-block-title page-title text-center text-dark">
                                                        Légende:
                                                    </h3>
                                                    <br>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-primary">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-primary ">
                                                                Rendez-Vous
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-danger">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-danger">
                                                                Urgent
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-warning">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-warning">
                                                                Important
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item">
                                                        <div class="timeline-status bg-success">
                                                        </div>
                                                        <div class="timeline-data">
                                                            <h6 class="timeline-title text-success">
                                                                standard
                                                            </h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="card card-bordered">
                                                <div class="card-inner">
                                                    <div class="nk-calendar" id="calendar">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form style="display:none;" action="calendrier_param.php" method="POST" accept-charset="utf-8">
                                            <input  type="text" name="id_event" id="event-id">
                                            <input  type="text" name="type_event" id="event-type">
                                            <button id="view-btn" class="btn btn-primary" type="submit" name="btn_plus"> Voir Plus </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .popover-header{
                color: white;
                background: #939393;
            }
            .popover{
                z-index: 1;
            }
            #calendar {
  max-width: auto;
  margin: 0 auto;
}

/* Style de l'en-tête du calendrier */
.fc-toolbar {
  margin-bottom: -50px;
}

/* Style des boutons de navigation du calendrier */
.fc-button {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 6px 12px;
  margin-right: 10px;
  cursor: pointer;
}

.fc-button:hover {
  background-color: #0056b3;
}

/* Style des liens dans l'en-tête du calendrier */
.fc-toolbar a {
  color: #007bff;
}

.fc-toolbar a:hover {
  text-decoration: none;
}

/* Style des titres des mois et des jours de la semaine */
.fc-header-title h2 {
  font-size: 24px;
  margin: 0;
}

.fc-day-header {
  font-size: 14px;
  font-weight: bold;
}

/* Style des cellules de jour */
.fc-day {
  min-height: 80px;
}

/* Style des événements */
.fc-event {
  padding: 4px 8px;
  border: none;
  cursor: pointer;
}

.fc-event:hover {
  background-color: ;
}

/* Style des info-bulles des événements */
.fc-event-tooltip {
  position: absolute;
  z-index: 9999;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 6px;
  font-size: 14px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style du fond d'écran lors du défilement du calendrier */
.fc-scroller {
  background-color: #f5f5f5;
}

/* Style des boutons "aujourd'hui" et "précédent/suivant" */
.fc-today-button,
.fc-prev-button,
.fc-next-button {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 6px 12px;
  margin-right: 10px;
  cursor: pointer;
}

.fc-today-button:hover,
.fc-prev-button:hover,
.fc-next-button:hover {
  background-color: #0056b3;
}

/* Style de l'événement en cours dans le calendrier */
.fc-highlight {
  background-color: rgba(0, 123, 255, 0.3);
  border: none;
}

/* Style de l'événement en cours lors du survol */
.fc-highlight:hover {
  background-color: rgba(0, 123, 255, 0.5);
}

/* Style des événements dans le mois précédent ou suivant */
.fc-other-month .fc-event,
.fc-other-month .fc-day-number {
  opacity: 0.3;
}
        </style>


        <script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale:'fr',
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: "title" ,
                center: "today dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                right: "prev,next" ,
            },
            editable: false,
            eventLimit: true, 
            selectable: true,
            selectHelper: true,
            height: 700,
            contentHeight: 780,
            aspectRatio: 3,
            droppable: !0,
            views: {
                dayGridMonth: {
                    dayMaxEventRows: 2
                }
            },
            events: [
                <?php if ($nbre_event=='0') { }else { foreach($element_event as $elt_event){ $start= new DateTime($elt_event['start_event']); $end= new DateTime($elt_event['end_event']); if ($elt_event['start_event']==$elt_event['end_event']) {?>
                    {   id     : '<?php echo $elt_event['id_event']; ?>',
                        title  : '<?php echo $elt_event['libelle_type_even']; ?>',
                        start  : '<?php echo $elt_event['start_event']." ".$elt_event['heure_event']; ?>',
                        description : '<?php echo "De ".$elt_event['heure_event']." à ".$elt_event['fin_event'].". Orgainser par ".$elt_event['np_agent']; ?>',
                        color  : '<?php echo $elt_event['color_event']; ?>' },
                <?php }else{?>
                    {   id     : '<?php echo $elt_event['id_event']; ?>',
                        title  : '<?php echo $elt_event['libelle_type_even']; ?>',
                        start  : '<?php echo $elt_event['start_event']." ".$elt_event['heure_event']; ?>',
                        end    : '<?php echo $elt_event['end_event']." ".$elt_event['fin_event']; ?>',
                        description : '<?php echo "Du ".$start->format('d-m-Y')." au ".$end->format('d-m-Y')." de ".$elt_event['heure_event']." à ".$elt_event['fin_event'].". Orgainser par ".$elt_event['np_agent']; ?>',
                        color  : '<?php echo $elt_event['color_event']; ?>' },
                <?php } } }?>
                
            ],
            eventClick: function (info) {
                document.getElementById("event-id").value = info.event.id;
                document.getElementById("event-type").value = info.event.title;
                document.getElementById("view-btn").click();

            },
            eventMouseEnter: function(info) {
                new bootstrap.Popover(info.el, {
                        template: '<div class="popover event-popover"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                        title: info.event.title,
                        content: info.event._def.extendedProps.description,
                        container:'body',
                        placement: "top",
                    }).show()
                },
            eventMouseLeave: function() {
                u()
            },
            eventDragStart: function() {
                u()
            },
            
        });
            function u() {
                document.querySelectorAll(".event-popover").forEach(function(info) {
                    info.remove()
                })
            }
        calendar.render();
      });

    </script>


        <script src="assets/js/bundle0226.js">
        </script>
        <script src="assets/js/scripts0226.js">
        </script>
        <script src="assets/js/demo-settings0226.js">
        </script>
        <!-- <script src="assets/js/libs/fullcalendar0226.js?ver=3.1.2">
        </script>
        <script src="assets/js/apps/calendar0226.js?ver=3.1.2">
        </script> -->
  
        <script src="fullCalendar/dist/index.global.min.js"></script>
        <script src="fullCalendar/packages/core/locales-all.global.js"></script>

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