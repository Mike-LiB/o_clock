var loadingBG = document.getElementById('loadingBG');
loadingBG.style.display = 'none';

var windowBG = document.getElementById('windowBG');
windowBG.style.display = 'none';

function changeWindow() {
    loadingBG.style.display = 'flex';

    setTimeout(function() {
        loadingBG.style.opacity = '1';
    }, 100);

    setTimeout(function() {
        windowBG.style.display = 'flex';

        setTimeout(function() {
            loadingBG.style.opacity = '0';

            setTimeout(function() {
                loadingBG.style.display = 'none';
                windowBG.style.opacity = '1';
            }, 100);
        }, 200);
        
    }, 1000);
}

changeWindow();