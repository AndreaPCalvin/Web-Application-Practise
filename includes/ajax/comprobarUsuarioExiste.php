<?php
$parentDir = dirname(__DIR__, 1);
    require_once($parentDir . "/config.php");
	use es\fdi\ucm\aw\DAOUsuario as DAOUsuario;

	$miApodo = $_GET["apodo"];
	$existe = DAOUsuario::existeUsuario($miApodo);
	
	if($existe){
		echo "usada";
	}
	else{
		echo "libre";
	}
	
?>