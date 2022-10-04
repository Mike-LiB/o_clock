<?php

//creamos un objeto de la clase
use Dompdf\Dompdf;

$domp = new Dompdf();

//activamos las opciones de la libreria para cargar lo del html
$opciones = $domp->getOptions();
$opciones->set(array('isRemoteEnabled' => true));
$domp->setOptions($opciones);

//formatos
$domp->loadHtml($body);
// $domp->setPaper('A4', 'landscape');

//creamos el archivo
$domp->render();

 //false muestra vista previa en el navegador true lo descarga
$domp->stream("carnets.pdf", array("Attachment" => false));
