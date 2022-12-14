<?php
require '../php/conexion.php';
// error_reporting(0);

$idSeccion = $_REQUEST["idSeccion"];

$sql = mysqli_query($enlace, "SELECT * FROM seccion WHERE idSeccion = '$idSeccion'");

$nie = $_REQUEST['nie'];
$dataQuery = mysqli_query($enlace, "SELECT estudiantes.nie, estudiantes.nombre,estudiantes.apellido,estudiantes.sexo,estudiantes.foto,seccion.anho,seccion.seccion,
                seccion.tipoBachillerato,seccion.turno, estudiantesxseccion.nip FROM estudiantes INNER JOIN estudiantesxseccion ON estudiantes.nie=estudiantesxseccion.nie 
                        INNER JOIN seccion ON seccion.idSeccion=estudiantesxseccion.idSeccion WHERE estudiantes.nie = '$nie'");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php require 'metadata.php'; ?>
    <title>Secciones</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="#">
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

                <a href="../pages/secciones.php">
                    <i class="fa-solid fa-chalkboard"></i>
                    Secciones
                </a>
                <span></span>
            </div>

            <div class="link">

                <a href="../pages/usuarios.php">
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
                        <a href="#">
                            Cerrar sesi??n
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

            $consulta = mysqli_query($enlace, "SELECT * FROM seccion ORDER BY seccion, anho ASC");

            while ($seccion = mysqli_fetch_array($consulta)) {

                $id = $seccion["idSeccion"];

                $query = mysqli_query($enlace, "SELECT estudiantes.nie, estudiantes.nombre, estudiantes.apellido, estudiantes.fechaNacimiento, estudiantes.sexo, seccion.tipoBachillerato FROM estudiantes JOIN estudiantesxseccion ON estudiantes.nie = estudiantesxseccion.nie JOIN seccion ON seccion.idSeccion = estudiantesxseccion.idSeccion WHERE seccion.idSeccion = '$id'");
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
                            <p><b>A??o:</b> <?php echo $seccion["anho"]; ?></p>
                            <p><b>Especialidad:</b> <?php echo $seccion["tipoBachillerato"]; ?></p>
                        </div>
                    </button>
                </form>

            <?php
            }
            // $enlace->close();
            ?>

            <button id="addSect" type="button" title="Agregar nueva secci??n">
                <i class="fa-solid fa-add"></i>
            </button>
        </div>
    </section>

    <?php include '../blocks/data.php'; ?>

    <div id="formContainerStdnt">
        <form action="../php/updatestdnt.php" method="post" id="formStdnt" autocomplete="off" enctype="multipart/form-data">

            <?php while ($datos = mysqli_fetch_array($dataQuery, MYSQLI_ASSOC)) {
            ?>
                <div class="pic_container">
                    <div class="stdn-pic">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($datos['foto']); ?>" alt="Foto del estudiante">
                    </div>
                </div>

                <div class="inputBox" id="nieBox">
                    <input type="text" name="nie" id="nie" value="<?php echo $datos['nie'] ?>" maxlength="10" required disabled>
                    <label for="nie">NIE</label>
                </div>

                <div class="combo">
                    <div class="inputBox">
                        <input type="text" name="names" id="names" value="<?php echo $datos['nombre'] ?>" autocapitalize="words" required disabled>
                        <label for="names">Nombres</label>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="lastNames" id="lastNames" value="<?php echo $datos['apellido'] ?>" autocapitalize="words" required disabled>
                        <label for="lastNames">Apellidos</label>
                    </div>
                </div>


                <fieldset>
                    <legend>Sexo</legend>

                    <?php
                    if ($datos["sexo"] == "M") {
                    ?>
                        <div class="radioBox">
                            <input type="radio" name="sex" id="masc" value="M" checked disabled required>
                            <label for="masc" class="fill">
                                <span></span>
                            </label>
                            <label for="masc">Masculino</label>
                        </div>

                        <div class="radioBox">
                            <input type="radio" name="sex" id="fem" value="F" disabled required>
                            <label for="fem" class="fill">
                                <span></span>
                            </label>
                            <label for="fem">Femenino</label>
                        </div>

                    <?php
                    } elseif ($datos["sexo"] == "F") {
                    ?>
                        <div class="radioBox">
                            <input type="radio" name="sex" id="masc" value="M" disabled required>
                            <label for="masc" class="fill">
                                <span></span>
                            </label>
                            <label for="masc">Masculino</label>
                        </div>

                        <div class="radioBox">
                            <input type="radio" name="sex" id="fem" value="F" checked disabled required>
                            <label for="fem" class="fill">
                                <span></span>
                            </label>
                            <label for="fem">Femenino</label>
                        </div>
                    <?php
                    }
                    ?>
                </fieldset>

                <div class="comboBox">
                    <select name="esp" id="esp" required>
                        <option value="" hidden selected></option>
                        <?php
                        $query = mysqli_query($enlace, "SELECT * FROM seccion ORDER BY seccion.anho ASC");
                        while ($datos = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        ?>
                            <option value="<?php echo $datos['idSeccion'] ?>">
                                <?php echo $datos['anho'] . '&deg ' . "&OpenCurlyDoubleQuote;"
                                    . $datos['seccion'] . "&OpenCurlyDoubleQuote; " . "&dash; " . $datos['tipoBachillerato'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="esp">Especialidad</label>
                </div>

                <div class="comboBox">
                    <select name="guideDoc" id="guideDoc" required>
                        <option value="" hidden selected></option>
                        <?php
                        $queryDocentes = mysqli_query($enlace, "SELECT docentes.nombre, docentes.apellido, docentes.nip FROM docentes 
                        JOIN usuarios ON docentes.nip = usuarios.nip WHERE usuarios.tipoUsuario = 'docente'");
                        while ($docentes = mysqli_fetch_array($queryDocentes, MYSQLI_ASSOC)) :
                        ?>
                            <option value="<?php echo $docentes['nip'] ?>">
                                <?php echo ucwords($docentes['nombre'] . "&ThickSpace;" . $docentes['apellido']) ?>
                            </option>
                        <?php endwhile ?>

                    </select>
                    <label for="guideDoc">Docente gu??a</label>
                </div>

            <?php
            }
            ?>
            <div class="buttons">
                <button type="submit" id="guardarStdnt">
                    <i class="fa-solid fa-check" style="color: limegreen;"></i>
                    &ThickSpace;
                    Guardar
                </button>

                <a class="cancel" href="../pages/secciones.php">
                    <i class="fa-solid fa-close" style="color: #d20000;"></i>
                    &ThickSpace;
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <footer>
        <p>
            &copy; 2022 Todos los derechos reservados &boxv;

            <a href="#">T??rminos y condiciones</a> &bull;
            <a href="#">Pol??tica de privacidad</a>
        </p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/windows.js"></script>
</body>

</html>