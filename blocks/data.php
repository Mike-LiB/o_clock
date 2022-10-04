<?php
require("../php/conexion.php");
$sectInfo = $_REQUEST["idSeccion"];
$consultaEstudiantes = mysqli_query($enlace, "SELECT estudiantes.nie, estudiantes.nombre, estudiantes.apellido, estudiantes.fechaNacimiento, estudiantes.sexo, seccion.tipoBachillerato FROM estudiantes JOIN estudiantesxseccion ON estudiantes.nie = estudiantesxseccion.nie JOIN seccion ON seccion.idSeccion = estudiantesxseccion.idSeccion WHERE seccion.idSeccion = '$sectInfo'");
$consultEncabezado = mysqli_query($enlace, "SELECT * FROM seccion WHERE idSeccion = '$sectInfo' LIMIT 1  ");
?>

<?php
while ($encabezado = mysqli_fetch_array($consultEncabezado, MYSQLI_ASSOC)) {
    $nombre = $encabezado["seccion"];
    $year = $encabezado["anho"];
    $espe = $encabezado["tipoBachillerato"];
}
?>

<div id="sectInfoBG">

    <div id="sectInfoContainer">

        <div class="sectHead">
            <h1><?php echo $year . "&deg; " . "&OpenCurlyDoubleQuote;" .
                    $nombre . "&OpenCurlyDoubleQuote;"; ?></h1>

            <button id="closeInfo">
                <i class="fa-solid fa-close"></i>
            </button>
        </div>

        <div class="info">
            <p><b>Estudiantes:</b> <?php echo mysqli_num_rows($consultaEstudiantes) ?></p>
            <p><b>Especialidad:</b> <?php echo $espe ?> </p>
            <hr>


            <div class="sectionStdntsList">
                <table class="titles">
                    <thead>
                        <th class="nie">NIE</th>
                        <th class="lastNames">Apellidos</th>
                        <th class="names">Nombres</th>
                        <th class="birth">Fecha de Nacimiento</th>
                        <th class="sex">Sexo</th>
                        <th class="actions">Acciones</th>
                    </thead>
                </table>

                <div class="list">
                    <table>
                        <tbody>
                            <?php
                            while ($datos = mysqli_fetch_array($consultaEstudiantes, MYSQLI_ASSOC)) :
                            ?>

                                <tr>
                                    <td class="nie">
                                        <?php echo $datos['nie'] ?>
                                    </td>
                                    <td class="lastNames">
                                        <?php echo $datos['apellido'] ?>
                                    </td>
                                    <td class="names">
                                        <?php echo $datos['nombre'] ?>
                                    </td>
                                    <td class="birth">
                                        <?php echo $datos['fechaNacimiento'] ?>
                                    </td>
                                    <td class="sex">
                                        <?php echo $datos['sexo'] ?>
                                    </td>
                                    <td class="actions">
                                        <button id="editStdnt">
                                            <a href="../blocks/editarStdnt.php?nie=<?php echo $datos['nie'] ?>"><i class="fa-solid fa-pen"></i></a>
                                        </button>

                                        <button id="deleteStdnt">
                                            <a href="../php/deleteStdnt.php?nie=<?php echo $datos['nie'] ?>"><i class="fa-solid fa-trash"></i></a>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="btns">
            <button id="deleteSect">
                <i class="fa-solid fa-trash"></i>
                Eliminar sección
            </button>

            <button id="addStudent" title="Agregar estudiante">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>

</div>

<div id="warningBG">
    <div class="warningContainer">
        <h3>¿Está seguro que desea eliminar?</h3>
        <p>Esta acción <u>no se puede deshacer</u></p>

        <div class="btns">
            <a id="" href="deleteSection.php?idSetion=<?php echo $sectInfo ?>" id="aceptAction">
                Aceptar
            </a>

            <button id="cancelAction">
                Cancelar
            </button>
        </div>
    </div>
</div>