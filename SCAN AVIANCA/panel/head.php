<?php session_start(); ?>
<?php 
	$v = rand(9,99999);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PANEL AV - M M v2</title>

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

	}else{
		?>
		<script>
			alert("debe iniciar sesion");
			window.location.href = "index.php";
			
		</script>
		<?php
	}
?>

<body>

	<header class="text-center bg-dark">
		<x-sign></x-sign> <x-sign>
		<x-sign>
		  <h2>PANEL AVIANCA <small>V 2.0</small> | M.M</h2>
		  
		</x-sign>
	</header>