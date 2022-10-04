<?php
    session_start();
    $sesion = $_SESSION['usuario'];

    if ($sesion == null || $sesion == '') {
        header("Location: ../index.php");
    }
    require('../php/conexion.php'); 
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
    <title>Secciones</title>
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

                <a href="home.html">
                    <i class="fa-solid fa-home"></i>
                    Inicio
                </a>
                <span></span>
            </div>

            <div class="link">

                <a href="asistencia.html">
                    <i class="fa-solid fa-stopwatch"></i>
                    Asistencia
                </a>
                <span></span>
            </div>

            <div class="link" id="index">

                <a href="#">
                    <i class="fa-solid fa-chalkboard"></i>
                    Secciones
                </a>
                <span></span>
            </div>

            <div class="link">

                <a href="usuarios.html">
                    <i class="fa-solid fa-users"></i>
                    Usuarios
                </a>
                <span></span>
            </div>

            <div class="link">

                <a href="info.html">
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

    <section id="sectionsContainer">
        <div class="sections">
            <?php
            $sql = "SELECT * FROM seccion ORDER BY seccion.seccion, seccion.anho ASC";
            $consulta = mysqli_query($enlace, $sql);

            while ($seccion = mysqli_fetch_array($consulta)) {
                $idSeccion = $seccion["idSeccion"];
                $grado = $seccion["anho"];
                $alias = $seccion["seccion"];
                $especialidad = $seccion["tipoBachillerato"];

                $query = mysqli_query($enlace, "SELECT (estudiantes.nombre) FROM estudiantes");

                $cant = mysqli_num_rows($query);
            ?>
                <form action="seccion.php" method="GET" class="sectionContainer">
                    <!-- Datos a enviar para mostrar el listado de alumnos -->
                    <input type="text" name="idSeccion" id="" value="<?php echo $idSeccion; ?>" hidden>
                    <input type="text" name="grado" id="" value="<?php echo $grado; ?>" hidden>
                    <input type="text" name="alias" id="" value="<?php echo $alias; ?>" hidden>
                    <input type="text" name="especialidad" id="" value="<?php echo $especialidad; ?>" hidden>

                    <button id='sectionBG' type="submit">
                        <h2><?php echo $grado . "&deg; " . "&OpenCurlyDoubleQuote;" . $alias . "&OpenCurlyDoubleQuote;"; ?></h2>

                        <div class='section'>
                            <p><b>Estudiantes:</b> <?php echo $cant; ?></p>
                            <p><b>Año:</b> <?php echo $grado; ?></p>
                            <p><b>Especialidad:</b> <?php echo $especialidad; ?></p>
                        </div>
                    </button>
                </form>

            <?php
            }
            $enlace->close(); 
            ?>

            <button id="addSect">
                <i class="fa-solid fa-add"></i>
            </button>
        </div>
    </section>

    <div id="windowBG">
        <div id="window">
            <div class="msg">
                <h2>Datos ingresados exitosamente</h2>

                <a href="../pages/secciones.php">
                    Aceptar
                </a>
            </div>
        </div>
    </div>

    <div id="loadingBG">
        <div id="loadingContainer">
            <span class="loading"></span>
            <span class="loading2"></span>
        </div>
    </div>

    <footer>
        <p>
            &copy; 2022 Todos los derechos reservados &boxv;

            <a href="#">Términos y condiciones</a> &bull;
            <a href="#">Política de privacidad</a>
        </p>
    </footer>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/windows.js"></script>
<script src="../js/main.js"></script>
<script src="../js/changeWindow.js"></script>

</html>