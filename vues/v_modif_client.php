<html>
<form method=post action="index.php?uc=administrer&action=modifierClient">

<?php

	$idclient = $_REQUEST['client'];
	$unclient = $pdo->getUnclientDuTableau($idclient);

	$id = $unclient['ID_CLIENT'];
	$mdp = $unclient['MDP_CLIENT'];
	$adresse=$unclient['ADRESSE_CLIENT'];
	$cp = $unclient['CP_CLIENT'];
	$pays = $unclient['PAYS_CLIENT'];
	$tel = $unclient['TEL_CLIENT'];
	$mail = $unclient['MAIL_CLIENT'];

	?>
	Modification de votre client:
	<ul>
			
			<li><?php echo "mot de passe : ".$mdp ?></li>
			 <li><?php echo " adresse : ".$adresse ?></li>
			 <li><?php echo " code postal : ".$cp ?></li>
			 <li><?php echo " pays : ".$pays ?></li>
			 <li><?php echo " téléphone : ".$tel ?></li>
			 <li><?php echo " mail : ".$mail ?></li>
			

			
	</ul>		
			
			</br>
			Mot De Passe			<input id="mdp" type="text" name="mdp" value="<?php echo $mdp ?>">
			</br>
			Adresse
			<input id="adresse" type="text" name="adresse" value="<?php echo $adresse ?>">
			</br>
			</br>
			Code Postal
			<input id="cp" type="text" name="cp" value="<?php echo $cp ?>">
			</br>
			</br>
			Pays
			<input id="pays" type="text" name="pays" value="<?php echo $pays ?>">
			</br>
			</br>
			Téléphone
			<input id="tel" type="text" name="tel" value="<?php echo $tel ?>">
			</br>
			</br>
			Mail
			<input id="mail" type="text" name="mail" value="<?php echo $mail ?>">
			</br>
			<input id="id" type="hidden" name="id" value="<?php echo $idclient ?>">

<input type=submit value=Modifier>
<input type=reset value=Effacer>
</form>
</html>