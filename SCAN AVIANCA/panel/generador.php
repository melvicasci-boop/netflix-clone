<?php require "head.php"; ?>

<div class="container mt-4">
	<div style=" width: 100%; display: flex; justify-content: space-between;">
	   <h4>Generar números aleatorios</h4>
	   <a href="home.php" class="btn btn-danger">Regresar</a>
	</div>
	<hr>

	<div class="card">
		<div class="card-body">
			<form action="generador.php" method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Cantidad de números</label>
							<input type="number" name="cantidad" placeholder="1000" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Operador 1</label>
							<input type="number" name="inicial" placeholder="314" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Operador 2</label>
							<input type="number" name="final" placeholder="318" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
					<div class="form-group">
							<label for="">Prefijo </label>
							<select name="prefijo" id="" class="form-control">
								<option value="+57">Con signo (+57)</option>
								<option value="57">Sin signo (57)</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Opcion de Prefijo</label>
							<select name="separado" id="" class="form-control">
								<option value="false">Junto (+573003458969)</option>
								<option value="true">Separado (+57 3003458969)</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Separar por:</label>
							<select name="salto" id="" class="form-control">
								<option value="1">Por coma (,)</option>
								<option value="2">Punto y coma (;)</option>
								<option value="3">Por salto de espacio</option>
							</select>
						</div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-md-4">
					<div class="form-group">
							
							<button type="submit" name="generar" class="btn btn-primary form-control">
								Genear números
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
	if(isset($_POST["generar"])){
		$cantidad = $_POST["cantidad"];
		$inicial = $_POST["inicial"];
		$final = $_POST["final"];
		$prefijo = $_POST["prefijo"];
		$separado = $_POST["separado"];
		$salto = $_POST["salto"];
		?>
		<div class="container mt-4">
			<div class="card">
				<div class="card-body">
				<button class="btn btn-dark" id="boton-copiar">Copiar al Portapapeles</button>
				<hr>
				<div id="contenido-a-copiar">
				<?php 
						for ($i=0; $i < $cantidad; $i++) { 
							$num = rand(1000000, 9999999);
							$in = rand($inicial, $final);
							
							if($salto == 1){
								if($separado === "true"){
									echo $prefijo.$in.$num;
									echo ",";
								} else{
									echo $prefijo.$in.$num;
									echo ",";
								}
							} else if($salto == 2){
								if($separado === "true"){
									echo $prefijo.$in.$num;
									echo ";";
								} else{
									echo $prefijo.$in.$num;
									echo ";";
								}
							} else if($salto == 3){
								if($separado === "true"){
									echo $prefijo.$in.$num;
									echo "</br>";
								} else{
									echo $prefijo.$in.$num;
									echo "</br>";
								}
							}
						}
					?>
				</div>
				
					
				</div>
			</div>
		</div>
		<?php
	}
?>

		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
	 <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	

		<script type="text/javascript" src="js/scriptv31.js"></script>
	</body>
	</html>