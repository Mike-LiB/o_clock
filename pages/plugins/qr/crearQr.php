<?php

require("../../../php/conexion.php");
require("../qr/phpqrcode/qrlib.php");
$consulta = mysqli_query(
    $enlace,
    "SELECT * from estudiantes"
);
while ($carnet = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
    $nie = $carnet['nie'];
    $dato = $carnet['nombre'] . "   " . $carnet['apellido'] . "  ";

    $dir = 'temp/';
    // verificamos si existen la carpeta temp
    if (!file_exists($dir)) mkdir($dir); {
        $filename = $dir . $dato . $nie . '.png';
        $tamaño = 16;
        $nivel = 'h';
        $marco = 3;
        $contenido = $nie;
        QRcode::png($contenido, $filename, $nivel, $tamaño, $marco);
    }
}
