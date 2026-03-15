<?php 

	if (isset($_GET["id"])) {
		
		$id = $_GET["id"];
		$response = false;
		$estado = 7; // GUARDAR
		$mysqli = include_once "conexion/conexion.php";

		$sentencia = $mysqli->prepare("UPDATE  usuarios SET estado = $estado where id = $id");		

  		if($sentencia->execute()){
  			$response = true;
  		}
  		else{$response = false;}

  		$sentencia->close();

  		if ($response == true) {
  		?>
  		<script type="text/javascript">
  			window.location.href = "index.php";
  		</script>
  		<?php
  		} else{
  			print_r("error");
  		}

	} else{
		header("location: index.php");
	}

 ?>

   	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PANEL - M M v1</title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<ink rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Gruppo&family=Kumar+One+Outline&family=Londrina+Outline&family=Sriracha&display=swap" rel="stylesheet">
	
</head>
<body>

	<header class="text-center bg-dark">
		<x-sign></x-sign> <x-sign>
		<x-sign>
		  <h2>PANEL M.M  <small>V4.0</small></h2>
		</x-sign>
	</header>


</body>
</html>