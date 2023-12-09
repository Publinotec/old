<?php
	
	require 'conexion.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM jugadores WHERE id = '$id'";
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
				<h3>Registro eliminado!!</h3>
				
				<?php } else { ?>
				<h3>No se pudo eliminar!!</h3>
				<?php } ?>
				
				<a href="index.php" class="btn btn-primary">Continuar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
