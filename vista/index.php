<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Administración de Almacen By</title>
	<link rel="stylesheet" href="../vista/css/login.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<?php include('../vista/include/header.php'); ?>
		</div>
		<div class="content">
			<form action="../modelo/login.php" class="login" method="POST">
				<h2>Log in</h2>
				<div class="user-div">
					<label for="user"><span>Usuario : </span></label>
					<input type="text" id="user" placeholder="Nombre o Usuario" name="user">
				</div>
				<div class="pass-div">
					<label for="password"><span>Password : </span></label>
					<input type="password" id="password" placeholder="Password" name="password">
				</div>
				<div class="button">
					<input type="submit" value="Ingresar">
				</div>
				<div class="msj">
					<?php
					if (!empty($_SESSION['mensaje'])) {
						echo $_SESSION['mensaje'];
					}
					?>
				</div>
			</form>
		</div>
		<div class="footer">
			<?php include('../vista/include/footer.php'); ?>
		</div>
	</div>
</body>
</html>