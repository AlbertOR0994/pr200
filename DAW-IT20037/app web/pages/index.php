<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isla Magica</title>
    <link rel = "stylesheet" href = "../front/css.css">
</head>
    
<body>
    <ul class="zonas">
        <li class="z" id="z1">Z100</li>
        <li class="z" id="z2">Z200</li>
        <li class="z" id="z3">Z300</li>
        <li class="z" id="z4">Z400</li>
        <li class="z" id="z5">Z500</li>
    </ul>
    <p class="descripcion activado"> TEXTO DE PRUEBA<p>
    <main>
        <nav class = desplegable>
            <ul class='menu'>
                <li class = m1><a href="./index.php">Inicio</a></li>
                <li class = m1><a href="./mapa.php">Mapa</a></li>
                <li class = m1><a href="">Atracciones</a></li>
                <li class = m1><a href="">Contacto</a></li>
                <li class = m1><a href="./api.php">Api</a></li>
            </ul>
        </nav>
        
        
        <div class = "mapa">
        <img src="../img/im_mapa_web20-1.jpg" id="img1" alt="imagen"/>
           <div class ="densidad"> 
                <div class="zn activado" id="zona1">Z100 </div>
                <div class="zn activado" id="zona2">Z200</div>
                <div class="zn activado" id="zona3">Z300</div>
                <div class="zn activado" id="zona4">Z400</div>
                <div class="zn activado" id="zona5">Z500</div>
           </div>
        </div>

        <article class ="texto"> Bienvenido a Isla magica, aquí encontrarás las distintas zonas del parque para tener
            la información del estado de dichas zonas, aparecerán las diferentes zonas a la izquierda del mapa, la cual, haciendo click
            en ellas, será visible.
        </article>

        <!-- <div class = dbprueba>

            <?php
            error_reporting(0);
            use Alberto\Pr\Webbd;
            require "../../src/bdim/classbd.php";
            $tablas = new Webbd();
            $tablas->Mostrarbd();
            ?>

        </div> -->
    <div class ="formularios">
        <div class ="formulario">
            <form method ="POST">
                <input type ="number" name ="zona" placeholder = "Nueva id de la zona">
                <input type ="text" name ="nombre" placeholder = "Nombre para la zona">
                <input type="Submit" Value="Enviar">
            </form>

            <?php
            
           
            $idz = $_POST['zona'];
            $zn = $_POST['nombre'];

            if(isset($idz) && isset($zn)){
                $tablas->Insertardatoszona($idz,$zn);
            }
            ?>

        <div class ="formulario">
            <form method ="POST">
                <input type ="number" name ="idarea" placeholder = "Id del area">
                <input type ="number" name ="idazona" placeholder = "Id de la zona">
                <input type ="text" name = "anombre" placeholder ="nombre">
                <input type ="text" name ="plazas" placeholder ="Numero de plazas">
                <input type ="submit" name ="Enviar">
            </form>

            <?php

                $idar = $_POST['idarea'];
                $idza = $_POST['idazona'];
                $nmbra = $_POST['anombre'];
                $plazas = $_POST['plazas'];
                
                if(isset($idar) && isset($idza) && isset($nmbra) && isset($plazas)){
                    $tablas->Insertareas($idar,$idza,$nmbra,$plazas);
                }
                
            ?>


        </div>

        <div class = "formulario">
            <form method ="POST" action="./index.php">
                <input type ="number" name ="idtienda" placeholder = "Nueva id de la tienda">
                <input type ="number" name ="idzona" placeholder = "Id de la zona de la tienda">
                <input type ="number" name = "idarea" placeholder ="Id del area de la tienda">
                <input type ="text" name = "nombre" placeholder ="nombre de la tienda">
                <input type ="submit" name ="Enviar" >
            </form>
            <?php

                $idt = $_POST['idtienda'];
                $idzt = $_POST['idzona'];
                $idat = $_POST['idarea'];
                $nmbt = $_POST['nombre'];
                
                if(isset($idt) && isset($idzt) && isset($idat) && isset($nmbt)){
                    $tablas->insertardatostienda($idt,$idzt,$idat,$nmbt);
                }
                
                

            ?>

        </div>

            <div class ="formulario">
                <form method ="POST">
                    <input type ="number" name ="idsens" placeholder = "Id para el sensor">
                    <input type ="number" name ="idszona" placeholder = "Id de la zona del sensor">
                    <input type ="text" name = "tipo" placeholder ="Tipo de sensor">
                    <input type ="submit" name ="Enviar">
                </form>

                <?php

                    $ids = $_POST['idsens'];
                    $idzs = $_POST['idszona'];
                    $ts = $_POST['tipo'];

                   
                    
                    if(isset($ids) && isset($idzs) && isset($ts)){
                        $tablas->insertarsensor($ids,$idzs,$ts);
                    }
                    
                ?>

                <?php 
                 $h = $_GET["hum"];
                 $t = $_GET["temp"];

                 echo $t;
                 echo $h;
                    
                    $fecha = date("Y-m-d H:i:s");
                    $tablas->Insertardatosensor($fecha,1,"3C 76 85 64",'humedad','Z500',$h);
                    $tablas->Insertardatosensor($fecha,2,"3C 76 85 64",'temperatura','Z500',$t);
                ?>
            </div>
        </div>
    </main>
</body>

</html>
<script src ="../js/js.js"></script>
<script src ="../js/peticion.js"></script>