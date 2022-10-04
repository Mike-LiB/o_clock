<?php
error_reporting(0);
require '../php/conexion.php';
$nie = $_REQUEST['nie'];
$consulta = mysqli_query($enlace, "SELECT estudiantes.nie, estudiantes.nombre,estudiantes.apellido,estudiantes.sexo,estudiantes.foto,seccion.year,seccion.seccion,
                seccion.tipoBachillerato,seccion.turno, estudiantesxseccion.nip FROM estudiantes INNER JOIN estudiantesxseccion ON estudiantes.nie=estudiantesxseccion.nie 
                        INNER JOIN seccion ON seccion.idSeccion=estudiantesxseccion.idSeccion WHERE estudiantes.nie = '$nie'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>

<body>

    <div id="formContainerStdnt">
        <form action="../php/updatestdnt.php" method="post" id="formStdnt" autocomplete="off" enctype="multipart/form-data">
            <!-- TODO: Lograr hacer que se muestre la foto cargada -->

            <?php while ($datos = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            ?>
                <div class="pic_container">
                    <div class="stdn-pic">
                        <div id="loadedPicture">
                            <i class="fa-solid fa-image"></i>
                        </div>
                        <!-- <input type="file" name="pic" id="pic"> -->
                        <img src="data:image/jpg;base64,<?php echo base64_encode($datos['foto']); ?>" alt="Foto del estudiante">
                        <!-- <label for="pic">
                            <i class="fa-solid fa-upload"></i>
                            Foto
                        </label> -->
                    </div>
                </div>

                <div class="inputBox" id="nieBox">
                    <input type="text" name="nie" id="nie" value="<?php echo $datos['nie'] ?>" maxlength="10" required>
                    <label for="nie">NIE</label>
                </div>

                <div class="combo">
                    <div class="inputBox">
                        <input type="text" name="names" id="names" value="<?php echo $datos['nombre'] ?>" autocapitalize="words" required>
                        <label for="names">Nombres</label>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="lastNames" id="lastNames" value="<?php echo $datos['apellido'] ?>" autocapitalize="words" required>
                        <label for="lastNames">Apellidos</label>
                    </div>
                </div>


                <!--* En este caso no es necesario agregar datos de la base -->
                <fieldset>
                    <legend>Sexo</legend>

                    <div class="radioBox">
                        <input type="radio" name="sex" id="masc" value="M" required>
                        <label for="masc" class="fill">
                            <span></span>
                        </label>
                        <label for="masc">Masculino</label>
                    </div>

                    <div class="radioBox">
                        <input type="radio" name="sex" id="fem" value="F" required>
                        <label for="fem" class="fill">
                            <span></span>
                        </label>
                        <label for="fem">Femenino</label>
                    </div>
                </fieldset>

                <div class="comboBox">
                    <select name="esp" id="esp" required>
                        <option value="<?php echo $datos['tipoBachillerato'] ?>" hidden selected></option>
                        <?php
                        $query = mysqli_query($enlace, "SELECT * FROM seccion ORDER BY seccion.year ASC");
                        while ($datos = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        ?>
                            <option value="<?php echo $datos['idSeccion'] ?>">
                                <?php echo $datos['year'] . '&deg ' . "&OpenCurlyDoubleQuote;"
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
                        <option value="<?php echo $datos['nip'] ?>" hidden selected></option>
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
                    <label for="guideDoc">Docente guía</label>
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

                <button type="reset" id="cancelarStdnt">
                    <i class="fa-solid fa-close" style="color: #d20000;"></i>
                    &ThickSpace;
                    Cancelar
                </button>
            </div>
        </form>
    </div>
    <script src="../js/formEdit.js"></script>
</body>

</html>