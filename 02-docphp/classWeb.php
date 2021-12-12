<?php
declare(strict_types=1);

namespace Alberto\src;

// Clase usada para formar nuestro HTML de la web

class Web {

    // Apertura de nuestro HTML + etiqueta de despliegue Main 
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

    // HTML de cierre del documento.
    public function cierrehtml(){
       echo '       </body>
        </html>';

    }
    // HTML que contiene nuestro pie de pagina
    public function Piedepagina(){
        echo '<div class="resultado"></div></main>
        <div class="pie"><span class ="textpie">Web daw Pr200<br>05/12/2021</span></div>';
    }

    // Menú con las distintas zonas preparadas para usarse con JS
    public function menu(){
        echo '<nav class = "menu">
        <ul>
        <li id = zona> Z100 </li>
        <li id = zona> Z200 </li>
        <li id = zona> Z300 </li>
        <li id = zona> Z400 </li>
        <li id = zona> Z500 </li>
        </ul>
        </nav>';
    }

    // Muestra de zonas de nuestra base de datos probada en local
    public function mostrarzonas(){


    $servername = '127.0.0.1';
    $database = 'pr200';
    $username = 'root';
    $password = '';
    // Creación de la conexion con la bd
    $bd = mysqli_connect($servername, $username, $password, $database);
    // Comprobación de la bd
    if (!$bd) {
        die("conexión fallida: " . mysqli_connect_error());
    }
    echo "Conectado";

    //Preparar: 
    $sentencia = $bd->prepare("SELECT * FROM `zonas` ");
    //Ejecutar:
    $sentencia->execute();
    //Resultados:
    $sentencia->bind_result($id,$zona,$subzona);
        while ($sentencia->fetch()){
            echo "<div class = zonas>$id , $zona , $subzona</div>";
        }
    $sentencia->close();
    
    //Preparar: 
    $sentencia = $bd->prepare("SELECT * FROM `s2` ");
    //Ejecutar:
    $sentencia->execute();
    //Resultados:
    $sentencia->bind_result($hora,$id,$pulsacion);
        while ($sentencia->fetch()){
            echo  " <div class = s2>$hora , $id , $pulsacion</div>";
        }
    $sentencia->close();

    //Preparar: 
    $sentencia = $bd->prepare("SELECT * FROM `s4` ");
    //Ejecutar:
    $sentencia->execute();
    //Resultados:
    $sentencia->bind_result($humedad,$id,$temperatura);
        while ($sentencia->fetch()){
            echo "<div class = s4>$humedad, $id , $temperatura</div>";
        }
    $sentencia->close();
    mysqli_close($bd);
    }

    public function insertarzonas(){
        $servername = '127.0.0.1';
        $database = 'pr200';
        $username = 'root';
        $password = '';
        // Creación de la conexion con la bd
        $bd = mysqli_connect($servername, $username, $password, $database);
        // comprobación
        if (!$bd) {
            die("conexión fallida: " . mysqli_connect_error());
        }
        echo "Conectado";

    
    //Variables de arduino.
    $temperatura = $_GET['t'];
    $humedad = $_GET['h'];
    
    //Preparar: 
    $sentencia = $bd->prepare("INSERT INTO zonas FROM `zonas` ");
    //Ejecutar:
    $sentencia->execute();
    //Resultados:
    $sentencia->bind_result($id,$zona,$subzona);
        while ($sentencia->fetch()){
            echo "<div class = zonas>$id , $zona , $subzona</div>";
        }
    $sentencia->close();
    }
    
}