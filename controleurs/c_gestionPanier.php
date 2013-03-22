<?php
$action = $_REQUEST['action'];
switch($action)
{
       case 'voirPanier':
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
                       $message = "panier vide ! ";
                       include ("vues/v_message.php");
               }
       }break;
       
       
       case 'supprimerUnProduit':
       {       $idProduit=$_REQUEST['produit'];
               retirerDuPanier($idProduit);
               $desIdProduit = getLesIdProduitsDuPanier();
               $lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
               include("vues/v_panier.php");
               
       }break;
       
               
       case 'confirmerCommande' :
       {
					   
						$lesIdProduit = getLesIdProduitsDuPanier();
						$idclient = $pdo->idclient($_SESSION['logincli']);
						$pdo->creerPanier($idclient);
						$id_panier= $pdo->getLeNumPanier($idclient);
						$pdo->creerCommande($id_panier,$lesIdProduit);
						$message = "Commande enregistrée";
						supprimerPanier();
						include ("vues/v_message.php");
       } break;
       
       case 'retourCat' :
       {
               include("vues/v_categories_client.php");
       }break;
       

       
       
}


?>