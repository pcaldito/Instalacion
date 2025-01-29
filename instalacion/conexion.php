<?php

    $host = "localhost";
    $user = "root";
    $pw = "";
    $nombreBase = "pruebainstalacion";

    $conexion = mysqli_connect($host, $user, $pw, $nombreBase);

    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    echo "Conexión Establecida. ";

?>