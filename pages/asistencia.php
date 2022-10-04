<?php
    session_start();
    $sesion = $_SESSION['usuario'];

    if ($sesion == null || $sesion == '') {
        header("Location: ../index.php");
    }

    require '../php/conexion.php';
    error_reporting(0);
    $idSeccion = $_REQUEST['idSeccion'];
    date_default_timezone_set("America/El_Salvador");
    $date = date("Y-m-d");
    
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
    <title>Estudiantes</title>
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

            <div class="link" id="index">

                <a href="#">
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

    <section class="students">
        <div class="stdntList">
            <div class="titles">
                <table>
                    <th class="nie">
                        NIE
                    </th>
                    <th class="lastNames">
                        Apellidos
                    </th>
                    <th>
                        Nombres
                    </th>
                    <th>
                        Estado
                    </th>
                </table>
            </div>

            <div class="list">
                <table>
                    <?php
                    $c = mysqli_query($enlace, "SELECT estudiantes.nie, estudiantes.nombre, estudiantes.apellido, 
                    seccion.idSeccion,asistencia.fecha, asistencia.estado FROM estudiantes INNER JOIN estudiantesxseccion 
                    ON estudiantes.nie = estudiantesxseccion.nie INNER JOIN seccion ON 
                    seccion.idSeccion = estudiantesxseccion.idSeccion INNER JOIN asistencia ON 
                    estudiantes.nie = asistencia.nie WHERE seccion.idSeccion = '$idSeccion' AND asistencia.fecha = '$date'");

                    while ($datos = mysqli_fetch_array($c, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td class="nie">
                                <?php echo $datos['nie'] ?>
                            </td>
                            <td class="lastNames">
                                <?php echo ucwords($datos['apellido']);?>
                            </td>
                            <td>
                                <?php echo ucwords($datos['nombre']) ?>
                            </td>
                            <td>
                                <?php echo $datos['estado'];?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>

        <aside class="tools">
            <div class="sectList">
                <div class="options">
                    <h2>Secciones</h2>
                    <a href="asistencia.php">
                        Todos
                    </a>
                </div>
                    
                <div id="list">
                    <?php
                    $query = mysqli_query($enlace, "SELECT * FROM seccion");
                    
                    while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                    
                        <a class="inputBox" href="asistencia.php?idSeccion=<?php echo $data['idSeccion']; ?>">
                            <label>
                                <span>
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <?php echo $data["year"] . "&deg; " . "&OpenCurlyDoubleQuote;"
                                    . $data["seccion"] . "&OpenCurlyDoubleQuote;"; ?>
                            </label>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <?php
            $femeninoS = mysqli_query($enlace, "SELECT asistencia.nie,estudiantes.sexo,seccion.idSeccion FROM estudiantes  JOIN estudiantesxseccion ON estudiantes.nie = estudiantesxseccion.nie  JOIN seccion ON seccion.idSeccion = estudiantesxseccion.idSeccion  JOIN asistencia ON estudiantes.nie = asistencia.nie WHERE estudiantes.sexo = 'Mujer' && asistencia.fecha = '$date' && seccion.idSeccion = '$idSeccion'");
            $masculinoS = mysqli_query($enlace, "SELECT asistencia.nie,estudiantes.sexo,seccion.idSeccion FROM estudiantes  JOIN estudiantesxseccion ON estudiantes.nie = estudiantesxseccion.nie  JOIN seccion ON seccion.idSeccion = estudiantesxseccion.idSeccion  JOIN asistencia ON estudiantes.nie = asistencia.nie WHERE estudiantes.sexo = 'Hombre' && asistencia.fecha = '$date' && seccion.idSeccion = '$idSeccion'");

            //variables que alojan el total por sexo
            $femenino = mysqli_num_rows($femeninoS);
            $masculino = mysqli_num_rows($masculinoS);

            $seccTotal = mysqli_query($enlace, "SELECT estudiantes.nie FROM estudiantes  JOIN estudiantesxseccion ON estudiantes.nie = estudiantesxseccion.nie  JOIN seccion ON seccion.idSeccion = estudiantesxseccion.idSeccion WHERE seccion.idSeccion = '$idSeccion'");
            $consultaTSecc = mysqli_query($enlace, "SELECT asistencia.fecha FROM estudiantes  JOIN estudiantesxseccion ON estudiantes.nie = estudiantesxseccion.nie  JOIN seccion ON seccion.idSeccion = estudiantesxseccion.idSeccion  JOIN asistencia ON estudiantes.nie = asistencia.nie WHERE seccion.idSeccion = '$idSeccion' && asistencia.fecha = '$date'");

            //variable que aloja el total de la seccion recibida
            $total = mysqli_num_rows($seccTotal);

            //variable para total asistidos de ese dia
            $asistieron = mysqli_num_rows($consultaTSecc);
            //operacion
            $inasistencia = $asistieron - $total;

            ?>
            <div class="graficsContainer">
                <div id="grafics">
                    <div class="grafica" id="gAsis">
                        <canvas id="myChart"></canvas>
                    </div>

                    <div class="grafica" id="gGender">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>

                <div class="switch">
                    <button id="asis"></button>

                    <button id="gender"></button>
                </div>
            </div>
        </aside>
    </section>

    <footer>
        <p>
            IMTECH &copy; 2022 Todos los derechos reservados
            &boxv;

            <a href="#">Términos y condiciones</a>
            &bull;
            <a href="#">Política de privacidad</a>
        </p>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../js/grafics.js"></script>
<script>
    // *---------------------------------------------Código para las gráficas del listado de estudiantes------------------------
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Presentes', 'Faltaron', ],
            datasets: [{
                label: '# de votos',
                data: [<?php echo $asistieron ?>, <?php echo $inasistencia  ?>],
                backgroundColor: [
                    'rgb(35, 255, 71)',
                    'rgba(248, 59, 59)',
                ],
                borderColor: [
                    'white',
                    'white'
                ],
                borderWidth: 1
            }]
        },
    });

    const ctx1 = document.getElementById('myChart1').getContext('2d');
    const myChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Hombres', 'Mujeres', ],
            datasets: [{
                label: '# de votos',
                data: [<?php echo $masculino ?>, <?php echo $femenino ?>],
                backgroundColor: [
                    '#0f34da',
                    '#eb5dcc',
                ],
                borderColor: [
                    'white',
                    'white'
                ],
                borderWidth: 1
            }]
        },
    });
</script>

</html>