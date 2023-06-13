<?php
$hostname = 'localhost';
$database = 'id19333258_digcompedu';
$username = 'id19333258_admin';
$password = 'DigCompEdu22*';

$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion) {
    if (isset($_POST['finalizar'])) {
        if ($_POST['escuela'] == "NO") {
            echo "<script> window.location.href = '../HTML/reporte.html'</script>";
        } else {
            if (
                !empty($_POST['pf1']) && !empty($_POST['pf2']) && !empty($_POST['pf6']) && !empty($_POST['pf7'])
                && !empty($_POST['pf8']) && !empty($_POST['pfinal']) && !empty($_POST['pf11'])
                && $_POST['pf3'] != "0" && $_POST['pf4'] != "0" && $_POST['pf5'] = !"0"
                && $_POST['pf9'] != "0" && $_POST['pf10'] != "0"
            ) {
                $pf1 = $_POST['pf1'];
                $pf2 = $_POST['pf2'];
                $pf3 = $_POST['pf3'];
                $pf4 = $_POST['pf4'];
                $pf5 = $_POST['pf5'];
                $pf6 = $_POST['pf6'];
                $pf7 = $_POST['pf7'];
                $pf8 = $_POST['pf8'];
                $pf9 = $_POST['pf9'];
                $pf10 = $_POST['pf10'];
                $herramientas = "";
                foreach ($_POST['pf11'] as $seleccionado) {
                    $herramientas = $herramientas . "" . $seleccionado . " ";
                }
                $pfinal = $_POST['pfinal'];
                $A1 = $_POST['A1'];
                $A2 = $_POST['A2'];
                $A3 = $_POST['A3'];
                $A4 = $_POST['A4'];
                $A5 = $_POST['A5'];
                $A6 = $_POST['A6'];
                $AGral = $_POST['AGral'];
                $clave = $_POST['escuela'];

                $sql = "INSERT INTO `respuestas_encuesta` 
                (`id`, `clave`, `fecha`, `nivel_1`, `nivel_2`, `nivel_3`, `nivel_4`, `nivel_5`, `nivel_6`, 
                `nivel_gral`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `pfinal`) 
                VALUES 
                (NULL, '$clave', now(), '$A1', '$A2', '$A3.', '$A4', '$A5', '$A6', '$AGral', 
                '$pf1', '$pf2', '$pf3', '$pf4', '$pf5', '$pf6', '$pf7', '$pf8', '$pf9', 
                '$pf10', '$herramientas', '$pfinal');";
                if (mysqli_query($conexion, $sql)) {
                    echo "<script> window.location.href = '../HTML/reporte.html'</script>";
                } else {
                    echo "<script> alert('ERROR');window.location.href = '../HTML/reporte.html'</script>";
                }
            } else {
                echo "<script> alert('Hay preguntas sin contestar');window.history.back()</script>";
                //echo var_dump($_POST);
            }
        }


    } else {
        echo "<script> alert('ERROR');window.history.back()</script>";
    }
} else {
    echo "<script> alert('ERROR en la base de datos');window.history.back()</script>";
}
mysqli_close($conexion);
?>