<ul id="categories">
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie['ID_CAT'];
	$libCategorie = $uneCategorie['NOM_CAT'];
	?>
	<li>
		<a href=index.php?uc=voirBijoux&categorie=<?php echo $idCategorie ?>&action=voir_Bijoux><?php echo $libCategorie ?></a>
	</li>
<?php
}
?>
</ul>