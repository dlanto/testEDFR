<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">

<head>
	<meta charset="utf-8" />

</head>

<h1>Accueil</h1>
<h2>Menu</h2>
<a href="/../site EDF/Controleur/menu.php?page=ajoutUser"><p>ajouter un utilisateur</p></a>

<p></p>
<h2>Liste des utilisateurs : </h2>
<table>
<tr>
    <th>N°</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Adresse mail</th>
</tr>
<?php
$it = 1;
foreach ($users as $n) {
	$nom = $n['nom'];
	$prenom = $n['prenom'];
	$mail = $n['mail'];
	echo'<tr>
       <th>'.$it.'</th>
       <th>'.$nom.'</th>
       <th>'.$prenom.'</th>
       <th>'.$mail.'</th>
       <th><a href="/../site EDF/Controleur/menu.php?page=modifUser&mail='.$mail.'&nom='.$nom.'&prenom='.$prenom.'"><button type="button">modifier</button></a>​</th>
       <th><a href="/../site EDF/Controleur/menu.php?page=supUser&mail='.$n['mail'].'&nom='.$n['nom'].'&prenom='.$n['prenom'].'"><button type="button">supprimer</button><br /></th>
   </tr>';

	$it = $it + 1;
}
?>
</table>
