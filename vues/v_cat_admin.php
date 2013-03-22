<ul id="categories">
<li><a href="index.php?uc=administrer&action=FormAjouterProd"> Ajouter un produit	</a></li>
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie['ID_CAT'];
	$libCategorie = $uneCategorie['NOM_CAT'];
	?>	
	<li>
		<a href=index.php?uc=administrer&categorie=<?php echo $idCategorie ?>&action=voirBijoux><?php echo $libCategorie ?></a>
			
	
<?php
}
?>
<li><a href="index.php?uc=administrer&action=voirClients"> gérer les clients et leurs commandes	</a></li>

</ul>	<!--
foreach( $lesClients as $unClient) 
{
	$idClient = $unClient['ID_CLIENT'];	
	$nomClient = $unClient['NOM_CLIENT'];
	
		
	
	

	?>
	</li>
		

	
-->

