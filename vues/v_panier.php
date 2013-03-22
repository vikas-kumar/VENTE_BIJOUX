<img src="images/panier.gif"        alt="Panier" title="panier"/>
<FORM method = 'POST' action = "index.php?uc=panier&action=confirmerCommande">
<?php

foreach( $lesProduitsDuPanier as $unProduit) 
{
       $Id = $unProduit['ID_PRODUIT'];
       $description = $unProduit['CARAC_PRODUIT'];
       $image = $unProduit['IMAGE_PRODUIT'];
       $prix = $unProduit['PRIX_PRODUIT'];
       
       ?>
       <p>
       <img src="<?php echo $image ?>" alt=image width=100        height=100 />
       <?php
               echo        $description."($prix Euros)";
               ?>


       <a href="index.php?uc=panier&produit=<?php echo $Id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer ce bijou ?');">
       <img src="images/retirerpanier.png" TITLE="Retirer du panier" ></a>



       
       </p>
       <?php
}
?>

<br><input type="submit" value="Envoyer la Commande" > 
<input type="button" value="Séléctionner un autre produit" onclick="history.go(-1)">

</FORM>
