<?php

session_start();
require_once("../../connexion_bd/connexion_bd.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../images/dgbf/logo de cote d'ivoire.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../images/dgbf/bat 2.png'); background-position: button; background-size: cover; ">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../../images/dgbf/usg.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="../../pages/auths/connexion_usager.php" method="POST" autocomplete="off">
					<span class="login100-form-title">
						CONNEXION
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Acune données">
						<input class="input100" type="email" name="email_usager" autocomplete="off" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Acune données">
						<input class="input100" type="password" name="mdp_usager" autocomplete="off" placeholder="Mot de Passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn_connecter" type="submit">
							Se Connecter
						</button>
					</div>
					<br>
					<div class="col-md-12">
                        <a href="../../index.html" class="btn btn-lg btn-danger btn-dim btn-block">
                            Accueil
                        </a>
                    </div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

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

</body>
</html>