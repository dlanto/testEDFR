<?php

function afficherUsers(){	// retourne la liste de tous les utilisateurs enregistrés dans la BDD
	
	$bdd = connectionBDO();
	$users = array();

	$req = $bdd->query('SELECT * FROM users');

	while($data = $req->fetch()){
		$users[] = $data;
		
	}
	
	return $users;

	$bdd = null;
}

function supprimerUser($mail){		// supprime un utilisateur de la base en précisant son addresse mail


	$bdd = connectionBDO();

	$pdoQuery = "DELETE FROM users WHERE mail='".$mail."'";
    $delete = $bdd->exec($pdoQuery);

    $bdd = null;
}

function connectionBDO(){	// permet de ce connecter à la BDD en utilisant les constantes du fichier config.php


	$bdd = new PDO('mysql:host='.BDDhost.';dbname='.BDDname.'', BDDuser, BDDpass);
	return $bdd;

}

function getInfo($nomColonne, $mail){	// retourne une information d'un utilisateur (nom, tel ...) en précisant son mail

	$bdd = connectionBDO();

	$pdoQuery = "SELECT `".$nomColonne."` FROM `users` WHERE `mail`='".$mail."'";

	$req = $bdd->query($pdoQuery);
	$bdd = null;

	$data = $req->fetch();

	return $data;
}

function modifUser($mailInit, $nom, $prenom, $mail, $telephone, $motDePasse){	// permet de modifier un utilisateur dans la BDD
	$bdd = connectionBDO();

	$pdoQuery="UPDATE users SET nom = :nom, 
            prenom = :prenom, 
            mail = :mail,  
            telephone = :telephone,  
            motDePasse = :motDePasse  
            WHERE mail = :mailInit";

    $pdoResult = $bdd->prepare($pdoQuery);
	$pdoResult->bindParam(':nom', $nom, PDO::PARAM_STR);
	$pdoResult->bindParam(':prenom', $prenom, PDO::PARAM_STR);
	$pdoResult->bindParam(':mail', $mail, PDO::PARAM_STR);
	$pdoResult->bindParam(':telephone', $telephone, PDO::PARAM_STR);
	$pdoResult->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);

	$pdoResult->bindParam(':mailInit', $mailInit, PDO::PARAM_STR);

	$pdoResult->execute(); 

	$bdd = null;

}

function ajouterUser($nom, $prenom, $mail, $telephone, $motDePasse){	// permet d'ajouter un utilisateur dans la BDD

	
	$bdd = connectionBDO();

	$pdoQuery="INSERT INTO `users`(`nom`, `prenom`, `mail`, `telephone`, `motDePasse`) VALUES (:nom, :prenom, :mail, :telephone, :motDePasse)";

	$pdoResult = $bdd->prepare($pdoQuery);

	$pdoExec = $pdoResult->execute(array(":nom"=>$nom, ":prenom"=>$prenom, ":mail"=>$mail, ":telephone"=>$telephone, ":motDePasse"=>$motDePasse));

	if($pdoResult){
		//echo 'Données transmises';
	}
	else{
		//echo 'Données non transmises';
	}
}

function verifAjout($nom, $prenom, $mail, $telephone, $motDePasse){		// permet de vérifier si les informations du futur utilisateurs sont												 							// conformes dans le cas d'un ajout d'utilisateur à la BDD
	$bdd = connectionBDO();

	$req = $bdd->query('SELECT * FROM users');

	if(ctype_alpha($nom) == FALSE){
		return "Le nom est vide ou comporte des chiffres";
	}

	if(ctype_alpha($prenom) == FALSE){
		return "Le prenom est vide ou comport des chiffres";
	}

	foreach ($req as $n) {
		if($mail == $n['mail']){
			return "Adresse mail déjà utilisée";
		}		
	}

	if(filter_var($mail, FILTER_VALIDATE_EMAIL) == FALSE){
		return "l'addresse email n'est pas au bon format";
	}

	if(is_numeric($telephone) == FALSE){
		return "Le numéro de téléphone n'est pas valide";
	}

	if(strlen($motDePasse) < 5){
		return "Mot de passe trop court (minimum 5 caractères)";			
	}

	return "correct";

	$bdd = null;
}

function verifAjout2($mailInit, $nom, $prenom, $mail, $telephone, $motDePasse){ // permet de vérifier si les informations du futur utilisateurs 																				// sont conformes dans le cas d'une modifiation d'un utilisateur
	$bdd = connectionBDO();

	$req = $bdd->query('SELECT * FROM users');

	if(ctype_alpha($nom) == FALSE){
		return "Le nom est vide ou comporte des chiffres";
	}

	if(ctype_alpha($prenom) == FALSE){
		return "Le prenom est vide ou comport des chiffres";
	}

	if($mailInit != $mail){
		foreach ($req as $n) {
			if($mail == $n['mail']){
				echo 'l\'addresse mail : '.$mail.'est déjà utilisée';
				return "Adresse mail déjà utilisée";
			}		
		}
	}


	if(filter_var($mail, FILTER_VALIDATE_EMAIL) == FALSE){
		return "l'addresse email n'est pas au bon format";
	}

	if(is_numeric($telephone) == FALSE){
		echo($telephone.'contient que des chiffres !');
		return "Le numéro de téléphone n'est pas valide";
	}

	if(strlen($motDePasse) < 5){
		return "Mot de passe trop court (minimum 5 caractères)";			
	}

	return "correct";

	$bdd = null;
}

?>