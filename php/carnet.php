<?php
ob_start();
$idSeccion = $_REQUEST['idSeccion'];
require("conexion.php");
require("../pages/plugins/dompdf/autoload.inc.php");
require("../pages/plugins/qr/phpqrcode/qrlib.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/o'clock/css/carnet.css">
    <title>Document</title>
</head>

<body>
    <?php
    $consulta = mysqli_query($enlace, "SELECT estudiantes.nie, estudiantes.nombre, estudiantes.apellido, estudiantes.foto, seccion.seccion, seccion.allo FROM estudiantes  JOIN ON estudiantes.nie = estudiantesxseccion.nie  JOIN seccion ON seccion.idSeccion = estudiantesxseccion.idSeccion WHERE seccion.idSeccion = '$idSeccion'");
    $result = mysqli_num_rows($consulta);
    
    if ($result >= 1) {
        while ($carnet = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

            //recuperamos la imagen para mostrarla despues
            $imagenBase64 = "data:image/png;base64," . base64_encode($carnet['foto']);

            $dir = 'temp/';
            // verificamos si existen la carpeta temp
            if (!file_exists($dir)) mkdir($dir); {
                $filename = $dir . $nie . '.png';
                $tamaño = 16;
                $nivel = 'h';
                $marco = 3;
                $contenido = $nie;
                QRcode::png($contenido, $filename, $nivel, $tamaño, $marco);
            }

    ?>
            <!--------------------------  DATOS GENERALES   ------------------------>

            <img src="http://localhost/o'clock/assets/" alt="logoInstitucion">

            <img src="<?php echo $imagenBase64 ?>" alt="fotoEstdiante">

            <?php echo $carnet['nombre'] ?>
            <?php echo $carnet['apellido'] ?>
            <?php echo $carnet['seccion'] ?>
            <?php echo $carnet['anho'] ?>

            <figure>
                <img src="http://localhost/o'clock/<?php echo $filename ?>" alt="QR">
                <figure>nie <?php echo $carnet['nie']  ?></figure>
            </figure>

    <?php
        }
    } else {
        echo "No existen alumnos registrados por el momento";
    }

    ?>
</body>

</html>
<?php
$body = ob_get_clean();
require("../pages/plugins/dompdf/generar.php");
?>