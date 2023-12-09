<?php
	
	require 'conexion.php';

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$equipo = $_POST['equipo'];
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
	
	$sql = "UPDATE jugadores SET nombre='$nombre', correo='$email', telefono='$telefono', equipo='$equipo',posicion='$posicion', categoria='$categoria', caracteristicas='$arraycaracteristicas' WHERE id = '$id'";
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
				<h3>Registro Modificado correctamente!!</h3>				
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<img src="imagenes/error.png" alt="">
				<?php } ?>
				
				<a href="index.php" class="btn btn-primary">Continuar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
