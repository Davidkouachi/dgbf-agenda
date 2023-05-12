<?php 

session_start();
require_once("../../connexion_bd/connexion_bd.php");

 ?>
<!DOCTYPE html>
<html lang="fr">
    <!-- Mirrored from dashlite.net/demo8/pages/auths/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:49 GMT -->
    <!-- Added by HTTrack -->
    <meta content="text/html;charset=utf-8" http-equiv="content-type"/>
    <!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
            <meta content="Softnio" name="author">
                <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                    <meta content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." name="description">
                        <link href="../../images/dgbf/logo de cote d'ivoire.png" rel="shortcut icon">
                            <title>
                                LOGIN DGBF
                            </title>
                            <link href="../../assets/css/dashlite0226.css?ver=3.1.2" rel="stylesheet">
                                <link href="../../assets/css/theme0226.css?ver=3.1.2" id="skin-default" rel="stylesheet">
                                </link>
                            </link>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body class="nk-body bg-white npc-general pg-auth">
        <div class="nk-app-root">
            <div class="nk-main ">
                <div class="nk-wrap nk-wrap-nosidebar">
                    <div class="nk-content ">
                        <div class="nk-split nk-split-page nk-split-lg" style="align-items: center; justify-content: center;">
                            <div class="col-md-8" style="text-align: center;">
                                <img src="../../images/dgbf/logo de cote d'ivoire.png"></img>
                            </div>
                            <div class="col-md-3" style="border:1px solid #DEDEDE; border-radius: 30px; display: flex;justify-content: center;align-items: center;">
                                <div class="col-md-12" style=" padding:15px;">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title" style="text-align:center;">
                                                CONNEXION
                                            </h5>
                                        </div>
                                    </div>
                                    <form  action="connexion_email.php" method="POST" autocomplete="off" class="form-validate is-alter">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="email-address">
                                                    Email
                                                </label>
                                            </div>
                                            <div class="form-control-wrap">
                                                <input autocomplete="off" class="form-control form-control-lg" id="email-address" placeholder="Entrer votre Email" required="" type="email" name="email_agent" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="password">
                                                    Mot de passe
                                                </label>
                                            </div>
                                            <div class="form-control-wrap">
                                                <a class="form-icon form-icon-right passcode-switch lg" data-target="password" href="#" tabindex="-1">
                                                    <em class="passcode-icon icon-show icon ni ni-eye">
                                                    </em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off">
                                                    </em>
                                                </a>
                                                <input autocomplete="new-password" class="form-control form-control-lg" id="password" placeholder="Entrer votre mot de passe" required="" type="password" name="mdp_agent"/>
                                                <!-- <a class="link link-primary link-sm" href="auth-reset.html">
                                                    Mot de passe oublié?
                                                </a> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="nk-block">
                                                <div class="row g-gs">
                                                    <div class="col-md-6">
                                                        <button name="btn_se_connecter" type="submit" class="btn btn-lg btn-success btn-dim btn-block">
                                                            Se connecter
                                                        </button>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <a href="../../index.html" class="btn btn-lg btn-danger btn-dim btn-block">
                                                            Annuler
                                                        </a>
                                                    </div>
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
        <script src="../../assets/js/bundle0226.js?ver=3.1.2">
        </script>
        <script src="../../assets/js/scripts0226.js?ver=3.1.2">
        </script>
        <script src="../../assets/js/demo-settings0226.js?ver=3.1.2">
        </script>
        <!-- Mirrored from dashlite.net/demo8/pages/auths/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:50 GMT -->
		<link href="../../notification/toastr.min.css" rel="stylesheet">
		<script src="../../notification/toastr.min.js"></script>

        <?php if(isset($_SESSION['erreur_admin'])=='oui') {?>
            <script>
                toastr.error("Email ou Mot de passe incorrect","Notification",
                    {positionClass:"toast-top-right",timeOut:5e3,debug:!1,newestOnTop:!0,
                    preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                    showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
        <?php }  unset($_SESSION['erreur_admin']); ?>

        <script type="text/javascript">
            window.history.go(-1); 
            return false;

            function noBack(){window.history.forward()}

            noBack();

            window.onload=noBack;

            window.onpageshow=function(evt){if(evt.persisted)noBack()}

            window.onunload=function(){void(0)}

        </script>
    </body>
</html>