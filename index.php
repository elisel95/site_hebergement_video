<!DOCTYPE html>
<html lang="fr">
<head>
	<meta chartset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--BOOTSTRAP + JQUERY-->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
	<!-- -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Site videos</title>
	
</head>

<body>


	<header>

	</header>

	<div id="container" class="main">
		
		<h1>Site hébergement de vidéos</h1>
        <!-- FORM DEBUT-->

		<form class="row form_video" id="form" action="form.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
			  <span class="form-label">Titre</span>
			  <input type="text" id="title" aria-label="title"  name="title" class="form-control" required>
			</div>
            <div class="mb-3">
                <label for="video" class="form-label">Vidéo</label>
                <input class="form-control" id="url" type="file" name="video" id="video" required>
            </div>

			<div class="input-group justify-content">
				<button type="submit" id="validate" class="btn btn-info" >Valider</button>
			</div>
		</form>
		<!-- FORM FIN -->

		
	</div> <!-- FIN container -->
	
	<footer>

	</footer>
    <script type="text/javascript" src="script.js"></script> 
	
</body>

</html>