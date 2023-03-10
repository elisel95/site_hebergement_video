<!DOCTYPE html>
<html lang="fr">
<head>
	<meta chartset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--BOOTSTRAP + JQUERY-->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
	<!-- -->
	<link rel="stylesheet" type="text/css" href="../src/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Site videos</title>
	
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Site VIDEO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view/form.php">formulaire</a>
        </li>
        </ul>
    </div>
    </nav>

    <div id="container">
        <form class="form-inline my-2 my-lg-0" method="POST">
            <input class="form-control mr-sm-2" type="search" name="titres" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 " name="search" type="submit">Rechercher</button>
        </form>

		<?php
		try
		{
			// On se connecte ?? MySQL
			$mysqlClient = new PDO('mysql:host=localhost;dbname=video_bdd;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arr??te tout
				die('Erreur : '.$e->getMessage());
		}

		// Si tout va bien, on peut continuer

		// On r??cup??re tout le contenu de la table video
		$sqlQuery = 'SELECT * FROM video ORDER BY dateT DESC LIMIT 12';
		$videosStatement = $mysqlClient->prepare($sqlQuery);
		$videosStatement->execute();
		$videos = $videosStatement->fetchAll();

		//SYSTEME DE RECHERCHE
		if (isset($_POST['search'])){
		$titre = $_POST["titres"];
		$sql = "SELECT * FROM video WHERE titre = '" . $_POST["titres"] . "'";
		$searchStatement = $mysqlClient->prepare($sql);
		$searchStatement->execute();
		$searchs = $searchStatement->fetchAll();
		?><div class="row">
		<?php foreach ($searchs as $searche) {
		?>
			<div class="col text-center <?php echo $searche['titre']; ?>"><h2><?php echo $searche['titre']; ?></h2>
				<video controls width="250">
					<source src="<?php echo $searche['urlV']; ?>" type="video/mp4">
				</video>
				<a target=_blank href="view/video.php?video=<?php echo $searche['titre']; ?>&id=<?php echo $searche['id'] ?>" title="<?php echo $searche['titre']; ?>">Afficher la vid??o</a>
			</div>
		<?php
		}}
		?>

		<hr><hr>

	<div class="row">
		<?php foreach ($videos as $video) {
		?>
			<div class="col text-center <?php echo $video['titre']; ?>"><h2><?php echo $video['titre']; ?></h2>
				<video controls width="250">
					<source src="<?php echo $video['urlV']; ?>" type="video/mp4">
				</video>
				<a target=_blank href="view/video.php?video=<?php echo $video['titre']; ?>&id=<?php echo $video['id']; ?>" title="<?php echo $video['titre']; ?>">Afficher la vid??o</a>
			</div>
		<?php
		}
		?>
		<br>
		<a class="text-center" href='view/all.php'>Voir toutes les videos</a>
	</div>

</div>
<script type="text/javascript" src="../src/script.js"></script> 
	
</body>

</html>