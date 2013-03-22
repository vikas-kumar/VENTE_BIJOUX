<?php
/**
 * Initialise le panier
 *
 * Crée une variable de type session dans le cas
 * où elle n'existe pas 
*/
function initPanier()
{
	if(!isset($_SESSION['produits']))
	{
		$_SESSION['produits']= array();
	}
}
/**
 * Supprime le panier
 *
 * Supprime la variable de type session 
 */
function supprimerPanier()
{
	unset($_SESSION['produits']);
}
/**
 * Ajoute un produit au panier
 *
 * Teste si l'identifiant du produit est déjà dans la variable session 
 * ajoute l'identifiant à la variable de type session dans le cas où
 * où l'identifiant du produit n'a pas été trouvé
 * @param $idProduit : identifiant de produit
 * @return vrai si le produit n'était pas dans la variable, faux sinon 
*/
function ajouterAuPanier($idProduit)
{
	
	$ok = true;
	if(in_array($idProduit,$_SESSION['produits']))
	{
		$ok = false;
	}
	else
	{
		$_SESSION['produits'][]= $idProduit;
	}
	return $ok;
}
/**
 * Retourne les produits du panier
 *
 * Retourne le tableau des identifiants de produit
 * @return : le tableau
*/
function getLesIdProduitsDuPanier()
{
	return $_SESSION['produits'];
}
/**
 * Retourne le nombre de produits du panier
 *
 * Teste si la variable de session existe
 * et retourne le nombre d'éléments de la variable session
 * @return : le nombre 
*/
function nbProduitsDuPanier()
{
	$n = 0;
	if(isset($_SESSION['produits']))
	{
	$n = count($_SESSION['produits']);
	}
	return $n;
}
/**
 * Retire un de produits du panier
 *
 * Recherche l'index de l'idProduit dans la variable session
 * et détruit la valeur à ce rang
 * @param $idProduit : identifiant de produit
 
*/
function retirerDuPanier($idProduit)
{
		$index =array_search($idProduit,$_SESSION['produits']);
		unset($_SESSION['produits'][$index]);
}
/**
 * teste si une chaîne a un format de code postal
 *
 * Teste le nombre de caractères de la chaîne et le type entier (composé de chiffres)
 * @param $codePostal : la chaîne testée
 * @return : vrai ou faux
*/
/**
 * teste si une chaîne est un entier
 *
 * Teste si la chaîne ne contient que des chiffres
 * @param $valeur : la chaîne testée
 * @return : vrai ou faux
*/

function estEntier($valeur) 
{
	return preg_match("/[^0-9]/", $valeur) == 0;
}

function estUnCp($codePostal)
{
   
   return strlen($codePostal)== 5 && estEntier($codePostal);
}

/**
 * Teste si une chaîne a le format d'un mail
 *
 * Utilise les expressions régulières
 * @param $mail : la chaîne testée
 * @return : vrai ou faux
*/
function estUnMail($mail)
{
return  preg_match ('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail);
}


/**
 * Retourne un tableau d'erreurs de saisie pour une commande
 *
 * @param $nom : chaîne
 * @param $rue : chaîne
 * @param $ville : chaîne
 * @param $cp : chaîne
 * @param $mail : chaîne 
 * @return : un tableau de chaînes d'erreurs
*/


function getErreursSaisieClient($login,$motpass1,$motpass2,$nom,$prenom,$dtn,$adr,$cp,$ville,$pays,$tel,$mail)
{
	$lesErreurs = array();
	
	if($login=="")
	{
	$lesErreurs[]="Il faut saisir le champ login";
	}
	if($motpass1=="")
	{
	$lesErreurs[]="Il faut saisir le champ mot de passe";
	}
	if($motpass2=="")
	{
	$lesErreurs[]="Il faut resaisir un mot de passe";
	}
	if($nom=="")
	{
	$lesErreurs[]="Il faut saisir le champ nom";
	}
	if($prenom=="")
	{
		$lesErreurs[]="Il faut saisir le champ prénom";
	}
	if($dtn=="")
	{
	$lesErreurs[]="Il faut saisir le champ date de naissance";
	}
	if($adr=="")
	{
	$lesErreurs[]="Il faut saisir le champ adresse";
	}
	if($cp=="")
	{
		$lesErreurs[]="Il faut saisir le champ Code postal";
	}
	else
	{
		if(!estUnCp($cp))
		{
			$lesErreurs[]= "erreur de code postal";
		}
	}
	if($ville=="")
	{
	$lesErreurs[]="Il faut saisir le champ ville";
	}
	if($pays=="")
	{
	$lesErreurs[]="Il faut saisir le champ pays";
	}
	if($tel=="")
	{
	$lesErreurs[]="Il faut saisir le champ téléphone";
	}
	if($mail=="")
	{
		$lesErreurs[]="Il faut saisir le champ mail";
	}
	else
	{
		if(!estUnMail($mail))
		{
			$lesErreurs[]= "erreur de mail";
		}
	}

	if($motpass1 != $motpass2)
	{
		$lesErreurs[]= "erreur saisie, les deux mots de passe ne sont pas identique";
	}
	return $lesErreurs;
}


//verification de saisi des donnes de l admin
/*function getErreursVerifAdmin($login,$mdp)
{
	echo $login;
	echo $mdp;
	$lesErreurs = array();
	
	if (empty($login))
	{ 
		$lesErreurs[]="Il faut saisir le champ login";
	}
	if (empty($mdp))
	{
	$lesErreurs[]="Il faut saisir le champ mdp";
	}
}
*/

function enregAdmin()
{
	$_SESSION['admin'] = 1;
}
/**
 * Teste si un administrateur est connecté
 * @return vrai ou faux 
 */
function estConnecte()
{
  return isset($_SESSION['admin']);
}
/**
 * Détruit la session active
 */
function deconnecter()
{
	session_destroy();
}



?>
