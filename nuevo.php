<?php

// Establezco la conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=jugadores;charset=utf8";
$username = "root";
$password = "Palamor_5";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

// Consulto la tabla para obtener los equipos registrados
	$query = "SELECT idequipo, equipo FROM equipos";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	$equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link rel="stylesheet" href="estilos.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	

		<style>
		body {
			 background-image: url("imagenes/cancha4.jpg"); 
			 background-size: cover;
			 background-repeat: no-repeat;
			 background-position: top;
			 color: white;
		 }
	  	</style>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
			<img src="imagenes/publinot.png" width="110" height="70">
				<h3 style="text-align:center">AGREGAR JUGADOR</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
					</div>
				</div>

				<select class="form-control" id="equipo" name="equipo">
					<option value="">Seleccione equipo</option>
					<?php foreach ($equipos as $equipo) : ?>
						<option value="<?php echo $equipo['idequipo']; ?>"><?php echo $equipo['equipo']; ?></option>
					<?php endforeach; ?>
				</select>
							
				<div class="form-group">
					<label for="posicion" class="col-sm-2 control-label">Posición</label>
					<div class="col-sm-10">
						<select class="form-control" id="posicion" name="posicion">
							<option value="ARQUERO">ARQUERO</option>
							<option value="DEFENSA">DEFENSA</option>
							<option value="MEDIOCAMPO">MEDIOCAMPO</option>
							<option value="DELANTERO">DELANTERO</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label">¿Categoría a Jugar?</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="categoria" name="categoria" value="1" checked> Máster
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="categoria" name="categoria" value="0"> Super Máster
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="caracteristicas" class="col-sm-2 control-label">Características</label>
					
					<div class="col-sm-10">
						<label class="checkbox-inline">
							<input type="checkbox" id="caracteristicas[]" name="caracteristicas[]" value="Derecho" checked> Derecho
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="caracteristicas[]" name="caracteristicas[]" value="Izquierdo"> Izquierdo
						</label>
						
						
						<label class="checkbox-inline">
							<input type="checkbox" id="caracteristicas[]" name="caracteristicas[]" value="Ambidiestro"> Ambidiestro
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>