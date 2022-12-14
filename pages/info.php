<?php
    session_start();
    $sesion = $_SESSION['usuario'];
    
    if ($sesion == null || $sesion == '') {
        header("Location: ../index.php");
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <title>Info</title>
</head>

<body>
    <header class="banner" id="bannerInfo">
        <div id="banner_content">
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

                <div class="link">

                    <a href="usuarios.php">
                        <i class="fa-solid fa-users"></i>
                        Usuarios
                    </a>
                    <span></span>
                </div>

                <div class="link" id="index">

                    <a href="#">
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
                                Cerrar sesi??n
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="desc">
            <p>
                DIAS es una aplicaci??n web creada por IMTECH&trade; y fue hecha con el objetivo de contabilizar,
                almacenar
                y mostrar los datos de asistencia de alumnos.
                <br><br>

                Su funcionamiento consiste en lo siguiente: Un conjunto de alumnos y sus datos son organizados en
                secciones que pueden ser visualizadas por sus maestros y personal administrativo, adem??s, dentro del
                sistema pueden acceder a las estad??sticas particulares de las secciones; adem??s de poder visualizar de
                manera general las estad??sticas de todo el sistema en funci??n a la asistencia de los los estudiantes de
                todo el centro educativo. Y con lo anterior pasamos al siguiente punto, el cual es el m??s atractivo del
                sistema, y es el m??dulo de asistencia por medio de un lector de c??digos QR; En este se nos ofrece una
                herramienta de software capaz de leer un c??digo QR y con este, almacenar la hora y el ID de la persona
                que ingreso al centro escolar.
            </p>
        </div>
    </header>
    <span class="content_bg"></span>

    <section id="home">

    </section>

    <footer>
        <p>
            IMTECH &copy; 2022 Todos los derechos reservados
            &boxv;

            <a href="#">T??rminos y condiciones</a>
            &bull;
            <a href="#">Pol??tica de privacidad</a>
        </p>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"
    integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/mainJS.js"></script>

</html>