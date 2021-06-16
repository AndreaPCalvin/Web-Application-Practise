<?php 

/**
 * Configuración del soporte de UTF-8, localización (idioma y país) y zona horaria
 */
ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');


spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'es\\fdi\\ucm\\aw\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/';
    $dirPeliculas = __DIR__ . '/peliculas/';
    $dirForo = __DIR__ . '/foro/';
    // does the class use the namespace prefix?
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    $file2 = $dirPeliculas . str_replace('\\', '/', $relative_class) . '.php';
    $file3 = $dirForo . str_replace('\\', '/', $relative_class) . '.php';
    // if the file exists, require it
    if (file_exists($file)) {
        require_once $file;
    }
    elseif (file_exists($file2)) {
        require_once $file2;
    }
    elseif (file_exists($file3)) {
        require_once $file3;
    }
});

//Poner estas sentencias a la hora de usar las clases para una mayor simplicidad
use es\fdi\ucm\aw\Aplicacion as Aplicacion;
//use es\fdi\ucm\aw\FormularioRegistro as FormularioRegistro;
//use es\fdi\ucm\aw\FormLogin as FormLogin;
//use es\fdi\ucm\aw\Form as Form;

spl_autoload_register();
$Aplicacion = Aplicacion::getSingleton();
//$datosConexionBD = array('host' => 'vm12.db.swarm.test', 'bd' => 'infocine', 'user' => 'InfocinesUCM', 'pass' => '@Infocine1#');
$datosConexionBD = array('host' => 'localhost', 'bd' => 'infocine', 'user' => 'InfocinesUCM', 'pass' => '@Infocine1#');
$Aplicacion->init($datosConexionBD);
