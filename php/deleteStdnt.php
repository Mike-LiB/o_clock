<?php
    require("conexion.php");
    $nie = $_REQUEST['nie'];
    $deleteEstXSecc = mysqli_query($enlace, "DELETE FROM estudiantesxseccion WHERE nie = '$nie'");
    $deleteEst = mysqli_query($enlace, "DELETE FROM estudiantes WHERE nie = '$nie'");
    header("Location: ../pages/secciones.php");

    /**
     *                                  BASE DE DATOS
     * CAMBIE el campo allo por year    --------------  CAMBIE EL CAMPO horaEntrada por hora
     * 
     * 
     *                                  ASISTENCIA
     * ARREGLE QUE NO SE INSERTEN MAS DE DOS SEGISTROS, pero ahora no resgistra la salida 
     * 
     * 
     *                                    ADMINISTRADOR         
     * arregle las extensiones en los menus de html a php
     * 
     * arregle el contador de estudiantes en el apartado de secciones, mostraba el total de estudiantes, pero no por seccion
     * 
     * agregue los listados de estudiantes por cada seccion, coloque el total de estudiantes de esa seccion
     * y le coloque la especialidad
     * 
     * Le Agregue tambien para que destruya la seccion, "CERRAR SESION"
     * 
     * Agregue el archivo php/deletesection para eliminar la seccion
     * 
     * Agregue un archivo para eliminar un alumno de la seccion php/detelestdnt.php
     * 
     *                                  INICIO DE SESION
     * 
     * Cambie la validacion del login, ya no esta en un archivo aparte porque cuando se le muestre el mensaje que 
     * sus datos no han sido registrados queda en otro apartado     --      a no ser que cambien un redireccionamiento
     * 
     * 
     *                                         REPORTES
     * 
     * Agregue la libreria para generar los pdf
     * Cree un archivo php/reportePDF.php, donde colocaremos todo el contenido
     * 
     * Agregue un archivo php/reporteExcel.php ya esta solo para recibir el id de la seccion
     * 
     * Agregue el archivo para los carnets php/carnet.php -- esta solo de agregar el html y css
     */
?>



