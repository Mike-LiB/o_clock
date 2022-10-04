<?php
    include("conexion.php");

    $idSeccion = $_GET['idSeccion'];
    date_default_timezone_set("America/El_Salvador");
    $date = date("Y-m-d");

    include("../pages/plugins/phpspreadsheet/vendor/autoload.php");
    use PhpOffice\PhpSpreadsheet\{SpreadSheet, IOFactory, Style\Fill, Style\Alignment};

    $fondoEncabezado = [
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => [
                'rgb' => '78C417'
            ]
        ],
    ];

    $consulta = mysqli_query($enlace, "SELECT estudiantes.nie, estudiantes.nombre, estudiantes.apellido, estudiantes.sexo, seccion.year, seccion.seccion, seccion.tipoBachillerato, seccion.turno,
        asistencia.fecha, asistencia.hora, asistencia.estado FROM estudiantes INNER JOIN estudiantesxseccion ON estudiantes.nie = estudiantesxseccion.nie INNER JOIN seccion 
        ON seccion.idSeccion = estudiantesxseccion.idSeccion INNER JOIN asistencia ON estudiantes.nie = asistencia.nie WHERE asistencia.fecha = '$date' && 
        seccion.idSeccion = '$idSeccion' ORDER BY asistencia.fecha, asistencia.horaEntrada ASC ");
    
    $excel = new SpreadSheet();

    //estilos para el archivo
    $excel->getDefaultStyle()->getFont()->setName('Arial');
    $excel->getActiveSheet()->getStyle('A:K')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $excel->getProperties()->setCreator("O'Clock");
    $hoja = $excel->getActiveSheet();
    $hoja->setTitle("O'Clock - INCAS");

    //espacios entre cada celda
    $hoja->getColumnDimension('A')->setWidth(10);
    $hoja->getColumnDimension('B')->setWidth(20);
    $hoja->getColumnDimension('C')->setWidth(20);
    $hoja->getColumnDimension('D')->setWidth(10);
    $hoja->getColumnDimension('E')->setWidth(10);
    $hoja->getColumnDimension('F')->setWidth(10);
    $hoja->getColumnDimension('G')->setWidth(50);
    $hoja->getColumnDimension('H')->setWidth(10);
    $hoja->getColumnDimension('I')->setWidth(10);
    $hoja->getColumnDimension('J')->setWidth(10);
    $hoja->getColumnDimension('K')->setWidth(10);

    //Encabezados
    $hoja->setCellValue('A1', 'NIE');
    $hoja->setCellValue('B1', 'APELLIDO');
    $hoja->setCellValue('C1', 'NOMBRE');
    $hoja->setCellValue('D1', 'SEXO');
    $hoja->setCellValue('E1', 'AÑO');
    $hoja->setCellValue('F1', 'SECCION');
    $hoja->setCellValue('G1', 'BACHILLERATO');
    $hoja->setCellValue('H1', 'TURNO');
    $hoja->setCellValue('I1', 'FECHA');
    $hoja->setCellValue('J1', 'HORA');
    $hoja->setCellValue('K1', 'ESTADO');

    //le damos el color al encabezado
    $excel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($fondoEncabezado);

    //contador para que inicide en la segunda fila, ya que los encabezados ocupan la primera
    $conta = 2;
    while ($f = $result->fetch_assoc()) {
        $hoja->setCellValue('A' . $conta, $f['nie']);
        $hoja->setCellValue('B' . $conta, $f['apellido']);
        $hoja->setCellValue('C' . $conta, $f['nombre']);
        $hoja->setCellValue('D' . $conta, $f['sexo']);
        $hoja->setCellValue('E' . $conta, $f['year']);
        $hoja->setCellValue('F' . $conta, $f['seccion']);
        $hoja->setCellValue('G' . $conta, $f['tipoBachillerato']);
        $hoja->setCellValue('H' . $conta, $f['turno']);
        $hoja->setCellValue('I' . $conta, $f['fecha']);
        $hoja->setCellValue('J' . $conta, $f['hora']);
        $hoja->setCellValue('K' . $conta, $f['estado']);
        $conta++;
    }

    //para que se descargue cuando se presione el boton de reporte
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Reporte Asistencia"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
    exit;
?>