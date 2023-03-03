
<?php
include 'index.php';

$titre = $_POST["title"];
date_default_timezone_set('Europe/Paris');
$dateT = date('y-m-d h:i:s');

$fichier = pathinfo($_FILES['video']['name']);
$extension_upload = $fichier['extension'];
$extensions_autorisees = array('mp4');
move_uploaded_file($_FILES['video']['tmp_name'], 'video/' . basename($_FILES['video']['name']));

$file = $_FILES['video']['name'];

if(!empty($titre)  && !empty($file)){
$bdd = new PDO('mysql:host=localhost;dbname=video_bdd;charset=utf8', 'root', '');
$bdd->exec("INSERT INTO video (titre,urlV,dateT) VALUES ('$titre','$file','$dateT')");

};
?>