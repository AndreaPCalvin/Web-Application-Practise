<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\DAOPelicula as DAOPelicula;
use es\fdi\ucm\aw\TOPelicula as TOPelicula;
use es\fdi\ucm\aw\DAOGenero as DAOGenero;
use es\fdi\ucm\aw\TOGenero as TOGenero;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/general.css">
	<link rel="stylesheet" type="text/css" href="css/cssPeliculas.css">
	<title>
		Películas
	</title>
</head>
<body>
	<div class="contenedor">
	<?php
		require('includes/comun/cabecera.php');
    ?>
    <div class="contenido">
	<section class="main">
    <?php
    echo '<div class="flexbottomContainer">';
	if (isset($_SESSION["esAdmin"])) {
		echo '<a href="subirPelicula" class="bottomAdmin" > Añadir película </a>';
	}

	echo '<a href="buscarPelicula" class="bottomAdmin" > Buscar película </a> </div>';

    $generoSet = false;

    if ( $_SESSION['generoFiltrado'] != "0"){
        $gen = $_SESSION['generoFiltrado'];
        $generoSet = true;
    }
    else{
        $listaGenero = DAOGenero::list();
    }

    $listaPeliculas = $_SESSION['pelisFiltradas'];

    if ($generoSet) {
        $genero = DAOGenero::read(intval($gen));
        $cabecera = '<div class="grid-container">
				<div class= "item1"> '.$genero->getTipo().' </div>	
                <div class="grid-subContainer">';
            $i = 0;
            $pelis = '';
			foreach ($listaPeliculas as $peli) {
                if(DAOGenero::comprobarGeneroPelicula($genero->getIdGenero(), $peli->getIdPelicula())){
                    $pelis .= '<div class="grid-sub2Container">  <div class="tituloPelicula"> '. $peli->getTitulo().' </div>  <div class="imagenPelicula"> <a class="nom" href="peliculaConcreta?id='.$peli->getIdPelicula().'"> <img src=' .$peli->getUrlImagen().' alt="imagen ' . $peli->getIdPelicula().'" id="widthImg""> </a> </div> </div>';	
                    $i = $i + 1;
                }
				
                }
                
			
			if($i>0){
				echo $cabecera . $pelis;
            }
            else{
                echo '<div class="grid-container">
				<div class= "item1"> No se han encontrado películas </div>	
                <div class="grid-subContainer">';
            }
				echo '</div> </div>';
    }
    else{
        $encontrada = false;
		foreach ($listaGenero as $genero) {
			$cabecera = '<div class="grid-container">
				<div class= "item1"> '.$genero->getTipo().' </div>	
                <div class="grid-subContainer">';
            $i = 0;
            $pelis = '';
			foreach ($listaPeliculas as $peli) {
                if(DAOGenero::comprobarGeneroPelicula($genero->getIdGenero(), $peli->getIdPelicula())){
                    $pelis .= '<div class="grid-sub2Container">  <div class="tituloPelicula"> '. $peli->getTitulo().' </div>  <div class="imagenPelicula"> <a class="nom" href="peliculaConcreta?id='.$peli->getIdPelicula().'"> <img src=' .$peli->getUrlImagen().' alt="imagen ' . $peli->getIdPelicula().'" id="widthImg""> </a> </div> </div>';	
                    $i = $i + 1;
                    $encontrada = true;
                }
				
                }
                
			
			if($i>0){
				echo $cabecera . $pelis;
				echo '</div> </div>';
			}
        }

        if(!$encontrada){
            echo '<div class="grid-container">
            <div class= "item1"> No se han encontrado películas </div>	
            <div class="grid-subContainer">';
        }
    }
		?>
	</div>
</section>
</div>
	</div>
</body>
</html>
