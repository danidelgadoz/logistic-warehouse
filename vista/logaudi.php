<?php
include('../modelo/conexion.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

$query = "select * from auditoria";


$consultUsu = "select * from usuario";
$resultUsu = $conexion->query($consultUsu);
$nusuario = "<select id='nusuario' name='nusuario'>";
$nusuario .= "<option value='tusuarios'>Todos los Usuarios</option>";
while ($linea = $resultUsu->fetch_assoc()) {
	$nusuario .= "<option value={$linea['usuario']}>{$linea['usuario']}</option>";
}
$nusuario .= "</select>";


//$query = "select * from movimiento";
$listAuditoria = $conexion->query($query);

$tabla = "<table align='center' id='datatables' class='marco'>";
$tabla .= <<<FIN
<thead>
<tr>
<th>Nombre Usuario</th>
<th>Id de Empleado</th>
<th>Perfil de Usuario</th>
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
						<legend><strong>Log de Auditoria</strong></legend>
						

				<form name = "fvalida" action="../vista/logaudidetalle.php" method="POST">
					<label for="">Por Fecha desde : &nbsp;&nbsp;</label>
					<input type="text" id="fechaini" name="fechaini" maxlenght="10">
					<label for="">hasta : </label>
					<input type="text" id="fechafin" name="fechafin" maxlength="10">

				<div class="divformu">
					<label for="usu">Por Usuario : </label>
					<?php echo $nusuario; ?>
				</div>

				<center>
				<div class="divboton">
					<input align="center" type="submit" class="boton" value="Mostrar Log">
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