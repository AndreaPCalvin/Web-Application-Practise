<?php
$parentDir = dirname(__DIR__, 1);
    require_once($parentDir . "/config.php");

use es\fdi\ucm\aw\DAOMeGusta as DAOMeGusta;
use es\fdi\ucm\aw\TOMeGusta as TOMeGusta;


$idEvento = $_REQUEST['idevento'];
$idUsuario = $_SESSION['usuario'];



$meGusta = new TOMeGusta();
$meGusta->setIdEvento($idEvento);
$meGusta->setIdUsuario($idUsuario);

$meGustaStorage = DAOMeGusta::read($meGusta);


if($meGustaStorage->num_rows > 0){
	echo 'delete';
	DAOMeGusta::delete($meGusta);
}

else {
	echo 'create';
	DAOMeGusta::create($meGusta);
}



?>