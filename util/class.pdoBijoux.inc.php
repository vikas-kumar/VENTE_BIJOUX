<?php //session_start();
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application lafleur
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class Pdovente_bijoux
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=vente_bijoux';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdovente_bijoux = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
 
 //insérer un client
 public function insertClient($login,$motpass1,$motpass2,$nom,$prenom,$dtn,$adr,$cp,$ville,$pays,$tel,$mail)
	{
		$req = "insert into client values ('','$login','$motpass1','$nom','$prenom','$dtn','$adr',$cp,'$ville','$pays','$tel','$mail')";
		$res = Pdovente_bijoux::$monPdo->exec($req);
	}	
//vérifier la validité du client	
	public function verifConnexion($login,$mdp)
	{ 
	
		$req =" select count(ID_CLIENT) as nb from client where LOGIN_CLIENT='$login' and MDP_CLIENT='$mdp'";
		$res = Pdovente_bijoux::$monPdo->query($req);
		$laLigne = $res->fetch();
		if($laLigne['nb'] > 0 )
		{
			$ok = true;
		}
		else
		{
			$ok = false;
		}
		return $ok;
	}
 
 
	private function __construct()
	{
    		Pdovente_bijoux::$monPdo = new PDO(Pdovente_bijoux::$serveur.';'.Pdovente_bijoux::$bdd, Pdovente_bijoux::$user, Pdovente_bijoux::$mdp); 
			Pdovente_bijoux::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		Pdovente_bijoux::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdovente_bijoux = Pdovente_bijoux::getPdovente_bijoux();
 * @return l'unique objet de la classe Pdovente_bijoux
 */
	public  static function getPdovente_bijoux()
	{
		if(Pdovente_bijoux::$monPdovente_bijoux == null)
		{
			Pdovente_bijoux::$monPdovente_bijoux= new Pdovente_bijoux();
		}
		return Pdovente_bijoux::$monPdovente_bijoux;  
	}
/**
 * Retourne toutes les catégories sous forme d'un tableau associatif
 *
 * @return le tableau associatif des catégories 
*/
	public function getLesCategories()
	{
		$req = "select * from categorie";
		$res = Pdovente_bijoux::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getLesMatieres()
	{
		$req = "select * from matiere";
		$res = Pdovente_bijoux::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getLesClients()
	{
		$req = "select * from client";
		$res = Pdovente_bijoux::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

/**
 * Retourne sous forme d'un tableau associatif tous les clients de la
 * catégorie passée en argument
 * 
 * @param $idCategorie 
 * @return un tableau associatif  
*/

	public function getLesProduitsDeCategorie($id)
	{
	    $req="select * from produit where id_Cat = '$id'";
		$res = Pdovente_bijoux::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
/**
 * Retourne les clients concernés par le tableau des idclients passée en argument
 *
 * @param $desIdProduit tableau d'idclients
 * @return un tableau associatif 
*/
	public function getLesclientsDuTableau($desIdProduit)
	{
		$nbclients = count($desIdProduit);
		$lesclients=array();
		if($nbclients != 0)
		{
			foreach($desIdProduit as $unIdProduit)
			{
				$req = "select * from produit where id = '$unIdProduit'";
				$res = Pdovente_bijoux::$monPdo->query($req);
				$unProduit = $res->fetch();
				$lesclients[] = $unProduit;
			}
		}
		return $lesclients;
	}
/**
 * Crée une commande 
 *
 * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
 * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
 * tableau d'idProduit passé en paramètre
 * @param $nom 
 * @param $rue
 * @param $cp
 * @param $ville
 * @param $mail
 * @param $lesIdProduit
 
*/
	 public function creerPanier($idclient)
       {   
               
			   $req = "select max(ID_PANIER) as maxi from panier";			   
			   $res = Pdovente_bijoux::$monPdo->query($req);			   
			   $laLigne = ($res->fetch());
			   $maxi = $laLigne['maxi'];
			   $maxi++;
			   $idCommande = $maxi;			   
			   $date = date('Y/m/d');
		$req = "insert into panier values ('','$idclient','$date','')";		
		$res = Pdovente_bijoux::$monPdo->query($req);
		
		}
		
		public function creerCommande($id_panier,$lesIdProduit)
		{
		foreach($lesIdProduit as $unIdProduit)
		 {
			$req = "insert into contenir values ('$id_panier','$unIdProduit')";			
			$res = Pdovente_bijoux::$monPdo->exec($req);
		 } 
        }                  
       
		
	
	
	
	
		
				//verification de l admin
				public function VerificationAdmin($login,$mdp)
				{ 
					
					$req =" select count(ID_ADMIN ) as nb from administrateur where LOGIN_ADMIN='$login' and MDP_ADMIN='$mdp'";
					$res = Pdovente_bijoux::$monPdo->query($req);
					$laLigne = $res->fetch();
					
						if($laLigne['nb'] > 0 )
							{
							$ok = true;
							}
						else
							{
								$ok = false;
							}
						return $ok;
				}
				
				
				 public function getLesProduitsDuTableau($desIdProduit)
       {
               $nbProduits = count($desIdProduit);
               $lesProduits=array();
               if($nbProduits != 0)
               {
                       foreach($desIdProduit as $unIdProduit)
                       {
                               $req = "select * from produit where ID_PRODUIT = '$unIdProduit'";
                               $res = Pdovente_bijoux::$monPdo->query($req);
                               $unProduit = $res->fetch();
                               $lesProduits[] = $unProduit;
                       }
               }
               return $lesProduits;
       }
				
				
				
			
				//on récupère un produit
				public function getUnProduitsDuTableau($idproduit)
				{
		
				$req = "select * from produit where ID_PRODUIT = '$idproduit'";
				$res = Pdovente_bijoux::$monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			
		
						return $unProduit;
				}
				
			//suppression d'un produit
				public function SupprimerProduits($id)
				{ 	echo $id;
					$req =" select count(*)  from contenir where ID_PRODUIT='$id'";
					$res = Pdovente_bijoux::$monPdo->query($req);
					$laLigne = $res->fetch();
				
					if($laLigne[0] != 0)
							{
							$ok = false; 
							}
						else
						{
								
								
								$req2 =" delete from produit where ID_PRODUIT=$id";
								$res = Pdovente_bijoux::$monPdo->exec($req2);
								
								$ok = true;
						}
						
						return $ok;
				}
				
			//modification d'un produit
				public function ModifierProduits($id,$nouveau_nom,$nouveau_prix)
				{ 	
				
					$req = "UPDATE produit SET NOM_PRODUIT='$nouveau_nom' ,  PRIX_PRODUIT='$nouveau_prix' WHERE ID_PRODUIT='$id'";
					$res = Pdovente_bijoux::$monPdo->exec($req);								
					$ok = true;
					return $ok;
				}
			

			//supprimer un client	
			public function SupprimerClients($id)
				{ 	
					$req =" select count(*)  from panier where ID_CLIENT='$id'";
					$res = Pdovente_bijoux::$monPdo->query($req);
					$laLigne = $res->fetch();				
					if($laLigne[0] != 0)
							{
							$ok = false; 
							}
						else
						{
								
								
								$req2 =" delete from client where ID_CLIENT=$id";
								$res = Pdovente_bijoux::$monPdo->exec($req2);								
								$ok = true;
						}
						
						return $ok;
				}
			
			public function AjouterProduit($categ_prod,$mat_prod,$nom_prod,$prix_prod,$couleur_prod,$carac_prod,$qte_prod)	
				{
					$req =" insert into produit (ID_PRODUIT,ID_CAT,ID_MATIERE,NOM_PRODUIT,PRIX_PRODUIT,COULEUR_PRODUIT,CARAC_PRODUIT,QTEDISPO_PRODUIT) values ('','$categ_prod','$mat_prod','$nom_prod','$prix_prod','$couleur_prod','$carac_prod','$qte_prod')";
					$res = Pdovente_bijoux::$monPdo->query($req);
					$ok = true;
					return $ok;
					
				}
				
			public function AjouterCateg($categ_prod)
			{
				$req= " insert into categorie values ('','$categ_prod')";
				$res = Pdovente_bijoux::$monPdo->query($req);
				$ok = true;
				return $ok;				
			}			
				
			public function AjouterMatiere($nom_mat)
			{
				$req= " insert into matiere values ('','$nom_mat')";
				$res = Pdovente_bijoux::$monPdo->query($req);
				$ok = true;
				return $ok;	
			
			}
				
			public function ModifierClients($id,$nouveau_mdp,$nouvelle_adresse,$nouveau_cp,$nouveau_pays,$nouveau_tel,$nouveau_mail)
				{ 	
				
					$req = "UPDATE client SET MDP_CLIENT='$nouveau_mdp' , ADRESSE_CLIENT='$nouvelle_adresse' , CP_CLIENT='$nouveau_cp', PAYS_CLIENT='$nouveau_pays', TEL_CLIENT='$nouveau_tel', MAIL_CLIENT='$nouveau_mail' WHERE ID_CLIENT='$id'";
					$res = Pdovente_bijoux::$monPdo->exec($req);						
					$ok = true;
					return $ok;
					
				}	
				

			public function getUnClientDuTableau($idclient)
				{
		
				$req = "select * from client where ID_CLIENT = '$idclient'";
				$res = Pdovente_bijoux::$monPdo->query($req);
				$unclient = $res->fetch();
				$lesclients[] = $unclient;
			
		
						return $unclient;
				}
				

			// retourne l'id du client selon son nom
			public function idclient($login)
	{
			$req = "select ID_CLIENT from client where LOGIN_CLIENT='$login'";
			
			$res = Pdovente_Bijoux::$monPdo->query($req);
			$id = $res->fetch();
			return $id['ID_CLIENT'];
	}
	
			public function getLeNumPanier($idclient)
			{
				
			$req = "select max(ID_PANIER) as PANIER_RECENT from panier where ID_CLIENT='$idclient'";			
			$res = Pdovente_Bijoux::$monPdo->query($req);
			$id = $res->fetch();
			return $id['PANIER_RECENT'];
	
			}
			
			public function GetId_Categ($nom_categ_prod)
			{
			$req = "select ID_CAT from categorie where NOM_CAT='$nom_categ_prod'";
			$res = Pdovente_Bijoux::$monPdo->query($req);
			$id = $res->fetch();
			return $id['0'];
			}
			
			public function GetId_Mat($nom_mat_prod)
			{
			$req = "select ID_MATIERE from matiere where NOM_MATIERE='$nom_mat_prod'";
			$res = Pdovente_Bijoux::$monPdo->query($req);
			$id = $res->fetch();
			return $id['0'];
			}
			
			public function getLesCommandes($idClient)
			{
			$req = "SELECT ID_PANIER, DATE_PANIER, ID_ETAT
			FROM panier
			WHERE ID_CLIENT ='$idClient'";
			$res = Pdovente_Bijoux::$monPdo->query($req);
			$LesCommandes = $res->fetchAll();
			return $LesCommandes;
			}
			
			public function getLesEtats()
			{
				$req = "select * from etat";
				$res = Pdovente_Bijoux::$monPdo->query($req);
				$etat = $res->fetchAll();
				return $etat;
			}
			

			
			public function getNomEtat($id)
			{
				$req = "select nomEtat from etat where IDETAT = '$id'";
				$res = Pdovente_Bijoux::$monPdo->query($req);
				$etat = $res->fetch();
				return $etat['nomEtat'];
			}
			
			public function getLesProduits($idCommande)
			{
				$req = "SELECT contenir.ID_PRODUIT, NOM_PRODUIT, PRIX_PRODUIT FROM contenir, produit
				WHERE produit.ID_PRODUIT = contenir.ID_PRODUIT
				AND ID_PANIER = '$idCommande'";
			$res = Pdovente_Bijoux::$monPdo->query($req);
			$LesProduits = $res->fetchAll();
			return $LesProduits;
			}
			
			public function getIdEtat($etat)
			{
				$req = "select IDETAT from etat where nomEtat = '$etat'";
				$res = Pdovente_Bijoux::$monPdo->query($req);
				$id = $res->fetch();
				var_dump($req);
				var_dump($res);

				return $id['IDETAT'];
			}
			
			public function modifEtat($etat, $idCommande)
			{
				$req = "update panier set ID_ETAT = $etat where ID_PANIER = $idCommande";
				var_dump($req);
				$res = Pdovente_bijoux::$monPdo->exec($req);								
				var_dump($res);
				$ok = true;
				return $ok;
			}
}
?>