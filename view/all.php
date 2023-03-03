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
            <a class="nav-link" href="../index.php">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="form.php">formulaire</a>
        </li>
        </ul>
    </div>
    </nav>

    <div id="container">

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

		
		?>

	<div class="row">
		<?php foreach ($videos as $video) {
		?>
			<div class="col text-center"><h2><?php echo $video['titre']; ?></h2>
				<video controls width="250">
					<source src="../<?php echo $video['urlV']; ?>" type="video/mp4">
                </video>
                <a target=_blank href="video.php?video=<?php echo $video['titre']; ?>" title="<?php echo $video['titre']; ?>">Afficher la vidéo</a>
                
            </div>
		<?php
		}
		?>
	</div>

</div>
<script type="text/javascript" src="../src/script.js"></script> 
	
</body>

</html>