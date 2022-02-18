<?php 

    namespace Alberto\Pr;

    class Webbd {

        private string $bd = "pr200";
        private string $user = "root";
        private string $password= "";
        private string $server= "localhost";


        public function Mostrarbd(){
        
            // Crear conexion
            $bd = mysqli_connect($this->server,$this->user,$this->password,$this->bd);
            // Comprobar conexion
            
            if (!$bd) {
                die("conexión fallida: " . mysqli_connect_error());
            }
        
            //Preparar: 
            $sentencia = $bd->prepare("SELECT `idzona`,`nombre` FROM zonas ");
            $sentencia->execute();
            $sentencia->bind_result($idzona, $nombre);

            while ($sentencia->fetch()){
            echo "<p> $idzona - $nombre </p>";
            }
            $sentencia->close();
            }

        public function Insertardatoszona(int $idzona, string $nombre){
        
            // Crear conexion
            $bd = mysqli_connect($this->server,$this->user,$this->password,$this->bd);
            // Comprobar conexion
            
            if (!$bd) {
                die("conexión fallida: " . mysqli_connect_error());
            }
            
                //Preparar: 
                $sentencia = $bd->prepare("INSERT INTO `zonas` (`idzona`,`nombre`) VALUES(?,?)"); 
                $sentencia->bind_param('is', $idzona , $nombre);

                //introducir datos mediante method POST en un formulario
                //ejecutar

                $sentencia->execute();

                //cerrar

                $sentencia->close();
                $bd->close();
        }

        public function Insertardatostienda(int $idtienda, int $idzona, int $idarea, string $nombre){
        
            // Crear conexion
            $bd = mysqli_connect($this->server,$this->user,$this->password,$this->bd);
            // Comprobar conexion
            
            if (!$bd) {
                die("conexión fallida: " . mysqli_connect_error());
            }
            
                //Preparar: 
                $sentencia = $bd->prepare("INSERT INTO `tienda` (`idtienda`,`idzona`,`idarea`,`nombre`) VALUES(?,?,?,?)"); 
                $sentencia->bind_param('iiis', $idtienda, $idzona, $idarea, $nombre);

                //introducir datos mediante method POST en un formulario
                //ejecutar

                $sentencia->execute();

                //cerrar

                $sentencia->close();
                $bd->close();
        }

        public function Insertarsensor(int $idsens, int $idzona, string $tipo){
        
            // Crear conexion
            $bd = mysqli_connect($this->server,$this->user,$this->password,$this->bd);
            // Comprobar conexion
            
            if (!$bd) {
                die("conexión fallida: " . mysqli_connect_error());
            }
            
                //Preparar: 
                $sentencia = $bd->prepare("INSERT INTO `sensores` (`idsens`,`idzona`,`tipo`) VALUES(?,?,?)"); 
                $sentencia->bind_param('iis', $idsens , $idzona, $tipo);

                //introducir datos mediante method POST en un formulario
                //ejecutar

                $sentencia->execute();

                //cerrar

                $sentencia->close();
                $bd->close();
        }

        public function Insertareas(int $idarea, int $idzona, string $nombre, int $plazas){
        
            // Crear conexion
            $bd = mysqli_connect($this->server,$this->user,$this->password,$this->bd);
            // Comprobar conexion
            
            if (!$bd) {
                die("conexión fallida: " . mysqli_connect_error());
            }
            
                //Preparar: 
                $sentencia = $bd->prepare("INSERT INTO `areas` (`idarea`,`idzona`,`nombre`,`plazas`) VALUES(?,?,?,?)"); 
                $sentencia->bind_param('iisi', $idarea , $idzona, $nombre, $plazas);

                //introducir datos mediante method POST en un formulario
                //ejecutar

                $sentencia->execute();

                //cerrar

                $sentencia->close();
                $bd->close();
        }

        public function Insertardatosensor($fecha , int $idsens, $idtarjeta,string $magnitud,string $nombre, $valor){
        
            // Crear conexion
            $bd = mysqli_connect($this->server,$this->user,$this->password,$this->bd);
            // Comprobar conexion
            
            if (!$bd) {
                die("conexión fallida: " . mysqli_connect_error());
            }
                
                //Preparar: 
                $sentencia = $bd->prepare("INSERT INTO `datosensor` (`fecha`,`idsens`,`idtarjeta`,`magnitud`,`nombre`,`valor`) VALUES(?,?,?,?,?,?)"); 
                $sentencia->bind_param('sisssi', $fecha , $idsens, $idtarjeta,$nombre,$magnitud,$valor);

                //introducir datos mediante method POST en un formulario
                //ejecutar

                $sentencia->execute();

                //cerrar

                $sentencia->close();
                $bd->close();
        }

        public function Crearjson(){

            // Crear conexion
            $bd = mysqli_connect($this->server,$this->user,$this->password,$this->bd);
            // Comprobar conexion
            
            if (!$bd) {
                die("conexión fallida: " . mysqli_connect_error());
            }
        
            //Preparar: 
            $sentencia = $bd->prepare("SELECT JSON_OBJECT ('nombreZona',zonas.nombre, 'tituloArea' , areas.nombre,'magnitud', datosensor.magnitud,'valor' , datosensor.valor, 'fecha', datosensor.fecha,'cliente' , datosensor.idtarjeta) FROM zonas, areas, datosensor");
            $sentencia->execute();  
            $sentencia->bind_result($a);

            while ($sentencia->fetch()){
            echo $a;
            }
            $sentencia->close();
        }

        
            
    }