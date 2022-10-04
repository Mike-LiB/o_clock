<?php
    session_start();
    $sesion = $_SESSION['usuario'];

    if ($sesion == null || $sesion == '') {
        header("Location: ../index.php");
    }
    require '../php/estado.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <!--  -->
    <script src="../libs/lib1.js"></script>
    <script src="../libs/lib2.js"></script>
    <script src="../libs/lib3.js"></script>
    <title>Control de Ingreso</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="../assets/logo.png" alt="logo.png" title="Logo de O'clock">
        </div>

        <nav></nav>

        <div class="user">
            <div class="profile">
                <div class="profile_img">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>

            <div class="username">
                <p>Control Asistencia</p>

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

    <section class="control">
        <div class="perfilContainer">
            <h3>Perfil del alumno</h3>

            <?php
            require("../php/conexion.php");
            date_default_timezone_set("America/El_Salvador");
            $hora = date("h:i");


            $consulta = mysqli_query($enlace, "SELECT asistencia.nie,asistencia.fecha,asistencia.hora,
                estudiantes.nombre,estudiantes.apellido,
                estudiantes.sexo,estudiantes.foto,seccion.year,seccion.seccion,
                seccion.tipoBachillerato,seccion.turno 
                FROM estudiantes INNER JOIN asistencia ON estudiantes.nie = asistencia.nie INNER JOIN estudiantesxseccion 
                ON estudiantes.nie=estudiantesxseccion.nie 
                INNER JOIN seccion ON seccion.idSeccion=estudiantesxseccion.idSeccion 
                WHERE asistencia.estado='pendiente'");


            if (mysqli_num_rows($consulta) >= 1) {
                while ($datos = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                    $nieGlobal = $datos["nie"];
                    $nombreGlobal = $datos["nombre"];
                    $apellidoGlobal = $datos["apellido"];
                    $fecha = $datos["fecha"];
                    $hora = $datos["hora"];

            ?>
                    <div class="perfil">
                        <div class="foto">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($datos['foto']); ?>" alt="Foto del estudiante">
                        </div>

                        <div class="data">

                            <form action="" method="get" id="formPerfil">
                                <div class="inputBox">
                                    <input type="text" name="nie" id="nie" value="<?php echo $datos["nie"]; ?>" disabled>
                                    <label for="nie">NIE</label>
                                </div>
                                <br>

                                <div class="inputBox">
                                    <input type="text" name="lastNames" id="lastNames" value="<?php echo $datos["apellido"]; ?>" disabled>
                                    <label for="lastNames">Apellidos</label>
                                </div>
                                <br>

                                <div class="inputBox">
                                    <input type="text" name="names" id="names" value="<?php echo $datos["nombre"]; ?>" disabled>
                                    <label for="names">Nombres</label>
                                </div>
                                <br>

                                <div class="inputBox">
                                    <input type="text" name="year" id="year" value="<?php echo $datos["year"]; ?>" disabled>
                                    <label for="year">Año</label>
                                </div>
                                <br>

                                <div class="inputBox">
                                    <input type="text" name="sec" id="sec" value="<?php echo $datos["seccion"]; ?>" disabled>
                                    <label for="sec">Sección</label>
                                </div>
                                <br>

                                <div class="inputBox">
                                    <input type="text" name="sex" id="sex" value="<?php echo $datos["sexo"]; ?>" disabled>
                                    <label for="sex">Sexo</label>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                    $nie = $datos["nie"];
                    mysqli_query($enlace, "UPDATE asistencia SET estado='$estado' WHERE estado='pendiente'");
                }
            }
            ?>
        </div>

        <aside>
            <section class="scanBox">
                <div class="cameraBox">
                    <span class="camera">
                        <video id="nieCamara"></video>
                    </span>
                    <span class="laser"></span>
                </div>
            </section>
            <hr>

            <section class="tableBox">
                <table>
                    <thead>
                        <th>NIE</th>
                        <th>Nombre completo</th>
                        <th>Fecha y hora</th>
                    </thead>

                    <tbody>
                        <?php
                        date_default_timezone_set("America/El_Salvador");
                        $date = date("Y-m-d");
                        $consultaRegistros = mysqli_query(
                            $enlace,
                            "SELECT estudiantes.nombre,estudiantes.apellido,asistencia.nie,asistencia.fecha,asistencia.hora
                                    FROM estudiantes INNER JOIN asistencia ON estudiantes.nie=asistencia.nie WHERE asistencia.fecha = '$date' ORDER BY asistencia.hora DESC"
                        );
                        $resultadoRe = mysqli_num_rows($consultaRegistros);

                        if ($resultadoRe >= 1) {
                            while ($info = mysqli_fetch_array($consultaRegistros, MYSQLI_ASSOC)) {
                        ?>
                                <tr>


                                    <td>
                                        <?php
                                        echo $info["nie"];

                                        ?>
                                    </td>
                                    <td class="names">
                                        <?php
                                        echo $info["nombre"] . " " . $info["apellido"];

                                        ?>

                                    </td>
                                    <td class="time">
                                        <?php
                                        echo $info["fecha"] . " - " . $info["hora"];

                                        ?>

                                    </td>

                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </aside>
    </section>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/CA.js"></script>
<script src="../js/openCamera.js"></script>

</html>