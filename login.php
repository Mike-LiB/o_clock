<?php
require 'php/conexion.php';

if (!empty($_POST['login'])) {
    $usuario = $_POST['user'];
    $password = $_POST['ps'];
    session_start();
    $_SESSION['usuario'] = $usuario;

    $query = mysqli_query($enlace, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");
    $c = mysqli_num_rows($query);

    if ($c == 1) {
        while ($filas = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $tipo = $filas['tipoUsuario'];

            if ($tipo == "docente") {
                // header('location:pages/docente/');
                echo "docente";
            } else if ($tipo == "admin") {
                header('location: pages/home.php');
                echo "admin";
            } else if ($tipo == "CA") {
                header('location: pages/controlAsistencia.php');
            }
        }
    } else {
        echo "Tus datos no han sido registrados aún";
    }
}
