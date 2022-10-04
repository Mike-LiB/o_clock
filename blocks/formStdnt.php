<?php
require '../php/conexion.php';
?>

<div id="formContainerStdnt">
    <form action="../php/addNewStdnt.php" method="post" id="formStdnt" autocomplete="off" enctype="multipart/form-data">
        <!-- TODO: Lograr hacer que se muestre la foto cargada -->
        <div class="pic_container">
            <div class="stdn-pic">
                <div id="loadedPicture">
                    <i class="fa-solid fa-image"></i>
                </div>

                <input type="file" name="pic" id="pic">
                <label for="pic">
                    <i class="fa-solid fa-upload"></i>
                    Foto
                </label>
            </div>
        </div>

        <div class="inputBox" id="nieBox">
            <input type="text" name="nie" id="nie" maxlength="10" required>
            <label for="nie">NIE</label>
        </div>

        <div class="combo">
            <div class="inputBox">
                <input type="text" name="names" id="names" autocapitalize="words" required>
                <label for="names">Nombres</label>
            </div>

            <div class="inputBox">
                <input type="text" name="lastNames" id="lastNames" autocapitalize="words" required>
                <label for="lastNames">Apellidos</label>
            </div>
        </div>

        <!-- TODO: Arreglar esta mamada -->
        <div class="comboDate">
            <div class="comboBox" id="monthBox">
                <select name="month" id="month" required>
                    <option value="" hidden selected></option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <label for="month">Mes</label>
            </div>

            <div class="comboBox" id="dayBox">
                <select name="day" id="day" required>
                    <option value="" hidden selected></option>
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <label for="day">Día</label>
            </div>
            <!-- Hasta aquí -->

            <div class="inputBox">
                <input type="text" name="bYear" id="bYear" minlength="4" maxlength="4" required>
                <label for="bYear">Año</label>
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
            <label for="guideDoc">Docente guía</label>
        </div>

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