var formStdnt = document.getElementById('formStdnt');
var input = document.querySelectorAll('input');
var boton = document.getElementById('showData');

input.validationMessage.replace('Rellena este campo', '¡No deben quedar campos vacíos!')

boton.onclick = console.log(input.value);