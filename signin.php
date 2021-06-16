<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormSignin as FormSignin;

$formSignin = new FormSignin();
$html = $formSignin->gestiona();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Crear cuenta</title>
	<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
	<script src="js/signin.js"></script>
</head>
<body>
		
	<section class="contenidoLogin">
		<?= $html ?>
	</section>
</div>
</body>
</html>