var gender = document.getElementById('gender');
var asis = document.getElementById('asis');
asis.style.scale = '1.3';

function switchGenderGrafic() {
    document.getElementById('grafics').style.translate = '-30%';
    gender.style.scale = '1.3';
    asis.style.scale = '1'
}

function switchAsisGrafic() {
    document.getElementById('grafics').style.translate = '30%';
    asis.style.scale = '1.3'
    gender.style.scale = '1';
}

asis.onclick = switchAsisGrafic;
gender.onclick = switchGenderGrafic;
