<?php
$parentDir = dirname(__DIR__, 1);
    require_once($parentDir . "/config.php");

use es\fdi\ucm\aw\DAORanking as DAORanking;
use es\fdi\ucm\aw\TORanking as TORanking;


$idEvento = $_REQUEST['idevento'];
$nota = $_REQUEST['nota'];
$idUsuario = $_SESSION['usuario'];

$ranking = new TORanking();
$ranking->setIdEvento($idEvento);
$ranking->setIdUsuario($idUsuario);
$ranking->setNota($nota);

$rankingStorage = DAORanking::read($ranking);


if($rankingStorage->num_rows > 0){
	DAORanking::update($ranking);
}

else {
	DAORanking::create($ranking);
}

echo DAORanking::getNotaMedia($idEvento);
 

?>