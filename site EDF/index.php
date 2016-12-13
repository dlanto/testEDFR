<?php

session_start();

require('/../site EDF/config.php');
//require('/../site EDFR/Modele/requete.php');
//$bdd = connectionBDO();

if(!empty($_GET['page']) AND is_file('Controleur/'.$_GET['page'].'.php')){
include('Controleur/'.$_GET['page'].'.php');
}
else{
	include('Controleur/index.php');
}

?>