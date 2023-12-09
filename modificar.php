<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM jugadores WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

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
				<h3 style="text-align:center">MODIFICAR REGISTRO DE JUGADOR</h3>
				<br>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['correo']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" >
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
							<option value="ARQUERO" <?php if($row['posicion']=='ARQUERO') echo 'selected'; ?>>ARQUERO</option>
							<option value="DEFENSA" <?php if($row['posicion']=='DEFENSA') echo 'selected'; ?>>DEFENSA</option>
							<option value="MEDIOCAMPO" <?php if($row['posicion']=='MEDIOCAMPO') echo 'selected'; ?>>MEDIOCAMPO</option>
							<option value="DELANTERO" <?php if($row['posicion']=='DELANTERO') echo 'selected'; ?>>DELANTERO</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label">¿Categoría a Jugar?</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="categoria" name="categoria" value="1" <?php if($row['categoria']=='1') echo 'checked'; ?>> Máster
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="categoria" name="categoria" value="0" <?php if($row['categoria']=='0') echo 'checked'; ?>> Super Máster
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="intereses" class="col-sm-2 control-label">Características?</label>
					
					<div class="col-sm-10">
						<label class="checkbox-inline">
							<input type="checkbox" id="caracteristicas[]" name="caracteristicas[]" value="Derecho" <?php if(strpos($row['caracteristicas'], "Derecho")!== false) echo 'checked'; ?>> Derecho
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="caracteristicas[]" name="caracteristicas[]" value="Izquierdo" <?php if(strpos($row['caracteristicas'], "Izquierdo")!== false) echo 'checked'; ?>> Izquierdo
						</label>
						
												
						<label class="checkbox-inline">
							<input type="checkbox" id="caracteristicas[]" name="caracteristicas[]" value="Ambidiestro" <?php if(strpos($row['caracteristicas'], "Ambidiestro")!== false) echo 'checked'; ?>> Ambidiestro
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Cancelar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>