<?php 

session_start();
unset($_SESSION['id_usager']);
header('location:index.html');

 ?>