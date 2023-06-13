<?php
$hostname = 'localhost';
$database = 'id19333258_digcompedu';
$username = 'root';
$password = '19081411';

$conexion = new mysqli($hostname, $username, $password, $database);
if ($conexion) {
    // echo "Conexión exitosa";

    $area = $_GET['area'];
    $nivel = $_GET['nivel'];

    $sql = "SELECT descripcion FROM nivel_resultado WHERE id_area_fk = '" . $area . "' and idNivel_fk='" . $nivel . "'";
    $query = $conexion->query($sql);

    // CREAMOS UN ARRAY PARA GUARDAR LOS VALORES DEL REGISTRO
    $data = array();

    // VARIABLE CON EL TOTAL DE REGISTROS OBTENIDOS
    $num = $query->num_rows;

    // AGREGAMOS LOS VALORES AL ARRAY
    while ($resultado = $query->fetch_assoc()) {
        $data['data'] = $resultado;

        // CREAMOS EL JSON Y LO MOSTRAMOS
        echo json_encode($data);
    }
} else {
    echo "Fallo en la conexión";
}
mysqli_close($conexion);
