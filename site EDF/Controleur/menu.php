<?php

$page = $_GET['page'];

switch($page){

	case "ajoutUser":
		include('/../Vue/ajoutUser.php');
		break;

	case "modifUser":
		include('/../config.php');
		include('/../Vue/modifUser.php');
		
		break;

	case "supUser":
		include('/../Modele/requete.php');
		include('/../config.php');
		supprimerUser($_GET['mail']);
		
		$users = afficherUsers();
		
		include('/../Vue/index.php');
		
		echo('L\'utilisateur : '.$_GET['nom'].' '.$_GET['prenom'].' à été supprimé');
		break;

}

?>