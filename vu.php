<?php
try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=video_bdd;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table video
$sqlQuery = 'SELECT * FROM video';
$videosStatement = $mysqlClient->prepare($sqlQuery);
$videosStatement->execute();
$videos = $videosStatement->fetchAll();

// On affiche chaque recette une à une
