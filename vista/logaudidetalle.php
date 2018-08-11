<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$fechaini = !empty($_POST['fechaini'])? $_POST['fechaini'] : '';
$fechafin = !empty($_POST['fechafin'])? $_POST['fechafin'] : '';
$usuario = $_POST['nusuario'];


if ($usuario=='tusuarios' && $fechafin == '' && $fechaini == '') {
  $query = "select * from auditoria";
} else {
	if ($usuario !== 'tusuarios' && $fechafin == '' && $fechaini == '') {
		$query = "select * from auditoria where usuariolog = '$usuario'";
	} else {
		if ($usuario =='tusuarios' && $fechafin !== '' && $fechaini !== '' ){
			$query = "select * from auditoria where fechalog between '$fechaini' and '$fechafin'";
		} else {
			if ($usuario !=='tusuarios' && $fechafin !== '' && $fechaini !== ''){
				$query = "select * from auditoria where usuariolog = '$usuario' and fechalog between '$fechaini' and '$fechafin'";	
			}
		}
	}
}

$listAuditoria = $conexion->query($query);

$tabla = "<table align='center' id='datatables' class='marco'>";
$tabla .= <<<FIN
<thead>
<tr>
<th>Usuario</th>
<th>Id de Empleado</th>
<th>Perfil</th>
<th>Est. Perfil Actual</th>
<th>Direccion IP</th>
<th>Tipo de Accion</th>
<th>Objeto de Accion</th>
<th>Elemento Manipulado</th>
<th>Hora</th>
<th>Fecha</th>
</tr>
</head>
<tbody>
FIN;

while ($linea = $listAuditoria->fetch_assoc()) {

	$usuario = $linea['usuariolog'];
	$queryestado = "select estado from usuario where usuario = '$usuario'";
	$listestado = $conexion->query($queryestado);

	while ( $estadoact = $listestado->fetch_assoc()) {	

	$tabla .= "<tr>";
	$tabla .= "<td>{$linea['usuariolog']}</td>";
	$tabla .= "<td>{$linea['idempleado']}</td>";
	$tabla .= "<td>{$linea['cargolog']}</td>";
	$tabla .= "<td>{$estadoact['estado']}</td>";
	$tabla .= "<td>{$linea['iplog']}</td>";
	$tabla .= "<td>{$linea['accionlog']}</td>";
	$tabla .= "<td>{$linea['objetolog']}</td>";
	$tabla .= "<td>{$linea['codmanipulado']}</td>";
	$tabla .= "<td>{$linea['horalog']}</td>";
	$tabla .= "<td>{$linea['fechalog']}</td>";
	$tabla .= "</tr>";
	}
}
$tabla .="</tbody>";
$tabla .="</table>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
        <title>Sistema de Gestion Almacen</title>
        <link rel="stylesheet" href="../vista/css/style.css">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <script type="text/javascript" src="../controlador/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../controlador/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../controlador/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../controlador/js/TableTools.min.js" type="text/javascript"></script>
        <style type="text/css">
            @import "../vista/css/demo_table_jui.css";
            @import "../vista/css/TableTools.css";
        </style>
        </script>
	<script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $('#datatables').dataTable({
            	"bJQueryUI":true,
                "sPaginationType":"full_numbers",
                "aaSorting":[[9, "desc"],[8, "desc"] ],
                "sDom": 'T<"clear"><"H"lfr>t<"F"ip>',
                "oTableTools": {
				"sSwfPath": "../controlador/swf/copy_csv_xls_pdf.swf"
			}
            });
        });
    </script>
</head>
<body>
	
	<div class="container">
		<div class="header">
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
				<h2>Log de Auditoria</h2>
				<div>
				<?php echo $tabla; ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>