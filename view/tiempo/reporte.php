<?php
	include '../../fpdf/plantilla.php';
	require '../../fpdf/conexion.php';
	
	$query = "SELECT Placas , fecha, fechasalida, tiempo , horasalida ,(datediff (fechasalida, fecha)) as dias, hour(TIMEDIFF (horasalida, tiempo)) As horas, minute(TIMEDIFF (horasalida, tiempo)) As minutos from ingresos where liquidado = 'No' And Placas = Placas";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(25,6,'Placas',1,0,'C',1);
	$pdf->Cell(25,6,'Fecha Entrada',1,0,'C',1);
	$pdf->Cell(25,6,'Fecha Salida',1,0,'C',1);
	$pdf->Cell(25,6,'Hora Entrada',1,0,'C',1);
	$pdf->Cell(25,6,'Hora Salida',1,0,'C',1);
	$pdf->Cell(25,6,'Dias',1,0,'C',1);
	$pdf->Cell(25,6,'Horas',1,0,'C',1);
	$pdf->Cell(25,6,'Minutos',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,'Estudiante',1,0,'C',1);
	$pdf->Cell(120,6,$nombrecompleto,1,1,'C');
	$pdf->Cell(40,6,'Codigo',1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode ($row['idmatricula']),1,0,'C');
	$pdf->Cell(40,6,'Curso',1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode ($row['grado']),1,1,'C');
	}
	$pdf->Output();
?>