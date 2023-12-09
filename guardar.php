<?php
	
	require 'conexion.php';
	
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$equipo = $_POST['equipo'];
	$jugador = $_POST['nombre'];
	$posicion = $_POST['posicion'];
	$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : 0;
	$caracteristicas = isset($_POST['caracteristicas']) ? $_POST['caracteristicas'] : null;
	
	$arraycaracteristicas = null;
	
	$num_array = count($caracteristicas);
	$contador = 0;
	
	if($num_array>0){
		foreach ($caracteristicas as $key => $value) {
			if ($contador != $num_array-1)
			$arraycaracteristicas .= $value.' ';
			else
			$arraycaracteristicas .= $value;
			$contador++;
		}
	}
	
	
	$sql = "INSERT INTO jugadores (nombre, correo, equipo, telefono, posicion, categoria, caracteristicas) VALUES ('$nombre', '$email', '$equipo','$telefono', '$posicion', '$categoria', '$arraycaracteristicas')";
	$resultado = $mysqli->query($sql);

?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link rel="stylesheet" href="estilos.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<img src="imagenes/correcto.png" width="60" height="60">
						<br>
						<h3>Registro Agregado con éxito!!</h3>
						
						<?php } else { ?>
						<img src="imagenes/error.png" width="60" height="60">
						<br>
						<h3>Error al guardar!!</h3>
						 						
					<?php } ?>
					
					<a href="index.php" class="btn btn-primary">Continuar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
