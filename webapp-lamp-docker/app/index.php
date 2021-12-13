<?php
namespace Alberto\src;

require('./classWeb.php');

$website = new Web();
$mysql = new Conectar('pr200','mysql','root','rpass');

$website->aperturahtml();


$website->menu();
echo "<div class = datos>";
$website->datoszona();
echo "</div>>";
$website->piedepagina();
$website->cierrehtml();

