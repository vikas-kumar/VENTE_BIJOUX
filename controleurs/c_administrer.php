<?php


$action = $_REQUEST['action'];

switch($action)
{

	//formulaire de connexion d'un admin
	case 'connectadmin':
	{  
//on vérifie si l'admin n'a pas déjà ouvert une session
	if(isset($_SESSION['login']))
		{		
		
			//on voit le sous menu des catégories
			$lesCategories = $pdo->getLesCategories();	
			$lesClients = $pdo->getLesClients();										
			include("vues/v_cat_admin.php");
			//include("vues/v_formadmin.php");
			
			
				
			
		} 
	//s'il n'a pas de sessions en cours 	
		else{
		include("vues/v_formadmin.php");
		}	
  		break;
	}
	
	
	
	//vérification d'un administrateur
	case 'verifadmin':
		{	
		
				$login =$_REQUEST['login'];				
				$mdp=$_REQUEST['mdp'];				
					$ok = $pdo->VerificationAdmin($login,$mdp);					
					if ($ok)
					{	
							
							session_start();
							$_SESSION['login']=$login;
							?>
			<meta http-equiv="refresh" content="0;url=index.php?uc=accueil" />
<?php	
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
		
		}	break;
		
	//accéder au formulaire pour ajouter un produit
	case 'FormAjouterProd':
	{				
		include("vues/v_FormAjouterProd.php");
	}
	break;
	
	//ajouter un produit
	case 'ajouterProduit':
	{	
		$nom_prod=$_REQUEST['nom_prod'];
		$prix_prod=$_REQUEST['prix_prod'];
		$couleur_prod=$_REQUEST['couleur_prod'];
		$carac_prod=$_REQUEST['carac_prod'];
		$qte_prod=$_REQUEST['qte_prod'];
		$cat = $_REQUEST['categ_prod'];
		$mat=$_REQUEST['mat_prod'];

	
	
		//on récupère l'id à partir du nom
		$categ_prod = $pdo->GetId_Categ($cat);
		$mat_prod = $pdo->GetId_Mat($mat);
		
				
		$ok = $pdo->AjouterProduit($categ_prod,$mat_prod,$nom_prod,$prix_prod,$couleur_prod,$carac_prod,$qte_prod);
							
					if ($ok)
					{
							$message="Le produit à bien été ajouter";
							include ("vues/v_message.php");
							
					}
					else
					{
					
							$message="Erreur d'ajout du produit";
							include ("vues/v_message.php");
							
					}
	}
	break;
	
	case 'ajouterCateg':
	{
		$nom_categ=$_REQUEST['nom_categ'];
		
		$ok = $pdo->AjouterCateg($nom_categ);
		if ($ok)
					{
							$message="La nouvelle catégorie à bien été créer";
							include ("vues/v_message.php");
							
					}
					else
					{
					
							$message="Erreur de création de la catégorie";
							include ("vues/v_message.php");
							
					}
		
	}
	break;
	
	case 'ajouterMatiere':
	{
	$nom_mat=$_REQUEST['nom_mat'];
		
		$ok = $pdo->AjouterMatiere($nom_mat);
		if ($ok)
					{
							$message="La nouvelle matiere à bien été créer";
							include ("vues/v_message.php");
							
					}
					else
					{
					
							$message="Erreur de création de la matiere";
							include ("vues/v_message.php");
							
					}
	
	}
	break;
	
	// voir les bijoux		
	case'voirBijoux':
		{	//on voit le sous menu des catégories
			$lesCategories = $pdo->getLesCategories();	
			$lesClients = $pdo->getLesClients();										
			include("vues/v_cat_admin.php");	
			//on voit les produits
		$categorie = $_REQUEST['categorie'];
		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_voir_Bijoux_admin.php");	
		
		}
		
		break;
		
	//supprimer un produit	
	case'supprimer':
		{
					$id = $_REQUEST['produit'];					
					$ok = $pdo->SupprimerProduits($id);
					
					if ($ok)
					{
							$message="Votre produit a bien été supprimer";
							include ("vues/v_message.php");
							
					}
					else
					{
					
							$message="Erreur de suppression de produit";
							include ("vues/v_message.php");
							
					}
		
		//on réaffiche les produits et catégories pour pouvoir accéder de nouveau à la gestion de produit
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_cat_admin.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_voir_Bijoux_admin.php");
		}
		break;
			
	//accéder au formulaire de modification	
	case'formmodifier':
		{
			include ("vues/v_modif_admin.php");
		}
		break;
	
	//modification du produit	
	case'modifier':
		{
			$id=$_REQUEST['id'];			
			$nouveau_nom=$_REQUEST['nom'];
			$nouveau_prix=$_REQUEST['prix'];
			
			
			
			$ok = $pdo->ModifierProduits($id,$nouveau_nom,$nouveau_prix);
			if ($ok)
					{
							$message="Votre produit a bien été modifier";
							include ("vues/v_message.php");
							
					}
					else
					{
					
							$message="Erreur de modification de produit";
							include ("vues/v_message.php");
							
					}
		
		}
	
	//voir les clients	
	case'voirClients':
		{	//on voit le sous menu 
			$lesCategories = $pdo->getLesCategories();					
			include("vues/v_cat_admin.php");	
			//on voit les clients
		$lesClients = $pdo->getLesClients();
		include("vues/v_voir_Clients.php");	
		
		}break;

	//supprimer un client
	case'supprimerClient':
	{
		
					$id = $_REQUEST['client'];
						echo $id;
					$ok = $pdo->SupprimerClients($id);
					
					if ($ok)
					{
							$message="Le client a bien été supprimer";
							include ("vues/v_message.php");
							
					}
					else
					{
					
							$message="Erreur de suppression du client";
							include ("vues/v_message.php");
							
					}
		
		//on voit le sous menu 
			$lesCategories = $pdo->getLesCategories();					
			include("vues/v_cat_admin.php");	
			//on voit les clients
		$lesClients = $pdo->getLesClients();
		include("vues/v_voir_Clients.php");
		}
		break;
	
	
	
	//demande du formulaire pour modifier un client
	case'formmodifierClient':
	{
		include ("vues/v_modif_client.php");
		}
		break;
	
	//modification du client
	case 'modifierClient' :
		{
		
		$id = $_REQUEST['id'];
		$nouveau_mdp =$_REQUEST['mdp'];
		$nouvelle_adresse =$_REQUEST['adresse'];
		$nouveau_cp =$_REQUEST['cp'];
		$nouveau_pays =$_REQUEST['pays'];
		$nouveau_tel =$_REQUEST['tel'];
		$nouveau_mail =$_REQUEST['mail'];
		
		$ok = $pdo->ModifierClients($id,$nouveau_mdp,$nouvelle_adresse,$nouveau_cp,$nouveau_pays,$nouveau_tel,$nouveau_mail);
					
					if ($ok)
					{
							$message="Les données concernant le client ont bien ete modifier";
							include ("vues/v_message.php");
							
					}
					else
					{
					
							$message="Erreur de modification des données du client";
							include ("vues/v_message.php");
							
					}
		
	
		}
		break;
		
	case 'voirCommande':
	{	
		$lesCategories = $pdo->getLesCategories();					
			include("vues/v_cat_admin.php");
		$idClient = $_REQUEST['client'];
		$lesCommandes= $pdo->getLesCommandes($idClient);
		$etat = $pdo->getLesEtats();
		include ("vues/v_voir_Commande.php");
		
	}break;
	
	case 'voirDetailCommande':
	{
		$lesCategories = $pdo->getLesCategories();					
			include("vues/v_cat_admin.php");
		$idCommande= $_REQUEST['commande'];
		$idClient = $_REQUEST['client'];		
		$lesProduits= $pdo->getLesProduits($idCommande);
		include ("vues/v_voir_detailCommande.php");	
	}break;
	
	case 'confirmerEtat' :
	{
		$idCommande = $_REQUEST['commande'];
		$etat = $_REQUEST['nomEtat'];
		$idEtat = $pdo->getIdEtat($etat);
		
		$pdo->modifEtat($idEtat, $idCommande);
		
	}break;
		
		

	

session_destroy();
}

	
		
	
?>