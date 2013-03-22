<table>
<tr>
<td>Référence Produit</td><td>Nom Produit</td><td>Prix Produit (€)</td>
</tr>
<?php


	$p = 0;
foreach($lesProduits as $unProduit) 
{
//on récupère les données de la commande
	
	$idProd = $unProduit['ID_PRODUIT'];
	$nomProd = $unProduit['NOM_PRODUIT'];
	$prixProd = $unProduit['PRIX_PRODUIT'];
	
	
	$p = $p + $prixProd;
	?>	
	<ul>
	

<tr>
<td><?php echo $idProd ?></td><td><?php echo $nomProd ?></td><td><?php echo $prixProd ?></td>

</tr>




	
			
			
	</ul>
			
			
			
<?php	
}
echo $p;
?>
</table>