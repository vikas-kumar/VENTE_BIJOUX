<?php
$action = $_REQUEST['action'];


switch($action)
{
	case 'enregistrer':
	{
	include ("vues/v_enregistrer.php");
	}break;
	
	case 'insertclient'	:
	{
		$login=$_REQUEST['login'];
		$motpass1=$_REQUEST['motpass1'];
		$motpass2=$_REQUEST['motpass2'];
		$nom=$_REQUEST['nom'];
		$prenom=$_REQUEST['prenom'];
		$dtn=$_REQUEST['dtn'];
		$adr=$_REQUEST['adr'];
		$cp=$_REQUEST['cp'];
		$ville=$_REQUEST['ville'];
		$pays=$_REQUEST['pays'];
		$tel=$_REQUEST['tel'];
		$mail=$_REQUEST['mail'];
		
		$msgErreurs = getErreursSaisieClient($login,$motpass1,$motpass2,$nom,$prenom,$dtn,$adr,$cp,$ville,$pays,$tel,$mail);
		
		
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_enregistrer.php");
		}
		else
		{
		$pdo->insertClient($login,$motpass1,$motpass2,$nom,$prenom,$dtn,$adr,$cp,$ville,$pays,$tel,$mail);
		$message = "Vous êtes inscrit !";
		include ("vues/v_message.php");
		include ("vues/v_connexion.php");
		
		}


		
	
	}break;
	
}






?>