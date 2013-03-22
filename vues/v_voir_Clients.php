<div id="clients">

<table id="tabClient">
<tr>
<td>Id client</td><td>Login</td><td>mot de passe</td><td>nom</td><td>Prenom</td><td>Date de naissance</td><td>adresse</td><td>code postal</td><td>Ville</td><td>Pays</td><td>Tel</td><td>Mail</td>
</tr>
<?php
	
foreach( $lesClients as $unClient) 
{
//on récupère les données du client 
	$idClient = $unClient['ID_CLIENT'];
	$loginClient=$unClient['LOGIN_CLIENT'];
	$mdpClient=$unClient['MDP_CLIENT'];
	$nomClient=$unClient['NOM_CLIENT'];
	$prenomClient=$unClient['PRENOM_CLIENT'];
	$dtnClient=$unClient['DTN_CLIENT'];
	$adresseClient=$unClient['ADRESSE_CLIENT'];
	$cpClient=$unClient['CP_CLIENT'];
	$villeClient=$unClient['VILLE_CLIENT'];
	$paysClient=$unClient['PAYS_CLIENT'];
	$telClient=$unClient['TEL_CLIENT'];
	$mailClient=$unClient['MAIL_CLIENT'];
	?>	
	<ul>
	

<tr>
<td><?php echo $idClient ?></td> <td><?php echo $loginClient ?></td><td><?php echo $mdpClient ?></td><td><?php echo $nomClient ?></td><td><?php echo $prenomClient ?></td><td><?php echo $dtnClient ?></td><td><?php echo $adresseClient ?></td><td><?php echo $cpClient ?></td><td><?php echo $villeClient ?></td><td><?php echo $paysClient ?></td><td><?php echo $telClient ?></td><td><?php echo $mailClient ?></td>
<td><a href=index.php?uc=administrer&client=<?php echo $idClient ?>&action=supprimerClient><img src="images/supprimericon.jpg" TITLE="Supprimer le Client" </a></td><td><a href=index.php?uc=administrer&client=<?php echo $idClient ?>&action=formmodifierClient><img src="images/modifiericon.png" TITLE="Modifier le Client"</a></td>
<td><a href=index.php?uc=administrer&client=<?php echo $idClient ?>&action=voirCommande><img src="images/icone-commande.jpg" TITLE="Voir les commandes" </a></td>
</tr>




	
			
			
	</ul>
			
			
			
<?php			
}
?>
</table> 

</div>
