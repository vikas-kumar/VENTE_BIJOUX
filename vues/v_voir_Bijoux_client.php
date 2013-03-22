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
                       <li><a href=index.php?uc=voirBijoux&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=ajouterAuPanier> 
                        <img src="images/ajouterpanier.jpg" TITLE="Ajouter au panier" </li></a>
                       
       </ul>
                       
                       
                       
<?php                        
}
?>
</div>