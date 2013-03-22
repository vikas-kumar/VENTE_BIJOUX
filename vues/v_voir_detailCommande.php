<table id="tabClient">
<tr>
<td>Id client</td><td>numéro commande</td><td>Référence Produit</td><td>Nom Produit</td><td>Prix Produit</td>
</tr>
<?php


	
foreach($lesProduits as $unProduit) 
{
//on récupère les données de la commande
	
	$idProd = $unProduit['ID_PRODUIT'];
	$nomProd = $unProduit['NOM_PRODUIT'];
	$prixProd = $unProduit['PRIX_PRODUIT'];
	
	
	?>	
	<ul>
	

<tr>
<td><?php echo $idClient ?></td><td><?php echo $idCommande ?></td><td><?php echo $idProd ?></td><td><?php echo $nomProd ?></td><td><?php echo $prixProd ?></td>

</tr>




	
			
			
	</ul>
			
			
			
<?php	
}
?>
</table>