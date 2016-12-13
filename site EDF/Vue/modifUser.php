<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

</head>

<body>
<h1>ajouter un utilisateur :</h1>
<?php
    
    if (empty($_GET['nom']) == FALSE){
    echo'<form action="action.php?ac=modifier&mailInit='.$_GET['mail'].'" method="post">
    <fieldset>';

    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $mail = $_GET['mail'];
    include('/../Modele/requete.php');
    
    $tel = getInfo("telephone", $mail);
    $mdp = getInfo("motDePasse", $mail);


    echo'Nom:<br>
    <input type="text" name="nom" value="'.$nom.'"><br>
    Prenom:<br>
    <input type="text" name="prenom" value="'.$prenom.'"><br>
    Email:<br>
    <input type="text" name="mail" value="'.$mail.'"><br>
    Telephone:<br>';
    

    }
    
    else{
    echo'<form action="action.php?ac=modifier&mailInit='.$_POST['mail'].'" method="post">
    <fieldset>';

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $tel = $_POST['telephone'];
        $mdp = $_POST['motdepasse'];
    
        echo'Nom:<br>
    <input type="text" name="nom" value="'.$nom.'"><br>
    Prenom:<br>
    <input type="text" name="prenom" value="'.$prenom.'"><br>
    Email:<br>
    <input type="text" name="mail" value="'.$mail.'"><br>
    Telephone:<br>';
    }

    if(empty($_GET['nom']) == FALSE)
    {
    echo '<input type="text" name="telephone" value="'.$tel['telephone'].'"><br>
    Mot de passe:<br>
    <input type="password" name="motdepasse" value="'.$mdp['motDePasse'].'"><br><br>
    <input type="submit" value="Enregistrer les modifications">';
    }
    else
    {
    echo '<input type="text" name="telephone" value="'.$tel.'"><br>
    Mot de passe:<br>
    <input type="password" name="motdepasse" value="'.$mdp.'"><br><br>
    <input type="submit" value="Enregistrer le nouvel utilisateur">';
    }
    

    ?>
  </fieldset>
</form>
<a href="../Controleur/action.php?ac=retour">retour</a>
</body>
</html>
