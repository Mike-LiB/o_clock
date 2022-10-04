var sectInfo = document.getElementById('sectInfoBG');
var warning = document.getElementById('warningBG');
warning.style.display = 'none';

var closeInfo = document.getElementById('closeInfo');
var deleteSect = document.getElementById('deleteSect');
var cancelAction = document.getElementById('cancelAction');

var openSectInfo = true;

function openClose_sectInfo () {
    if (openSectInfo) {
        sectInfo.style.display = 'none';
    } 
}

function showWarning () {
    warning.style.display = 'flex';

    setTimeout(() => {
        warning.style.opacity = '1';
    }, 100);
}

function closeWarning () {
    warning.style.opacity = '0';

    setTimeout(() => {
        warning.style.display = 'none';
    }, 100);
}

closeInfo.onclick = openClose_sectInfo;

deleteSect.onclick = showWarning;
cancelAction.onclick = closeWarning;
