<?php
 $servidor = "localhost";
 
 $basedatos = "bdd_biblioteca";
 $usuario =   "root";
 $contrasena = "";

    try {

       

        $conexion = new PDO("mysql:host=$servidor;dbname=$basedatos",$usuario,$contrasena,);
            

        $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conexion;
    } catch (Exception $e) {
        echo $e->getMessage();
        
    }

?>