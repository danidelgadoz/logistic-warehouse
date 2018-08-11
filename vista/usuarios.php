<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$query = "select usuario,estado,idempleado,perfil from usuario u,perfil p where u.idperfil=p.idperfil";
$listUsuario = $conexion->query($query);

$tabla = "<table class='marco'>";
$tabla .= <<<FIN
<tr>
<th>Codigo Empleado</th>
<th>Usuario</th>
<th>Estado</th>
<th>Perfil Usuario</th>
<th colspan=3>Acción</th>
</tr>
FIN;

while ($linea = $listUsuario->fetch_assoc()) {
	$tabla .= "<tr>";
	$tabla .= "<td>{$linea['idempleado']}</td>";
	$tabla .= "<td>{$linea['usuario']}</td>";
	$tabla .= "<td>{$linea['estado']}</td>";
	$tabla .= "<td>{$linea['perfil']}</td>";
	$tabla .= "<td><a href='../vista/verusuario.php?usuario={$linea['usuario']}'>Ver</a></td>";
	$tabla .= "<td><a href='../vista/editarusuario.php?usuario={$linea['usuario']}'>Editar</a></td>";
	$tabla .= "<td><a href='../vista/eliminarusuario.php?usuario={$linea['usuario']}'>Eliminar</a></td>";
	$tabla .= "</tr>";
}
$tabla .="</table>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Gestion Almacen</title>
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
				<h2>Usuarios</h2>
				<div>
				<?php echo $tabla; ?>
				</div>
				<div class="divboton">
					<a href="../vista/agregarusuario.php" class="boton">Nuevo Usuario</a>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>