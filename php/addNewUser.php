<?php 
require("../php/conexion.php");

$nombre = mysqli_real_escape_string($enlace, $_POST['names']);
$apellido = mysqli_real_escape_string($enlace, $_POST['lastNames']);
$nip = mysqli_real_escape_string($enlace, $_POST['nip']);
$usuario = mysqli_real_escape_string($enlace, $_POST['usuario']);
$pass = mysqli_real_escape_string($enlace, $_POST['password']);
$email = mysqli_real_escape_string($enlace, $_POST['email']);
$id = rand();
$tipoUsuario = mysqli_real_escape_string($enlace, $_POST['tipoUsu']);

$consultaNip = mysqli_query($enlace, "SELECT * FROM docentes WHERE nip = '$nip'");
$rn = mysqli_num_rows($consultaNip);

if ($rn >= 1) {
    echo "Datos existentes";
} else {

    $docente = mysqli_query($enlace, "INSERT INTO docentes (nip, nombre, apellido, email) VALUES ('$nip','$nombre','$apellido','$email')");
    $usua = mysqli_query($enlace, "INSERT INTO usuarios (idUsuario, usuario, password, tipoUsuario, nip) VALUES ('$id','$usuario','$pass','$tipoUsuario','$nip')");
    if ($docente == true && $usua == true) {
        header("location: ../pages/userAdded.php?userType=$tipoUsuario");
    } else {
        echo "Error en la peticion";
    }
}
