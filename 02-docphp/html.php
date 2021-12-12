<?php
//Nombre de espacio para composer
namespace Alberto\src;

//Llamada al archivo necesario para crear el objeto 
require('./classWeb.php');
//Creación del objeto
$website = new Web();
//Llamadas del objeto a las funciones de la clase Web.
$website->aperturahtml();
$website->menu();
$website->mostrarzonas('127.0.0.1','pr200','localhost','');
$website->piedepagina();
$website->cierrehtml();

