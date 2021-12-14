<?php
namespace Alberto\src;

require('./classWeb.php');

$humedad = $_GET['h'];
$temperatura = $_GET['t'];
$mysql = new Conectar('pr200', 'localhost', 'root', '');

echo $humedad;
echo $temperatura;


$website = new Web();
$website->aperturahtml();
$website->menu();
echo "<div class = datos>";
$mysql->insertarzonas($temperatura,$humedad);
$mysql->mostrarzonas();
echo "</div>";
$website->piedepagina();
$website->cierrehtml();

