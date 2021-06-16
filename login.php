<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormLogin as FormLogin;
$formLogin = new FormLogin();
$html = $formLogin->gestiona();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Login</title>
</head>
<body>

	
<section class="contenidoLogin">

<?= $html ?>

</section>
</body>
</html>
