<?php
namespace Alberto\src;

require('./classWeb.php');

$website = new Web();

$website->aperturahtml();


$website->menu();
$website->mostrarzonas('127.0.0.1','pr200','localhost','');
$website->piedepagina();


$website->cierrehtml();

