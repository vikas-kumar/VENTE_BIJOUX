<table id="tabClient">
<tr>
<td>Id client</td><td>numéro commande</td><td>date</td>
</tr>
<?php


	
foreach($lesCommandes as $uneCommande) 
{
//on récupère les données de la commande
	
	$numCo = $uneCommande['ID_PANIER'];
	$dateCo = $uneCommande['DATE_PANIER'];
	
	
	?>	
	<ul>
	
<FORM method =POST action = "index.php?uc=administrer&action=confirmerEtat">
<tr>
<td><?php echo $idClient ?></td><td><?php echo $numCo ?></td><td><?php echo $dateCo ?></td>
<td><a href=index.php?uc=administrer&client=<?php echo $idClient ?>&commande=<?php echo $numCo ?>&action=voirDetailCommande><img src="images/list.gif" TITLE="Voir les produits commandés" </a></td>

<td><SELECT name="nomEtat" size="1">
<?php	
foreach($recupeEtat as $unEtat)	
{
$Etat = $unEtat['nomEtat'];	?>

<OPTION><?php echo $Etat ?> <?php	
} 
// Faut récupe nomEtat et $numCo
?>
</td>
<input type=hidden name="commande" value=<?php echo $numCo ?>> 
<td> <!--<a href=index.php?uc=administrer&commande=<?php //echo $numCo ?>&nomEtat=<?php //echo $nomEtat ?>&action=confirmerEtat>Changer l'état</a> -->
<INPUT type="submit" value="Changer l'état"> </td>
</tr>




	
			
			
	</ul>
			
			
			
<?php	
}
?>
</table>