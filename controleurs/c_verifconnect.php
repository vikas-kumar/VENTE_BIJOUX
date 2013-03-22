<?php>
$login =$_REQUEST['login'];
				$mdp=$_REQUEST['mdp'];				
					$ok = $pdo->VerificationAdmin($login,$mdp);					
					if ($ok)
					{	
							$_SESSION['loginadmin']=$login;
							$lesCategories = $pdo->getLesCategories();	
							$lesClients = $pdo->getLesClients();	
							include("vues/v_cat_admin.php");
					}
					else
					{
					
							$message="Erreur d'identification de l'administrateur";
							include ("vues/v_message.php");
							include("vues/v_formadmin.php");
					}
?>					