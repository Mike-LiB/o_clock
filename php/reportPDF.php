<?php
    ob_start();
    require("conexion.php");
    require("../pages/plugins/dompdf/autoload.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- TODO EL CONTENIDO DEL REPORTE -->
</body>
</html>
<?php
    $body = ob_get_clean();
    require("../pages/plugins/dompdf/generar.php");
?>