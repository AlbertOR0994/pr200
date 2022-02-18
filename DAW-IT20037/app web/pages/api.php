
 <?php
        use Alberto\Pr\Webbd;
        require "../../src/bdim/classbd.php";
        $tablas = new Webbd();
        
        header('Content-Type: application/json');
        
        $tablas->Crearjson();
?>