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
$dia = $_POST['day'];
$mes = $_POST['month'];
$ahno = $_POST['bYear'];
$docenteC = $_POST['guideDoc'];
$idEstudianteXSeccion = rand();
$esp = $_POST['esp'];

$date = $ahno . "-" . $mes . "-" . $dia;
$imagen = addslashes(file_get_contents($_FILES["pic"]["tmp_name"]));

$consulta = mysqli_query($enlace, "SELECT nie FROM estudiantes WHERE nie='$nie'");
$resultado = mysqli_num_rows($consulta);
if ($resultado >= 1) {
    echo "ya existe este alumno";
} else {
    $agregar = mysqli_query($enlace, "INSERT INTO estudiantes(nie,nombre,apellido,foto,sexo,fechaNacimiento) VALUES('$nie','$nombres','$apellidos','$imagen','$sexo','$date')");
    $rela = mysqli_query($enlace, "INSERT INTO estudiantesxseccion(idEstudianteXSeccion, nie, idSeccion, nip) 
            VALUES ('$idEstudianteXSeccion','$nie','$esp', '$docenteC')");
    if ($agregar && $rela) {
        echo "Nuevo Alumno Agregado";
    }
}
$enlace->close();
