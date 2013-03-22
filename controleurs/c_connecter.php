<?php
$action = $_REQUEST['action'];


switch($action)
{
	case 'se_connecter':
	{
	//si le client est déjà conncecté
		if(isset($_SESSION['logincli']))
		{
			$lesCategories = $pdo->getLesCategories();
			include("vues/v_categories_client.php");
			$categorie = $_REQUEST['categorie'];
			$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
			include("vues/v_voir_Bijoux.php");
		}
		//si le client n'est pas connecté
		else
		{
			include ("vues/v_connexion.php");
		}
	}break;
	
	case 'connection':
	{	
		
		$login=$_REQUEST['login'];
		$mdp=$_REQUEST['mdp'];

		$ok = $pdo->verifConnexion($login,$mdp);
			
		if ($ok)
		{
			session_start();
			$_SESSION['logincli']=$login;
			$_SESSON['idclient']=$res1;
			?>
			<meta http-equiv="refresh" content="0;url=index.php?uc=accueil" />
<?php			
		}

		else
		{
			$message="Erreur d'identification du client";
			include ("vues/v_message.php");
			include("vues/v_connexion.php");			
		}
		

	}break;
	
	case 'deconnexion':
       {
               session_destroy();
               $message="Vous avez été déconnecté ";
				
				?><meta http-equiv="refresh" content="2;url=index.php?uc=accueil" /><?php
				include ("vues/v_message.php");
				
               
       }break;
	
	
	case 'voir_Bijoux':
	{
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_produits_client.php");
		
	}break;
	
	case 'voir_Bijoux2':
	{
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories_client.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_voir_Bijoux_client.php");		
	}break;
	
	
	case 'voirPanier' :
	{
		$n= nbProduitsDuPanier();
		if($n >0)
		{
			$desIdProduit = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
			include("vues/v_panier.php");
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		
	}break;
	
	
	}

?>