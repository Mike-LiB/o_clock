// *Variables para el formulario de los estudiantes
var newStdnt = document.getElementById('formContainerStdnt');
var addStudent = document.getElementById('addStudent');
var cancelStdnt = document.getElementById('cancelarStdnt');
newStdnt.style.display = 'none';

function openClose_stdntForm() {
    if (!newStdntOpen) {
        newStdnt.style.display = 'flex';
        newStdntOpen = true;
    } else {
        newStdnt.style.display = 'none';
        newStdntOpen = false;
    }
}

addStudent.onclick = openClose_stdntForm;
cancelStdnt.onclick = openClose_stdntForm;
