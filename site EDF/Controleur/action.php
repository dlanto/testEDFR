<?php

$action = $_GET['ac'];
include('/../Modele/requete.php');
include('/../config.php');
$reponse = "";


if($action == "ajouter"){
	
	$reponse = verifAjout($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['telephone'], $_POST['motdepasse']);

	if($reponse == "correct"){
		ajouterUser($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['telephone'], $_POST['motdepasse']);
		$users = afficherUsers();
		
		include('/../Vue/index.php');
		echo 'utilisateur '.$_POST['nom'].' '.$_POST['prenom'].' ajouté'; 
	}
	else{
		include('/../Vue/ajoutUser.php');
		echo('ERREUR : '.$reponse);
	}
}
elseif ($action == "modifier") {
	
	$reponse = verifAjout2($_GET['mailInit'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['telephone'], $_POST['motdepasse']);

	if($reponse == "correct" OR $reponse == "Adresse mail déjà utilisée"){
		modifUser($_GET['mailInit'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['telephone'], $_POST['motdepasse']);
	
		$users = afficherUsers();
		
		include('/../Vue/index.php');
	}	
	else{
		include('/../Vue/modifUser.php');
			
		echo('ERREUR : '.$reponse);
	}
}
elseif($action == "retour"){
	

	$users = afficherUsers();
	
	include('/../Vue/index.php');
}


?>