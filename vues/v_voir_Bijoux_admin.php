<div id="produits">
<?php
	
foreach( $lesProduits as $unProduit) 
{
	$id = $unProduit['ID_PRODUIT'];
	$nom = $unProduit['NOM_PRODUIT'];
	$prix=$unProduit['PRIX_PRODUIT'];
	$image = $unProduit['IMAGE_PRODUIT'];
	?>	
	<ul>
			<li><img src="<?php echo $image ?>" alt=image /></li>
			<li><?php echo $nom ?></li>
			 <li><?php echo " : ".$prix." Euros" ?>
			<li><a href=index.php?uc=administrer&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=supprimer> 
			 <img src="images/supprimericon.jpg" TITLE="Supprimer le produit" </li></a>
			 <li><a href=index.php?uc=administrer&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=formmodifier> 
			 <img src="images/modifiericon.png" TITLE="Modifier le produit" </li></a>
			
			
	</ul>
			
			
			
<?php			
}
?>


</div>
