var scanner = new Instascan.Scanner({
    video: document.getElementById("nieCamara"),
});

Instascan.Camera.getCameras()
    .then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert("No detectado");
        }
    })
    .catch(function (e) {
        console.error(e);
    });

scanner.addListener("scan", function (valor) {
    $.post("../php/scanner.php", { nie: valor }, function (data) {
        console.log("datos enviados");
        // console.log(data);
        location.reload();
    });
});
