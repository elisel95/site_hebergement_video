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
<div class="col text-center video_full <?php echo $_GET['video']; ?>">
    <h2 style="text-align:center;"><?php echo $_GET['video']; ?></h2>
	<video style="margin-left:10%;" controls width="1000">
		<source src="../video/<?php echo $_GET['video'];?>.mp4" type="video/mp4">
    </video>
    <form method="post"><button style="font-size:8px;width:70px;margin:0" name="delete" id="delete" class="delete btn btn-danger">Supprimer</button></form>
            <?php   
               if (isset($_POST['delete'])){
                $bdd = new PDO('mysql:host=localhost;dbname=video_bdd;charset=utf8', 'root', '');
                $bdd->exec("DELETE FROM video WHERE titre='" . $_GET['video'] . "'");

            }?>
</div>
<script type="text/javascript" src="../src/script.js"></script> 
	
</body>

</html>