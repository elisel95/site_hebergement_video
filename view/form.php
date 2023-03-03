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
        <!-- FORM DEBUT-->

		<form class="row form_video" id="form" action="" method="post" enctype="multipart/form-data">
			<div class="mb-3">
			  <span class="form-label">Titre</span>
			  <input type="text" id="title" aria-label="title"  name="title" class="form-control" required>
			</div>
            <div class="mb-3">
                <label for="video" class="form-label">Vidéo</label>
                <input class="form-control" id="url" type="file" name="video" id="video" required>
            </div>

			<div class="input-group justify-content">
				<button type="submit" id="validate" name="valid" class="btn btn-info" >Valider</button>
            </div>
            <?php

    if (isset($_POST['valid'])){
        $titre = $_POST["title"];
        date_default_timezone_set('Europe/Paris');
        $dateT = date('y-m-d h:i:s');

        $fichier = pathinfo($_FILES['video']['name']);
        $extension_upload = $fichier['extension'];
        $extensions_autorisees = array('mp4');
        move_uploaded_file($_FILES['video']['tmp_name'], '../video/' .$titre.'.mp4');

        $file = 'video/'.$titre.'.mp4';

        if(!empty($titre)  && !empty($file)){
        $bdd = new PDO('mysql:host=localhost;dbname=video_bdd;charset=utf8', 'root', '');
        $bdd->exec("INSERT INTO video (titre,urlV,dateT) VALUES ('$titre','$file','$dateT')");
        };
    }
        ?>
		</form>
		<!-- FORM FIN -->
        

		
	</div> <!-- FIN container -->
	
	<footer>

	</footer>
    <script type="text/javascript" src="../src/script.js"></script> 
	
</body>

</html>