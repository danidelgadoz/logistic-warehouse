<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$query = "select m.nromovimiento, m.tipomovimiento, m.fechmovimiento, m.horamovimiento, m.usuario, m.stock, m.codigopelicula, p.nombrec, d.nombre from movimiento m , pelicula d, proveedor p where m.codigopelicula= d.codigopelicula and p.idproveedor= m.idproveedor";
//$query = "select * from movimiento";
$listMovimiento = $conexion->query($query);

$consultCliente = "select * from proveedor";
$resultCliente = $conexion->query($consultCliente);
$cliente = "<select id='idproveedor' name='idproveedor'>";
$cliente .= "<option value='tclientes'>TODOS LOS CLIENTES</option>";
while ($linea = $resultCliente->fetch_assoc()) {
	$cliente .= "<option value={$linea['idproveedor']}>{$linea['nombrec']}</option>";
}
$cliente .= "</select>";

$consultPeli = "select * from pelicula";
$resultPeli = $conexion->query($consultPeli);
$pelicula = "<select id='pelicula' name='pelicula'>";
$pelicula .= "<option value='tpeliculas'>TODOS LAS PELICULAS</option>";
while ($linea = $resultPeli->fetch_assoc()) {
	$pelicula .= "<option value={$linea['codigopelicula']}>{$linea['nombre']}</option>";
}
$pelicula .= "</select>";


$tabla = "<table id='datatables' class='marco'>";
$tabla .= <<<FIN
<thead>
<tr>
<th>Codigo Mov.</th>
<th>Codigo Pelicula</th>
<th>Nombre Pelicula</th>
<th>Nombre Cine</th>
<th>Cantidad</th>
<th>Tipo Mov.</th>
<th>Fecha Mov.</th>
<th>Hora Mov.</th>
</tr>
</head>
<tbody>
FIN;

while ($linea = $listMovimiento->fetch_assoc()) {
	$tabla .= "<tr>";
	$tabla .= "<td>{$linea['nromovimiento']}</td>";
	$tabla .= "<td>{$linea['codigopelicula']}</td>";
	$tabla .= "<td>{$linea['nombre']}</td>";
	$tabla .= "<td>{$linea['nombrec']}</td>";
	$tabla .= "<td>{$linea['stock']}</td>";
	$tabla .= "<td>{$linea['tipomovimiento']}</td>";
	$tabla .= "<td>{$linea['fechmovimiento']}</td>";
	$tabla .= "<td>{$linea['horamovimiento']}</td>";
	$tabla .= "</tr>";
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
                "aaSorting":[[6, "desc"],[7, "desc"] ],
                "sDom": 'T<"clear"><"H"lfr>t<"F"ip>',
                "oTableTools": {
				"sSwfPath": "../controlador/swf/copy_csv_xls_pdf.swf"
			}
            });
        });
    </script>

    <script type="text/javascript">
	$(function() {
		$("#fechaini").datepicker({dateFormat: "dd/mm/yy"});
		$("#fechafin").datepicker({dateFormat: "dd/mm/yy"});
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
				<h2>Movimientos</h2>
				 
			<form action="../vista/movimientos.php" method="POST">
				
				<div class="divboton">
					<input type="submit" class="boton" value="Consultar por Filtros">
				</div>

			</form>

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