// *Variables para el formulario de los usuarios
var newUser = document.getElementById('formContainerUser');
var addUser = document.getElementById('addUser');
var cancelUser = document.getElementById('cancelarUser');
newUser.style.display = 'none';

var newUserOpen = false;

// *Funciones para abrir y cerrar los formularios
function openClose_userForm() {
    if (!newUserOpen) {
        newUser.style.display = 'flex';
        newUserOpen = true;
    } else {
        newUser.style.display = 'none';
        newUserOpen = false;
    }
}

// *Llamamos las funciones cuando el usuario de click en los botones correspondientes
addUser.onclick = openClose_userForm;
cancelUser.onclick = openClose_userForm;