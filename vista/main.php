<?php
include('../modelo/valida.php');
include('../modelo/conexion.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesión</a>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Administración de Almacén BBYD</title>
	<link rel="stylesheet" href="../vista/css/style.css">
</head>
<body>
	<div class="container">
		<div class="header">	
			<?php include('../vista/include/header.php'); ?>
		</div>
		<div class="menu-div">
			<?php include('../vista/include/menu.php'); ?>
		</div>
		<div class="sidebar">
			<div class="menuside">
				<?php include('../vista/include/sidebar.php'); ?>
			</div>
		</div>
		<div class="content">
			<div class="main">
				<h2>Módulo de Gestion Almacén</h2>
				<p>Desde este módulo usted podrá informarse acerca de las transacciones hechas en el Almacen asi como poder realizar consultas
				 y ver reportes. Para navegar por estas ópciones favor de hacer clic en las opciones del menu desplegable que se encuentra en la parte superior.</p>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>