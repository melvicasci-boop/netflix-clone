<?php
 
  if (isset($_GET["id"])) {

   
	include "conexion/conexion.php";
   	$id = $_GET["id"];

    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();
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
				<a href="usuario.php?id=<?php echo $id; ?> " class="btn btn-info">RECARGAR</a>
				<a href="index.php" class="btn btn-danger">Regresar</a>
			</div>
		</div>
		<hr>

		<?php 

			echo '<table class="table">
				<thead>
				<tr class="active">
					<th>Usuario</th>
					<th>Clave</th>
					<th>Dinamica</th>
					<th>Estado</th>
					<th>Fecha</th>
				</tr> </thead> <tbody>';
				
			
				
				?>
					<td><?php echo $usuario['usuario']; ?></td>
					<td><?php echo $usuario['clave']; ?></td>
					<td><?php echo $usuario['dinamica']; ?></td>
					<td><?php 
						if ($usuario['estado'] == 1) {
							echo '<p class="text-danger"><strong>EN ESPERA</strong></p>';
						} else if ($usuario['estado'] == 2){
							echo '<p class="text-danger"><strong>CALVE O USUARIO INCORRECTO</strong></p>';
						} else if ($usuario['estado'] == 3){
							echo '<p class="text-danger"><strong>INGRESANDO DINAMICA</strong></p>';
						} else if ($usuario['estado'] == 4){
							echo '<p class="text-danger"><strong>DINAMICA INCORRECTA</strong></p>';
						} else if ($usuario['estado'] == 5){
							echo '<p class="text-danger"><strong>DATOS CORRECTOS</strong></p>';
						}
					 ?></td>
					<td><?php echo $usuario['fecha']; ?></td>
				<?php
				
				echo '</tbody> </table>'; 
		 ?>



		<hr>
		<h4>OPCIONES</h4>

		<div class="row mt-4">
			<div class="col-md-4">
				<form method="get" action="gestion.php">
					<input type="hidden" name="id_user" value="<?php echo $_GET["id"]; ?>">
					<input type="hidden" name="op" value="1">
					<button class="btn btn-primary">CLAVE INCORRECTA</button>
				</form>
			</div>
			<div class="col-md-4">
				<form method="get" action="gestion.php">
					<input type="hidden" name="id_user" value="<?php echo $_GET["id"]; ?>">
					<input type="hidden" name="op" value="2">
					<button class="btn btn-dark">DINAMICA INCORRECTA</button>
				</form>
			</div>
			<div class="col-md-4">
				<form method="get" action="gestion.php">
					<input type="hidden" name="id_user" value="<?php echo $_GET["id"]; ?>">
					<input type="hidden" name="op" value="3">
					<button class="btn btn-success">DATOS CORRECTOS</button>
				</form>
			</div>
		</div>

		

	</div>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>	
	<script type="text/javascript" src="js/scriptv1.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
</body>
</html>


  	<?php
  }else{
  	header("location: index.php");
  }


 ?>
