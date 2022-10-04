<?php
    session_start();
    $sesion = $_SESSION['usuario'];

    if ($sesion == null || $sesion == '') {
        header("Location: ../index.php");
    }
    require '../php/conexion.php';
    $userType = $_REQUEST['userType'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <link rel="stylesheet" href="../css/main.css">
    <!--  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <title>Lista de usuarios</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="home.php">
                <img src="../assets/logo.png" alt="logo.png">
            </a>
        </div>

        <nav>
            <div class="link">

                <a href="home.php">
                    <i class="fa-solid fa-home"></i>
                    Inicio
                </a>
                <span></span>
            </div>

            <div class="link">

                <a href="asistencia.php">
                    <i class="fa-solid fa-stopwatch"></i>
                    Asistencia
                </a>
                <span></span>
            </div>

            <div class="link">

                <a href="secciones.php">
                    <i class="fa-solid fa-chalkboard"></i>
                    Secciones
                </a>
                <span></span>
            </div>

            <div class="link" id="index">

                <a href="usuarios.php">
                    <i class="fa-solid fa-users"></i>
                    Usuarios
                </a>
                <span></span>
            </div>

            <div class="link">

                <a href="info.php">
                    <i class="fa-solid fa-info-circle"></i>
                    Info
                </a>
                <span></span>
            </div>
        </nav>

        <div class="user">
            <div href="#" class="profile">
                <div class="profile_img">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>

            <div class="username">
                <p>Administrador</p>

                <ul>
                    <li>
                        <a href="../php/sesion.php">
                            Cerrar sesión
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section class="users">
        <div class="usersList">
            <div class="titles">
                <table>
                    <th class="lastNames">
                        Apellidos
                    </th>
                    <th class="names">
                        Nombres
                    </th>
                    <th class="username">
                        Usuario
                    </th>
                    <th>
                        Contraseña
                    </th>
                </table>
            </div>

            <div class="list">

                <table>

                    <?php
                    /*---------MOSTRAMOS LOS USUARIOS SEGUN LA CATEGORIA ENVIADA----------- */
                    $query = mysqli_query($enlace, "SELECT docentes.nombre, docentes.apellido, usuarios.usuario, usuarios.password 
                    FROM docentes INNER JOIN usuarios ON docentes.nip = usuarios.nip 
                    WHERE usuarios.tipoUsuario = '$userType'");

                    while ($datos = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>

                        <tr>
                            <td>
                                <?php echo ucwords($datos['apellido']) ?>
                            </td>
                            <td>
                                <?php echo ucwords($datos['nombre']) ?>
                            </td>
                            <td>
                                <?php echo $datos['usuario'] ?>
                            </td>
                            <td>
                                <?php echo $datos['password'] ?>
                            </td>
                        </tr>
                        

                    <?php
                    }
                    ?>
                </table>
            </div>

            <button id="addUser" title="Agregar usuario">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </section>

    <?php require '../blocks/formUser.php'; ?>

    <footer>
        <p>
            &copy; 2022 Todos los derechos reservados
            &boxv;

            <a href="#">Términos y condiciones</a>
            &bull;
            <a href="#">Política de privacidad</a>
        </p>
    </footer>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/formUserJS.js"></script>

</html>