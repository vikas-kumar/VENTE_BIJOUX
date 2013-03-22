<html>
<?php
//on voit le sous menu des catégories
			$lesCategories = $pdo->getLesCategories();
			$lesMatieres = 	$pdo->getLesMatieres();
			$lesClients = $pdo->getLesClients();										
			include("vues/v_cat_admin.php");	
			
		?>
<form method=post action="index.php?uc=administrer&action=ajouterProduit">
<FIELDSET style="border-style: groove; border-width: 3px; ">
<LEGEND align=center> Création d'un nouveau produit </LEGEND>

Catégorie : <SELECT name="categ_prod">
                       <?php
                       foreach($lesCategories as $uneCategorie)
                       {
                               $cat = $uneCategorie['NOM_CAT'];
                       ?>
                               <option><?php echo $cat ?>
                       <?php
                       }
                       ?>
</select>
Matiere : <select name="mat_prod">
<?php 
foreach( $lesMatieres as $uneMatiere)
{
                               $mat = $uneMatiere['NOM_MATIERE'];
							   ?>
<option><?php echo $mat ?>
   <?php
}
?>
</select>

 
Nom : <input type="text" name="nom_prod" >
Prix : <input type="text" name="prix_prod" >
Couleur : <input type="text" name="couleur_prod" ><br>
Caractéristiques : <br><TEXTAREA NAME="carac_prod" COLS=40 ROWS=3></TEXTAREA><br>
Image : <input type="file" name="img_prod" /><br>
Quantité initiale dispo : <input type="text" name="qte_prod" >
<br><br>
<input type=submit value=Créer>
<input type=reset value=Effacer>

</FIELDSET>
</form>


<form method=post action="index.php?uc=administrer&action=ajouterCateg">
<FIELDSET style="border-style: groove; border-width: 3px; ">
<LEGEND align=center> Lancer une nouvelle catégorie </LEGEND>
Nom de la nouvelle catégorie : <input type="text" name="nom_categ" >
<input type=submit value=Créer>
<input type=reset value=Effacer>
</FIELDSET>
</form>

<form method=post action="index.php?uc=administrer&action=ajouterMatiere">
<FIELDSET style="border-style: groove; border-width: 3px; ">
<LEGEND align=center> Créer une nouvelle matière </LEGEND>
Nouvelle matière : <input type="text" name="nom_mat" >
<input type=submit value=Créer>
<input type=reset value=Effacer>
</FIELDSET>
</form>

</html>