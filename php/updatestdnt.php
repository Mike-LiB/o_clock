<?php

/**
 * @author Moisés Molina
 * @author Miguel Liborio
 */

require("conexion.php");

$nie = $_POST["nie"];
$nombres = $_POST["names"];
$apellidos = $_POST["lastNames"];
$sexo = $_POST["sex"];
$docenteC = $_POST['guideDoc'];
$esp = $_POST['esp'];

// $imagen = addslashes(file_get_contents($_FILES["pic"]["tmp_name"]));
    $agregar = mysqli_query($enlace, "INSERT INTO estudiantes(nie,nombre,apellido,sexo) VALUES('$nie','$nombres','$apellidos','$sexo')");
    $rela = mysqli_query($enlace, "INSERT INTO estudiantesxseccion(idEstudianteXSeccion, nie, idSeccion, nip) 
            VALUES ('$nie','$esp', '$docenteC')");
    if ($agregar && $rela) {
        echo "Alumno Actualizado Datos";
    }else{
        echo "error";
    }
$enlace->close();
