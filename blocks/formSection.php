<div id="newSectionContainer">
    <form action="../php/addNewSect.php" method="post" id="newSection" autocomplete="off">
        <div class="combo">
            <div class="inputBox">
                <input type="text" name="grade" id="grade" maxlength="1" required>
                <label for="grade">Año</label>
            </div>

            <div class="inputBox">
                <input type="text" name="seccion" id="seccion" maxlength="1" 
                autocapitalize="characters" required>
                <label for="seccion">Nombre</label>
            </div>

            <div class="comboBox">
                <select name="turno" id="turno" required>
                    <option value="" selected hidden></option>
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                </select>
                <label for="turno">Turno</label>
            </div>
        </div>

        <div class="inputBox">
            <input type="text" name="especialidad" id="especialidad" autocapitalize="on" required>
            <label for="especialidad">Especialidad</label>
        </div>

        <div class="buttons">
            <button type="submit" id="saveNewSect">
                <i class="fa-solid fa-check" style="color: limegreen;"></i>
                &ThickSpace;
                Guardar
            </button>

            <button type="reset" id="cancelNewSect">
                <i class="fa-solid fa-close" style="color: #d20000;"></i>
                &ThickSpace;
                Cancelar
            </button>
        </div>
    </form>
</div>