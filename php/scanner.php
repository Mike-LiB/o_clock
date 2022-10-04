<?php
    require("conexion.php");
    $nie = $_POST["nie"];

    date_default_timezone_set("America/El_Salvador");
    $date = date("Y-m-d");
    

    $consultaAsistencia = mysqli_query($enlace,"SELECT * FROM asistencia WHERE fecha='$date' && nie='$nie'");
    
    $resultado = mysqli_num_rows($consultaAsistencia);
    
    if ($resultado <= 1)
    {
        
        date_default_timezone_set("America/El_Salvador");
        $hora=date("h:i A");
        
        $consultaTarde = mysqli_query($enlace,
        "SELECT * FROM asistencia WHERE nie='$nie' && fecha='$date' AND hora BETWEEN '12:29:00 am' AND '18:10:00 pm'");
        $resultadoTarde = mysqli_num_rows($consultaTarde);
        if 
        (
        (strtotime($hora) >=strtotime('06:29 AM') && strtotime($hora) <=strtotime('07:10 AM') && $resultado==0) || 
        (strtotime($hora) >=strtotime('12:29 PM') && strtotime($hora) <=strtotime('1:15 PM') && $resultadoTarde==0) 
        )
        {
            do {
                $idAsis = uniqid();
                $consulta = mysqli_query($enlace,"SELECT idAsistencia FROM asistencia WHERE idAsistencia='$idAsis'");
                $resul = mysqli_num_rows($consulta);
        
            } while ($resul >=1);
        
            mysqli_query($enlace,"INSERT INTO asistencia(idAsistencia,nie,fecha,hora,estado)
            VALUES('$idAsis','$nie',NOW(),CURTIME(),'pendiente')");
        
        }else if 
        (
        (strtotime($hora) >=strtotime('10:00 AM') && strtotime($hora) <=strtotime('12:15 PM') && $resultado==1) || 
        (strtotime($hora) >=strtotime('3:00 PM') && strtotime($hora) <=strtotime('6:00 PM') && $resultadoTarde==1) 
        )
        {
            do {
                $idAsis = uniqid();
                $consulta = mysqli_query($enlace,"SELECT idAsistencia FROM asistencia WHERE idAsistencia='$idAsis'");
                $resul = mysqli_num_rows($consulta);
        
            } while ($resul >=1);
        
            mysqli_query($conexion,"INSERT INTO asistencia(idAsistencia,nie,fecha,hora,estado)
            VALUES('$idAsis','$nie',NOW(),CURTIME(),'pendiente')");
        
        }
    }
