<?php
initPanier();
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirCategories':
	{
  		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories_client.php");
  		break;
	}
	
	case 'voirCategories1':
	{
  		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories.php");
  		break;
	}
	
	case 'voir_Bijoux' :
	{
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_voir_Bijoux.php");
		break;
	}
	case 'ajouterAuPanier' :
	{
		$idProduit=$_REQUEST['produit'];
		$categorie = $_REQUEST['categorie'];
		$ok = ajouterAuPanier($idProduit);
		if(!$ok)
		{
			$message = "Cet article est déjà dans le panier !!";
			include("vues/v_message.php");
		}
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories_client.php");
  		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_produits_client.php");
		break;
	}
	case 'voirCommandes':
	{
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories_client.php");
		$idClient = $pdo->idclient($_SESSION['logincli']);
		$lesCommandes = $pdo->getLesCommandes($idClient);
		
		
		include ("vues/v_voirCommandesClient.php");
		break;
	}
	case 'voirDetailCommandeClient' :
	{
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories_client.php");
		$idCommande= $_REQUEST['commande'];
		$idClient = $pdo->idclient($_SESSION['logincli']);
		$lesProduits= $pdo->getLesProduits($idCommande);
		include ("vues/v_voirDetailCommandeClient.php");	
		break;
	}

}
?>