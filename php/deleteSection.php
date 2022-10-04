<?php
    require("conexion.php");
    $idSeccion = $_REQUEST['idSetion'];

    //con esta consulta se va a eliminar todo lo que tenga relacion con la seccion, asistencia y estudiantes
    //para que no quede registros la configuracion entre las tablas tiene que estar en cascada
    $eliminar = mysqli_query($enlace, "DELETE estudiantes, seccion FROM estudiantes INNER JOIN estudiantesxseccion 
    ON estudiantes.nie=estudiantesxseccion.nie INNER JOIN seccion ON seccion.idSeccion=estudiantesxseccion.idSeccion 
    WHERE seccion.idSeccion = '$idSeccion'");
    if ($eliminar == true) {
        echo "eliminada";
         header("location: ../pages/secciones.php");
        
    } else {
        echo "no eliminada";
    }
    
    
?>