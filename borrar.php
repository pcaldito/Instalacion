<?php
    unlink('instalacion/instalacion.php');
    unlink('instalacion/script.sql');
    unlink('instalacion/conexion.php');

    echo '<p>Instalacion borrada</p>';

    echo '<a href="ProyectoLibros\index.php"><button>Acceder a la aplicaciión</button></a>';
?>