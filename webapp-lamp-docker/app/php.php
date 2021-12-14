<?php


$temperatura=$_GET["t"];
$humedad=$_GET["h"];


    $servidor = "localhost"; //le damos a la variable nuestra ruta donde esta la base de datos en este caso del contenedor
    $user = "root"; // guardamos en la variable nuestro usuario
    $password = ""; // contraseña del usuario mysql
    $database = "pr200"; // aqui el nombre de la base de datos


    //conexiones que vamos a necesitar con nuestra base de datos, aqui ponemos las variables  anteriores
    $bd = new mysqli($servidor, $user, $password, $database);
    $sentencia =$bd->prepare("INSERT INTO pr200.s4 (`id`,`temperatura`) VALUES (2,$temperatura)");
    $sentencia->execute();  


