// *Variables para el formulario de las secciones
var newSection = document.getElementById('newSectionContainer');
var addSect = document.getElementById('addSect');
var closeNewSect = document.getElementById('cancelNewSect');
newSection.style.display = 'none';

// *Variables tipo booleanas para evaluar si los formularios han sido abiertos o no
var newSectionOpen = false;

function openClose_sectionForm() {
    if (!newSectionOpen) {
        newSection.style.display = 'flex';
        newSectionOpen = true;
    } else {
        newSection.style.display = 'none';
        newSectionOpen = false;
    }
}

addSect.onclick = openClose_sectionForm;
closeNewSect.onclick = openClose_sectionForm;
