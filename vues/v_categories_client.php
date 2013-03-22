<ul id="categories">
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie['ID_CAT'];
	$libCategorie = $uneCategorie['NOM_CAT'];
	?>
	<li>
		<a href=index.php?uc=connexion&categorie=<?php echo $idCategorie ?>&action=voir_Bijoux2><?php echo $libCategorie ?></a>
	</li>
<?php
}
?>	
<li><a href="index.php?uc=voirBijoux&action=voirCommandes"> Voir ses commandes	</a></li>
</ul>