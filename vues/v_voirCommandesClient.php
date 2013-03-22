<table id="tabClient">
<tr>
<td>numéro de la commande</td><td>date de la commande</td><td>état de la commande</td><td>voir produits commandés</td>
</tr>
<?php


	
foreach($lesCommandes as $uneCommande) 
{
//on récupère les données de la commande
	
	$numCo = $uneCommande['ID_PANIER'];
	$dateCo = $uneCommande['DATE_PANIER'];
	$numEtat = $uneCommande['ID_ETAT'];
	
	if ($numEtat == 0)
	{
		$nameEtat = "En cours de traitement";
	}
	else
	{
	if ($numEtat == 1)
	{
		$nameEtat = "En cours de livraison";
	}
	else
	{
	if($numEtat == 2)
	{
		$nameEtat = "Produit livré";
	}
	}
	}
	
	
	?>	
	<ul>
	

<tr>
<td><?php echo $numCo ?></td><td><?php echo $dateCo ?></td><td><?php echo $nameEtat ?></td>
<td><a href=index.php?uc=voirBijoux&commande=<?php echo $numCo ?>&action=voirDetailCommandeClient><img src="images/list.gif" TITLE="Voir les produits commandés" </a></td>
</tr>




	
			
			
	</ul>
			
			
			
<?php	
}
?>
</table>