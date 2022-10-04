<?php
/**
 * @author Moisés Molina
 * @author Miguel Liborio
 */

//Establecemos la conexion
require("conexion.php");

/*---------------------------------   RECUPERAMOS LOS DATOS    ------------------------------------- */
$id = rand(0, 100);
$anho = mysqli_real_escape_string($enlace, $_POST['grade']);
$seccion = mysqli_real_escape_string($enlace, $_POST['seccion']);
$especialidad = mysqli_real_escape_string($enlace, $_POST['especialidad']);
$turno = mysqli_real_escape_string($enlace, $_POST['turno']);

/*---------------------------------  VERIFICAMOS SI YA EXISTE LA SECCION       ------------------------------------- */
$consult = mysqli_query($enlace, "SELECT anho, seccion, tipoBachillerato FROM seccion WHERE anho = '$anho' AND seccion = '$seccion' AND tipoBachillerato = '$especialidad'");

/*---------------------------------  RECORREMOS LAS FILAS       ------------------------------------- */
$r = mysqli_num_rows($consult);

/*---------------------------------   SI YA EXISTE LE DECIMOS QUE      ------------------------------------- */
if ($r >= 1) {

    echo "La seccion Ya fue creada";
} else {
    /*--------------------------------- SI NO, CREAMOS LA SECCIÓN       ------------------------------------- */

    $sql = mysqli_query($enlace, "INSERT INTO seccion(idSeccion, anho, seccion, tipoBachillerato, turno) VALUES ('$id','$anho', '$seccion', '$especialidad', '$turno')");

    /*---------------------------------  LE DECIMOS QUE FUE CREADA       ------------------------------------- */
    if ($sql) {

        include('../pages/successMsg.php');
    } else {
        echo "ERROR ENCONTRADO";
    }
}

$enlace->close();