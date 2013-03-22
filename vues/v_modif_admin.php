<html>
<form method=post action="index.php?uc=administrer&action=modifier">

<?php

	$idproduit = $_REQUEST['produit'];
$unProduit = $pdo->getUnProduitsDuTableau($idproduit);

	$id = $unProduit['ID_PRODUIT'];
	$nom = $unProduit['NOM_PRODUIT'];
	$prix=$unProduit['PRIX_PRODUIT'];
	$image = $unProduit['IMAGE_PRODUIT'];

	?>
	Modification de votre Produit:
	<ul>
			<li><img src="<?php echo $image ?>" alt=image /></li>
			<li><?php echo "nom : ".$nom ?></li>
			 <li><?php echo " prix : ".$prix." Euros" ?></li>
			

			
	</ul>		
			
			</br>
			Nom
			<input id="nom" type="text" name="nom" value="<?php echo $nom ?>">
			</br>
			Prix
			<input id="prix" type="text" name="prix" value="<?php echo $prix ?>">
			</br>
			<input id="id" type="hidden" name="id" value="<?php echo $idproduit ?>">

<input type=submit value=Modifier>
<input type=reset value=Effacer>
</form>
</html>