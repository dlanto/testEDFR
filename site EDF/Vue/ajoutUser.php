<!DOCTYPE html>
<html>

<head></head>

<body>
<h1>ajouter un utilisateur :</h1>
<form action="action.php?ac=ajouter" method="post">
  <fieldset>
    <?php
    $nom = "";
    $prenom = "";
    $mail = "";
    $tel = "";
    $mdp = "";

    if (empty($_POST['nom']) == FALSE){
    	$nom = $_POST['nom'];
    	$prenom = $_POST['prenom'];
    	$mail = $_POST['mail'];
    	$tel = $_POST['telephone'];
    	$mdp = $_POST['motdepasse'];
    }

    echo'Nom:<br>
    <input type="text" name="nom" value="'.$nom.'"><br>
    Prenom:<br>
    <input type="text" name="prenom" value="'.$prenom.'"><br>
    Email:<br>
    <input type="text" name="mail" value="'.$mail.'"><br>
    Telephone:<br>
    <input type="text" name="telephone" value="'.$tel.'"><br>
    Mot de passe:<br>
    <input type="password" name="motdepasse" value="'.$mdp.'"><br><br>
    <input type="submit" value="Enregistrer le nouvel utilisateur">'
    ?>
  </fieldset>
</form>

<a href="/../site EDF/Controleur/action.php?ac=retour">retour</a>

</body>
</html>