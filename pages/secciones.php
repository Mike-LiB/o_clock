<?php
session_start();
$sesion = $_SESSION['usuario'];

if ($sesion == null || $sesion == '') {
    header("Location: ../index.php");
}
require('../php/conexion.php');
// error_reporting(0);
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

            <div class="link" id="index">

                <a href="#">
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

    <section id="sectionsContainer">
        <div class="sections">
            <?php

            $consulta = mysqli_query($enlace, "SELECT * FROM seccion ORDER BY anho ASC");

            while ($seccion = mysqli_fetch_array($consulta)) {
                $idSeccion = $seccion['idSeccion'];
                $query = mysqli_query($enlace, "SELECT estudiantes.nie FROM estudiantes JOIN estudiantesxseccion ON estudiantes.nie = estudiantesxseccion.nie JOIN seccion ON seccion.idSeccion = estudiantesxseccion.idSeccion WHERE seccion.idSeccion = '$idSeccion'");
                $cant = mysqli_num_rows($query);
            ?>
                <form action="../php/showData.php" method="GET" class="sectionContainer">

                    <!-- Datos a enviar para mostrar el listado de alumnos -->
                    <input type="text" name="idSeccion" id="" value="<?php echo $seccion["idSeccion"]; ?>" hidden>

                    <button id='sectionBG' type="submit">
                        <h2><?php echo $seccion["anho"] . "&deg; " . "&OpenCurlyDoubleQuote;"
                                . $seccion["seccion"] . "&OpenCurlyDoubleQuote;"; ?></h2>

                        <div class='section'>
                            <p><b>Estudiantes:</b> <?php echo $cant; ?></p>
                            <p><b>Año:</b> <?php echo $seccion["anho"]; ?></p>
                            <p><b>Especialidad:</b> <?php echo $seccion["tipoBachillerato"]; ?></p>
                        </div>
                    </button>
                </form>

            <?php
            }
            $enlace->close();
            ?>

            <button id="addSect" type="button" title="Agregar nueva sección">
                <i class="fa-solid fa-add"></i>
            </button>
        </div>
    </section>

    <?php require('../blocks/formSection.php'); ?>

    <div id="warningBG">
        <div class="warningContainer">
            <h3>¿Está seguro que desea eliminar?</h3>
            <p>Esta acción <u>no se puede deshacer</u></p>

            <div class="btns">
                <button id="aceptAction">
                    Aceptar
                </button>

                <button id="cancelAction">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <footer>
        <p>
            &copy; 2022 Todos los derechos reservados &boxv;

            <a href="#">Términos y condiciones</a> &bull;
            <a href="#">Política de privacidad</a>
        </p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/windows.js"></script>
    <script src="../js/formSection.js"></script>
    <script src="../js/formStdnt.js"></script>
    <script src="../js/validData.js"></script>
</body>

</html>