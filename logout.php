<?php 
require_once __DIR__.'/includes/config.php';
unset($_SESSION);
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<script>
	function delayRedirect(){
	    var count = 5;
	    setInterval(function(){
	        count--;
	        if (count == 0) {
	            window.location = 'index'; 
	        }
	    },1000);
	}
</script>
	<title>Logout</title>
</head>
<body>
		<div class="contenedor">
	<?php
		require('includes/comun/cabecera.php');
	?>

	<section class="contenido">
					<div class="logoIndex">;
					<img src="media/logo.jpg" alt="logo">
					</div>
		<h1 class="tituloLogout">
			Esperamos que vuelvas pronto a Infocines!
		</h1>
		<br>
		<h3>
			Te vamos a redirigir a la página principal...
			<script>delayRedirect(); </script>
		</h3>
		<br>
		<div class="loading">
			<img src="media/loading.gif" alt="loading">
		</div>
		</h3>
	</section>
</div>
</body>
</html>