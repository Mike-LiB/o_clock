<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo_noBG.png" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body id="lBody">
    <div>
        <div id="logo">
            <img src="assets/logo.png" alt="logo.png">
        </div>
        
        <form method="post">
            <div id="userType">
                <div class="user_optBox">
                    <input type="radio" name="user" id="admin" class="user">
                    <label for="admin">Admin</label>
                    <span></span>
                </div>
                
                <div class="user_optBox">
                    <input type="radio" name="user" id="dir" class="user">
                    <label for="dir">Dirección</label>
                    <span></span>
                </div>
        
                <div class="user_optBox">
                    <input type="radio" name="user" id="doc" class="user">
                    <label for="doc">Docente</label>
                    <span></span>
                </div>
        
            </div>
            <br>
        
            <div class="inputBox">
                <input type="email" name="user" id="user"
                title="Ingrese el nombre de usuario que se le ha asignado" required>
                <label for="user">Usuario</label>
            </div>
            <br>
        
            <div class="inputBox">
                <input type="password" name="ps" id="ps" 
                title="La contraseña debe tener ocho caracteres mínimo" required>
                <label for="ps">Contraseña</label>
            </div>
            <br>
        
            <a href="#">¿Olvidó su contraseña?</a>
            <br>
        
            <input type="submit" value="Ingresar" name="login">
        </form>
    </div>
</body>

</html>
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
?>