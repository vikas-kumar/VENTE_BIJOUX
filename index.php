<?php
session_start();?>
<div id="corps">
<?php 
//on utilise les fonctions
require_once("util/fonctions.inc.php");
require_once("util/class.pdoBijoux.inc.php");

include("vues/v_entete.php");
include("vues/v_bandeau.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = Pdovente_bijoux::getPdovente_bijoux();	 
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'voirBijoux' :
		{include("controleurs/c_voirBijoux.php");break;}
	case 'connexion' :
		{ include("controleurs/c_connecter.php");break; }
	case 'enregistrement' :
		{ include("controleurs/c_enregistrer.php");break; }	
	case'panier':
		{include("controleurs/c_gestionPanier.php");break; }	
	case 'administrer' :
	  { include("controleurs/c_administrer.php");break;  }
}
include("vues/v_pied.php") ;
?>
</div>