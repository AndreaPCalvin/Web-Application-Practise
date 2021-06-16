<?php
$parentDir = dirname(__DIR__, 1);
    require_once($parentDir . "/config.php");
	use es\fdi\ucm\aw\DAOUsuario as DAOUsuario;

	$miEmail = $_GET["email"];
	$existe = DAOUsuario::existeEmail($miEmail);
	
	if($existe){
		echo "usada";
	}
	else{
		echo "libre";
	}
	
?>