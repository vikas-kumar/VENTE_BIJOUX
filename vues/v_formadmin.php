<html>
<?php
                                                       if(isset($_SESSION["login"]) && $_SESSION["login"] != "")
                                                       {
                                                               ?>
                                                                       <center><form method="POST" action="index.php?uc=administrer&action=deconnexion">
                                                                       <input type="submit" value="Déconnexion">
                                                                       </form></center>
                                                               <?php
                                                       }
                                                       else
                                                       {
                                                       ?>
<form method=post action="index.php?uc=administrer&action=verifadmin">
<table>
<tr>
<td>Login</td><td><input id="login" type="text" name="login" size="10" maxlength="10"></td>
</tr>
<tr>
<td>Mot de Passe</td><td><input id="mdp" type="password" name="mdp" size="10" maxlength="10"></td>
</tr>
<tr>
<td></td><td><input type=submit value=Envoyer><input type=reset value=Effacer></td>
</tr>
</table>
</form>
<?php } ?>
</html>