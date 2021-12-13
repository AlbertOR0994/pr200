<?php

declare(strict_types=1);

namespace Alberto\src;

class Conectar{

    private string $bd;
    private string $server; 
    private string $user;
    private string $password; 

    public function __construct(string $bd, string $server, string $user, string $password){
        $this->bd = $bd;
        $this->server = $server;
        $this->user = $user;
        $this->password = $password;
    }
    public function mostrarzonas(){
    
        // Crear conexion
        $bd = mysqli_connect($this->server,$this->user,$this->password,$this->bd);
        // Comprobar conexion
        
        if (!$bd) {
            die("conexión fallida: " . mysqli_connect_error());
        }
        echo "Conectado";
    
        //Preparar: 
        $sentencia = $bd->prepare("SELECT * FROM `zonas` ");
        $sentencia->execute();
        $sentencia->bind_result($id,$zona,$subzona);
        $i = 0;
            while ($sentencia->fetch()){
                $i++;
                echo "<div class = 'zona$i'>$id , $zona , $subzona</div>";
            }
    
        $sentencia->close();
        
        //Preparar: 
        $sentencia1 = $bd->prepare("SELECT s2.id,s2.hora,s2.pulsacion, zonas.zona FROM `s2` INNER JOIN zonas ON s2.id = zonas.id;");
        $sentencia1->execute();
        $sentencia1->bind_result($id,$hora,$pulsacion,$zona);
        $i = 0;
        while ($sentencia1->fetch()){
            $i++;
                echo  "<div class ='pul$i'>$id , $hora, $pulsacion , $zona</div>";
            }
    
        $sentencia1->close();
    
        //Preparar: 
        $sentencia = $bd->prepare("SELECT s4.id, s4.temperatura, s4.humedad, zonas.zona FROM `s4` INNER JOIN zonas ON s4.id = zonas.id;");
        $sentencia->execute();
        $sentencia->bind_result($id, $temperatura, $humedad, $zona);
        $i = 0;
            while ($sentencia->fetch()){
                $i++;
                echo "<div class ='temp$i'>$id, $temperatura, $humedad, $zona</div>";
            }
        $sentencia->close();
        mysqli_close($bd);
        }
    
        public function insertarzonas(){
            // Crear conexion
            $bd = mysqli_connect($this->bd,$this->server,$this->user,$this->password);
            // Comprobar conexion
            if (!$bd) {
                die("conexión fallida: " . mysqli_connect_error());
            }
            echo "Conectado";
    
        //Preparar:
        $temperatura = $_GET['t'];
        $humedad = $_GET['h'];
         
        $sentencia = $bd->prepare("INSERT INTO s4 (`humedad`,`Temperatura`) VALUES ($humedad,$temperatura)");
        $sentencia->execute();
        $sentencia->bind_result($humeda,$temperaturas);
        $i = 0;
            while ($sentencia->fetch()){
                $i++;
                echo "<div class ='temp$i'> $humedad , $temperatura</div>";
            }
        $sentencia->close();
        }

}