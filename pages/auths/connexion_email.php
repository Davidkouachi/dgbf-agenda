<?php 

session_start();
require_once("../../connexion_bd/connexion_bd.php");

if (isset($_POST['btn_se_connecter'])) {

	$email=$_POST['email_agent'];
	$mdp=md5($_POST['mdp_agent']);
	$req =$bdd->prepare("SELECT * FROM agent WHERE email_agent=? and mdp_agent=?");
	$req->execute(array($email,$mdp));
	$nbre =$req->rowcount();
	$element=$req->fetchall();

	if($nbre == 1)
	{
	    $_SESSION['erreur_admin']="non";
	    foreach ($element as $elt) 
	    {
			$_SESSION['id_agent']=$elt['id_agent'];
	    	if ($elt['dirige_agent']=='oui' && $elt['assiste_agent']=='non' ) {
	    		
	    		$req1 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
				$req1->execute(array($elt['id_hira']));
				$nbre1 =$req1->rowcount();
				$element1=$req1->fetchall();
		    	foreach ($element1 as $elt1) {
		    		/*sous-directeur*/
		    		if ($elt1['id_type_hira']=='3') {
		    			$req2 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
						$req2->execute(array($elt1['id_parent']));
						$nbre2 =$req2->rowcount();
						$element2=$req2->fetchall();
						foreach ($element2 as $elt2) {
							/*direction*/
							$_SESSION['structure_service']='';
		    				$_SESSION['id_service']='';
							$_SESSION['structure_sous_direction']=$elt1['n_hira'];
		    				$_SESSION['id_sous_direction']=$elt1['id_hira'];
							$_SESSION['structure_direction']=$elt2['n_hira'];
		    				$_SESSION['id_direction']=$elt2['id_hira'];
		    				$_SESSION['poste']='Sous-Directeur';
		    				$_SESSION['id_hira']=$elt1['id_hira'];
		    				$_SESSION['n_hira']=$elt1['n_hira'];
						}
		    		}
		    		/*chef-service*/
		    		if ($elt1['id_type_hira']=='4') {
		    			$_SESSION['id_service']=$elt1['id_hira'];
		    			$_SESSION['id_hira']=$elt1['id_hira'];
		    			$_SESSION['n_hira']=$elt1['n_hira'];
		    			$_SESSION['poste']='Chef de Service';
		    			$_SESSION['structure_service']=$elt1['n_hira'];
		    			$req2 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
						$req2->execute(array($elt1['id_parent']));
						$nbre2 =$req2->rowcount();
						$element2=$req2->fetchall();
						foreach ($element2 as $elt2) {
							$_SESSION['structure_sous_direction']=$elt2['n_hira'];
							$_SESSION['id_sous_direction']=$elt2['id_hira'];
							$req3 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
							$req3->execute(array($elt2['id_parent']));
							$nbre3 =$req3->rowcount();
							$element3=$req3->fetchall();
							foreach ($element3 as $elt3) {
								$_SESSION['structure_direction']=$elt3['n_hira'];
			    				$_SESSION['id_direction']=$elt3['id_hira'];
			    				$_SESSION['n_hira']=$elt1['n_hira'];
							}
						}
		    		}
		    		/*directeur*/
		    		if ($elt1['id_type_hira']=='2') {
		    			$_SESSION['structure_direction']=$elt1['n_hira'];
		    			$_SESSION['structure_sous_direction']='';
		    			$_SESSION['structure_service']='';
		    			$_SESSION['id_direction']=$elt1['id_hira'];
		    			$_SESSION['id_sous_direction']='';
		    			$_SESSION['id_service']='';
		    			$_SESSION['poste']='Directeur';
		    			$_SESSION['id_hira']=$elt1['id_hira'];
		    			$_SESSION['n_hira']=$elt1['n_hira'];
		    		}
		    		
		    	}
	    	}
	    	if ($elt['dirige_agent']=='non' && $elt['assiste_agent']=='oui' ) {
	    		
	    		$req1 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
				$req1->execute(array($elt['id_hira']));
				$nbre1 =$req1->rowcount();
				$element1=$req1->fetchall();
		    	foreach ($element1 as $elt1) {
		    		if ($elt1['id_type_hira']=='3') {
		    			$req2 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
						$req2->execute(array($elt1['id_parent']));
						$nbre2 =$req2->rowcount();
						$element2=$req2->fetchall();
						foreach ($element2 as $elt2) {
							$_SESSION['structure_direction']=$elt2['n_hira'];
							$_SESSION['structure_sous_direction']=$elt1['n_hira'];
		    				$_SESSION['id_direction']=$elt2['id_hira'];
		    				$_SESSION['id_sous_direction']=$elt1['id_hira'];
		    				$_SESSION['poste']='Secretaire2';
		    				$_SESSION['id_hira']=$elt1['id_hira'];
		    				$_SESSION['n_hira']=$elt1['n_hira'];
						}
		    		}else{
		    			$_SESSION['structure_direction']=$elt1['n_hira'];
		    			$_SESSION['id_direction']=$elt1['id_hira'];
		    			$_SESSION['poste']='Secretaire';
		    			$_SESSION['id_hira']=$elt1['id_hira'];
		    			$_SESSION['n_hira']=$elt1['n_hira'];
		    		}
		    		
		    	}
	    	}
	    	if ($elt['dirige_agent']=='non' && $elt['assiste_agent']=='non' ) {
				$_SESSION['id_hira']=$elt['id_hira'];
	    			$_SESSION['poste']='Agent';
	    		$req1 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
				$req1->execute(array($elt['id_hira']));
				$element1=$req1->fetchall();
		    	foreach ($element1 as $elt1) {
		    		$_SESSION['id_service']=$elt1['id_hira'];
		    		$_SESSION['structure_service']=$elt1['n_hira'];
		    			$req2 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
						$req2->execute(array($elt1['id_parent']));
						$nbre2 =$req2->rowcount();
						$element2=$req2->fetchall();
						foreach ($element2 as $elt2) {
							$_SESSION['structure_sous_direction']=$elt2['n_hira'];
							$_SESSION['id_sous_direction']=$elt2['id_hira'];
				    			$req3 =$bdd->prepare("SELECT * FROM structure_administrative WHERE id_hira=? ");
								$req3->execute(array($elt2['id_parent']));
								$nbre3 =$req3->rowcount();
								$element3=$req3->fetchall();
								foreach ($element3 as $elt3) {
										$_SESSION['structure_direction']=$elt3['n_hira'];				
					    				$_SESSION['id_direction']=$elt3['id_hira'];
					    				$_SESSION['n_hira']=$elt1['n_hira'];
								}
				    	}
				}
				header('location:../../calendrier.php');	
		    }
	    }
	    header('location:../../index_2.php');
	}else {
		$_SESSION['erreur_admin']="oui";
		header("Location:../../login/login_v1/index.php");
	}
	    
}

 ?>