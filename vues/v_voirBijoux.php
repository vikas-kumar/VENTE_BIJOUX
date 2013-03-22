<div id="produits">
<?php
	
foreach( $lesProduits as $unProduit) 
{
	$id = $unProduit['id_produit'];
	$nom = $unProduit['nom_produit'];
	$prix=$unProduit['prix_produit'];
	$image = $unProduit['image_produit'];
	?>	
	<ul>
			<li><img src="<?php echo $image ?>" alt=image /></li>
			<li><?php echo $nom ?></li>
			 <li><?php echo " : ".$prix." Euros" ?>
			<li><a href=index.php?uc=voirBijoux&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=ajouterAuPanier> 
			 <img src="images/ajouterpanier.jpg" TITLE="Ajouter au panier" </li></a>
			
	</ul>
			
			
			
<?php			
}
?>
</div>