<?php
namespace Alberto\src;

require('./classWeb.php');

$website = new Web();

$website->aperturahtml();


$website->menu();
$website->mostrarzonas();
$website->insertarzonas();
$website->zonasdiv();
$website->piedepagina();


$website->cierrehtml();

