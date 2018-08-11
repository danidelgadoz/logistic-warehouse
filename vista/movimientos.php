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
                "aaSorting":[[0, "asc"]],
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

	<script type="text/javascript">
		$.fn.dataTableExt.afnFiltering.push(
		    function( oSettings, aData, iDataIndex ) {

		    	$("#fechaini").datepicker({dateFormat: "dd/mm/yy"});
            	$("#fechafin").datepicker({dateFormat: "dd/mm/yy"});
            	
		        var iFini = document.getElementById('fechini').value;
		        var iFfin = document.getElementById('fechfin').value;
		        var iStartDateCol = 6;
		        var iEndDateCol = 6;
		         
		        

		        iFini=iFini.substring(6,10) + iFini.substring(3,5)+ iFini.substring(0,2)
		        iFfin=iFfin.substring(6,10) + iFfin.substring(3,5)+ iFfin.substring(0,2)       
		         
		        var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
		        var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);
		         
		        if ( iFini == "" && iFfin == "" )
		        {
		            return true;
		        }
		        else if ( iFini <= datofini && iFfin == "")
		        {
		            return true;
		        }
		        else if ( iFfin >= datoffin && iFini == "")
		        {
		            return true;
		        }
		        else if (iFini <= datofini && iFfin >= datoffin)
		        {
		            return true;
		        }
		        return false;
		    }
		);

		$(document).ready(function() {
			/* Initialise datatables */
			var oTable = $('#datatables').dataTable();
			
			/* Add event listeners to the two range filtering inputs */
			$('#fechini').keyup( function() { oTable.fnDraw(); } );
			$('#fechfin').keyup( function() { oTable.fnDraw(); } );
			
		} );

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
				<fieldset class="data">
						<legend><strong>Filtrar Movimientos</strong></legend>
						

				<form action="../vista/reportemovi.php" method="POST" target="_blank">
					<label for="">Por Fecha desde : &nbsp;&nbsp;</label>
					<input type="text" id="fechaini" name="fechaini" maxlenght="10">
					<label for="">hasta : </label>
					<input type="text" id="fechafin" name="fechafin" maxlength="10">

				<div class="divformu">
					<label for="nombre">Por Pelicula : </label>
					<?php echo $pelicula; ?>
				</div>

				<div class="divformu">
					<label for="cliente">Por Cliente : </label>
					<?php echo $cliente; ?>
				</div>
			
				<div class="divformu">
						<label for="tipomovimiento">Tipo de movimiento : </label>
						<select id="tipomovimiento" name="tipomovimiento">
							<option value="tmovimientos">TODOS LOS MOVIMIENTOS</option>
							<option value="Entrante">ENTRANTE</option>
							<option value="Saliente">SALIENTE</option>
						</select>
				</div>
				<center>
				<div class="divboton">
					<input align="center" type="submit" class="boton" value="Crear Reporte">
					<a href = "../vista/prereportemovi.php"> <input align="center" type="button" class="boton" value="Regresar"> </a>
				</div>
			</center>
			</form>
			</div>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>