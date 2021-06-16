<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\Usuario as Usuario;
use es\fdi\ucm\aw\DAOAbono as DAOAbono;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/cuenta.css">
	<title>Mi perfil</title>
</head>
<body>
	<div class="contenedor">
	<?php
		require('includes/comun/cabecera.php');
	?>

	<section class="form_wrap">
	<?php
		$miCuenta = Usuario::buscaUsuario($_SESSION['usuario']);
		?>

		<section class="contact_info">
			<section class="info_title">
				<?php echo '<h2> '. $miCuenta->getApodo() . '</h2> <br>';

				echo '<img src=" '.$miCuenta->getUrlFoto().'" id="imagenPerfil">';
				?>

				<br> <br><a class="button" href="modificarCuenta"> Editar perfil</a><br> <br> <br>
				<a class="button" href="modificarPassword"> Cambiar contraseña</a><br> <br> <br>
				<a class="button" href="borrarCuenta">Eliminar Cuenta</a>
			</section>
		</section>

		<div class="form_contact">
		<div class="user_info">

		<?php

		if (isset($_SESSION['modificarPerfil'])) {
			echo '<h2> Datos modificados con éxito.</h2>';
			unset($_SESSION['modificarPerfil']);
		}
		elseif (isset($_SESSION['modificarPassword'])) {
			echo '<h2> Contraseña modificada con éxito.</h2>';
			unset($_SESSION['modificarPassword']);
		}
		
		
		echo "<h2>Información de la cuenta </h2><br>";
		echo "<p>Nickname: " . $miCuenta->getApodo() . "</p><br>";

		echo "<p>Nombre completo: " . $miCuenta->getNombre() ." " . $miCuenta->getApellidos() . "</p><br>";

		echo "<p>Email: " . $miCuenta->getEmail() . "</p><br>";

		echo "<p>Abono: " . $miCuenta->getTipoAbono() . "</p><br>";

		echo "<p>Inicio del abono: " . $miCuenta->getInicioAbono() . "</p><br>";

		$DAOabono = new DAOAbono();
		$abono = $DAOabono->read($miCuenta->getTipoAbono());

		$fechaActual = strtotime(date('Y-m-d', time()));
		$fechaCaducidad = strtotime($miCuenta->getInicioAbono()."+ ".$abono->getDuracion()." days");

		if ($fechaCaducidad < $fechaActual) {
			echo "<p>Su abono ha caducado el día: " . date('Y-m-d', $fechaCaducidad) . " por favor, renuévelo antes de dicha fecha si desea mantener sus servicios.</p>";
		} else {
			echo "<p> Fecha de caducidad del abono: " . date('Y-m-d',$fechaCaducidad) . "</p>";
		}

	?>
		</div>
	</div>
</section>
</div>
</body>
</html>
