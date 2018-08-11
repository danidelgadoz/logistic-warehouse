<div>
	<p>Bienvenido,<br><?php echo $_SESSION['usuario']; ?></p>
	<div class="foto">
		<img src="images/user.png" alt="<?php echo $_SESSION['usuario']; ?>" height="100" width="100">
	</div>
	<p align="center"><?php echo $_SESSION['perfil']; ?></p>
	<div>
		<?php echo $enlace; ?>
	</div>
</div>
<ul>
	<li><a href="#">Mision</a></li>
	<li><a href="#">Vision</a></li>
	<li><a href="#">Correo</a></li>
</ul>