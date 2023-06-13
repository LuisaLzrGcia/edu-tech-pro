<?php
// Verificar si se envió la clave por POST
if (isset($_GET['clave'])) {
    $clave = $_GET['clave'];

    // Conexión a la base de datos
    $hostname = 'localhost';
    $database = 'id20802587_edutechpro';
    $username = 'id20802587_admin';
    $password = 'Luisa2023****';

    $conexion = new mysqli($hostname, $username, $password, $database);

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    } else {

        // Consulta a la base de datos
        $sql = "SELECT * FROM `escuela` WHERE `clave` = '" . $clave . "'";
        $resultado = mysqli_query($conexion, $sql);

        // Verificar si la consulta fue exitosa
        if (!$resultado) {
            die("Error al obtener los datos: " . mysqli_error($conexion));
        } else {
            // Mostrar los resultados
            // Crear un array para almacenar los datos
            $datos = array();

            // Procesar cada fila y guardar los datos en el array
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $datos[] = array(
                    'id' => $fila['id_escuela'],
                    'clave' => $fila['clave'],
                    'escuela' => $fila['escuela']
                );
            }

            // Convertir los datos a formato JSON y mostrarlos
            echo json_encode($datos);
        }
    }
    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "CLAVE NO RECIBIDA";
}
?>