<div id="formContainerUser">
    <form action="../php/addNewUser.php" method="POST" id="formUser" autocomplete="off">
        <div class="combo">
            <div class="inputBox">
                <input type="text" name="names" id="names" required>
                <label for="names">Nombres</label>
            </div>

            <div class="inputBox">
                <input type="text" name="lastNames" id="lastNames" required>
                <label for="lastNames">Apellidos</label>
            </div>

            <div class="inputBox">
                <!-- cambie de nie a nip id -->
                <input type="tel" name="nip" id="nip" maxlength="10" required>
                <label for="nie">NIP</label>
            </div>
        </div>

        <div class="combo">
            <div class="inputBox">
                <!-- cambie de names a usuario id -->
                <input type="text" name="usuario" id="usuario" required>
                <label for="names">Nombre de usuario</label>
            </div>

            <div class="inputBox">
                <!-- cambie de lastNames a password id -->
                <input type="text" name="password" id="password" required>
                <label for="lastNames">Contraseña</label>
            </div>
        </div>

        <div class="inputBox">
            <!-- cambie de names a email id -->
            <input type="email" name="email" id="email" required>
            <label for="email">E-mail</label>
        </div>

        <div class="comboBox">
            <select name="tipoUsu" id="tipoUsu" required>
                <option value="" hidden selected></option>
                <option value="docente">Docente</option>
                <option value="admin">Administrador</option>
                <option value="CA">CA (Control Asistencia)</option>
            </select>
            <label for="tipoUsu">Tipo de usuario</label>
        </div>

        <div class="buttons">
            <button type="submit" name="guardarUser" id="guardarUser">
                <i class="fa-solid fa-check" style="color: limegreen;"></i>
                &ThickSpace;
                Guardar
            </button>

            <button type="reset" id="cancelarUser">
                <i class="fa-solid fa-close" style="color: #d20000;"></i>
                &ThickSpace;
                Cancelar
            </button>
        </div>
    </form>
</div>