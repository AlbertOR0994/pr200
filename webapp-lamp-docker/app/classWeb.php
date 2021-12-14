<?php
declare(strict_types=1);

namespace Alberto\src;

require('./classConexion.php');
class Web {

    public function aperturahtml(){
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./css.css">
            <title>Proyecto PR200</title>
        </head>
        <body>
        CUERPO DE HTML
        <main class="despliegue">';        
    }

    public function cierrehtml(){
       echo '       
       <script src=js.js></script>
       </body>
        </html>';

    }

    public function Piedepagina(){
        echo '<div class="resultado"></div></main>
        <div class="pie"><span class ="textpie">Web daw Pr200<br>05/12/2021</span></div>';
    }

    public function menu(){
        echo '<nav class = "menu">
        <ul>
        <li class = zona> Z100 </li>
        <li class = zona> Z200 </li>
        <li class = zona> Z300 </li>
        <li class = zona> Z400 </li>
        <li class = zona> Z500 </li>
        </ul>
        </nav>';
    }
}