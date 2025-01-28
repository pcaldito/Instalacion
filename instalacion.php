<?php
    require_once 'conexion.php';

    // Leer y ejecutar el archivo SQL para crear las tablas
    $sqlScript = file_get_contents('script.sql');
    if ($conexion->multi_query($sqlScript)) {
        do {
            if ($resultado = $conexion->store_result()) {
                $resultado->free();
            }
        } while ($conexion->next_result());
        echo "<br> Tablas creadas correctamente. Por favor, registre un usuario administrador. ";
    } else {
        die(" Error al ejecutar el script SQL: " . $conexion->error);
    }

    // Procesar el formulario para registrar al usuario administrador
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $pw = $_POST['pw'];
        $correo= $_POST['correo'];
        $rol = 'A';

        $sql = "INSERT INTO Usuarios (nombre, pw, correo, rol) 
                VALUES ('$nombre', '$pw', '$correo', '$rol')";
        if ($conexion->query($sql) === TRUE) {
            echo "<br> Instalación completada. Usuario administrador creado.
            <br>Recuerde borrar la instalación al finalizar ";
        } else {
            die(" Error al crear el usuario administrador: " . $conexion->error);
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instalación</title>
    </head>
    <body>
        <h1>Registrar usuario administrador</h1>
        <form method="POST">
            <label for="nombre">Nombre de usuario:</label>
            <input type="text" id="nombre" name="nombre"><br>

            <label for="pw">Contraseña:</label>
            <input type="password" id="pw" name="pw"><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo"><br>

            <button type="submit">Registrar</button>
        </form>
    </body>
</html>

<?php   
    echo '<a href="borrar.php"><button>Borrar Instalación</button></a>';
?>