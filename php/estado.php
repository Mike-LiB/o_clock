<?php

$estado = "";
date_default_timezone_set("America/El_Salvador");
$hora = date("h:i A");

if ((strtotime($hora) >= strtotime('06:25 AM') && strtotime($hora) <= strtotime('07:00 AM')) || (strtotime($hora) >= strtotime('12:25 PM') && strtotime($hora) <= strtotime('1:00 PM'))) {
    $estado = "Asistio " ;
} else if ((strtotime($hora) >= strtotime('07:00 AM') && strtotime($hora) <= strtotime('07:15 AM')) || (strtotime($hora) >= strtotime('1:00 PM') && strtotime($hora) <= strtotime('1:15 PM'))) {
    $estado = "Asistio Tarde ";
} else if ((strtotime($hora) >= strtotime('10:00 AM') && strtotime($hora) <= strtotime('12:15 PM')) || (strtotime($hora) >= strtotime('3:00 PM') && strtotime($hora) <= strtotime('6:00 PM'))) {
    $estado = "Salida ";
}else{
    $estado = "Sistema Inhabilitado  " . $hora;
}

?>