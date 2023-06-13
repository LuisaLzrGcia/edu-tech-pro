<?php
$hostname = 'localhost';
$database = 'id19333258_digcompedu';
$username = 'id19333258_admin';
$password = 'Digcompedu123*';

$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion) {

    if (isset($_POST['enviarClave'])) {
        $clave = $_GET['claveEscuela'];

        $sql = "SELECT *  FROM `escuela` WHERE `clave` = '" . $clave . "'";
        $query = $conexion->query($sql);
        $nr = mysqli_num_rows($query);
        if ($nr == 1) {
            echo "si";
        } else {
            echo "no";
        }
    } else {
        echo "NO";
    }
} else {
    echo "NO";
}
mysqli_close($conexion);
?>