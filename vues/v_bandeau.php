<div id="bandeau">
<!-- Images En-tete -->
<!--<img src="images/menuGauche.gif"	alt="Choisir" title="Choisir"/>-->
<img src="Images/rubon0.jpg"	alt="Bijoux" title="Bijoux"/>
</div>
<!--  Menu haut-->



<ul id="menu">
<?php
if(isset($_SESSION['logincli']))
		{
		?><li><a href="index.php?uc=accueil"> Accueil </a></li>
	<li><a href="index.php?uc=voirBijoux&action=voirCategories"> Catalogue de bijoux </a></li>
		<li><a href="index.php?uc=panier&action=voirPanier"> Voir son panier </a></li>
	<li><a href="index.php?uc=connexion&action=deconnexion" onclick="return confirm('Voulez-vous vraiment vous déconnecter ? ');"> Se deconnecter </a></li>	

	<?php
	}
	else
	{
	
			if(isset($_SESSION['login']))
		{
		?><li><a href="index.php?uc=accueil"> Accueil </a></li>
	<li><a href="index.php?uc=voirBijoux&action=voirCategories"> Catalogue de bijoux </a></li>
	<li><a href="index.php?uc=administrer&action=connectadmin"> Administrer </a></li>
	<li><a href="index.php?uc=connexion&action=deconnexion" onclick="return confirm('Voulez-vous vraiment vous déconnecter ? ');" > Se deconnecter </a></li>	
	
	<?php
	}
	else
	{
	?>
	
	
	
	
	<li><a href="index.php?uc=accueil"> Accueil </a></li>
	<li><a href="index.php?uc=voirBijoux&action=voirCategories1"> Catalogue de bijoux </a></li>
	<li><a href="index.php?uc=connexion&action=se_connecter"> Se connecter </a></li>
	<li><a href="index.php?uc=enregistrement&action=enregistrer"> S'inscrire	</a></li>	
	<li><a href="index.php?uc=administrer&action=connectadmin"> Partie administration </a></li>
<?php
	}
	}
	?>
	</ul>
