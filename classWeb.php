<?php
declare(strict_types=1);

namespace Alberto\src;


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
       echo '       </body>
        </html>';

    }

    public function Piedepagina(){
        echo '<div class="resultado"></div></main>
        <div class="pie"><span class ="textpie">Web daw Pr200<br>05/12/2021</span></div>';
    }
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


    public function mostrarzonas(){


    $servername = '127.0.0.1';
    $database = 'pr200';
    $username = 'root';
    $password = '';
    // Create connection
    $bd = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$bd) {
        die("conexión fallida: " . mysqli_connect_error());
    }
    echo "Conectado";

    //Preparar: 
    $sentencia = $bd->prepare("SELECT * FROM `zonas` ");
    $sentencia->execute();
    $sentencia->bind_result($id,$zona,$subzona);
        while ($sentencia->fetch()){
            echo "<div class = zonas>$id , $zona , $subzona</div>";
        }
    $sentencia->close();
    
    //Preparar: 
    $sentencia = $bd->prepare("SELECT * FROM `s2` ");
    $sentencia->execute();
    $sentencia->bind_result($hora,$id,$pulsacion);
        while ($sentencia->fetch()){
            echo  " <div class = s2>$hora , $id , $pulsacion</div>";
        }
    $sentencia->close();

    //Preparar: 
    $sentencia = $bd->prepare("SELECT * FROM `s4` ");
    $sentencia->execute();
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
        // Create connection
        $bd = mysqli_connect($servername, $username, $password, $database);
        // Check connection
        if (!$bd) {
            die("conexión fallida: " . mysqli_connect_error());
        }
        echo "Conectado";

    //Preparar:
    $temperatura = $_GET['t'];
    $humedad = $_GET['h'];
     
    $sentencia = $bd->prepare("INSERT INTO zonas FROM `zonas` ");
    $sentencia->execute();
    $sentencia->bind_result($id,$zona,$subzona);
        while ($sentencia->fetch()){
            echo "<div class = zonas>$id , $zona , $subzona</div>";
        }
    $sentencia->close();
    }
    
}