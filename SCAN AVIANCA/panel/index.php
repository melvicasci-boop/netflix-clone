<?php   session_start();
        $v = rand(9,99999);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PANEL - MM AVIANCA</title>

	<link rel="stylesheet" href="css/style.css?v=<?php echo $v; ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Gruppo&family=Kumar+One+Outline&family=Londrina+Outline&family=Sriracha&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://kit.fontawesome.com/ea71e944fa.js" crossorigin="anonymous"></script>
</head>

<?php
	
	if(isset($_SESSION["login"])){
        ?>
		<script>
		
			window.location.href = "home.php";
			
		</script>
		<?php
	}
?>

<body style=" background-color: #111 ;">

    <header class="text-center mt-4">
		<x-sign></x-sign> <x-sign>
		<x-sign>
		  <h2>PANEL AVIANCA <small>V 1.0</small></h2>
          <h3><small>M.M</small></h3>
		</x-sign>
	</header>
	

	<div class="container mt-5">
        <div style="margin:0 auto; width: 400px; ">
            <form action="index.php" method="post">
                <div class="form-group">
                    <input type="text" name="user" class="form-control" placeholder="Usuario">
                </div>
                <div class="form-group">
                    <input type="password" name="pass" class="form-control" placeholder="Contraseña">
                </div>
                <div class="form-group">
                    <x-sign></x-sign> <x-sign>
		            <x-sign>
                    <button type="submit" name="login" class="btn btn-danger btn-block" style="font-weight: bold;">INGRESAR</button>
                    </x-sign>
                </div>
            </form>
        </div>
    </div>


    <?php

include('../conexion/index.php');

if (isset($_POST["login"])) {
    // Obtener los datos del formulario
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Consulta para verificar las credenciales
    $query = "SELECT * FROM login WHERE usuario = '$username' AND password = '$password'";
    $result = $mysqli->query($query);

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION["login"] = "login";
        ?>
            <script>
                window.location.href = "home.php";
            </script>
        <?php
    } else {
        // Credenciales inválidas
        echo "<script>alert('Nombre de usuario o contraseña incorrectos.');</script>";
    }
}

?>