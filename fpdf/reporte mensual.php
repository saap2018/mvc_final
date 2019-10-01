<?php
	
	session_start();
	include 'plantilla2.php';
	require 'conexion.php';
	$mes = date("m");
	$mesenletras = date("M"); 
	$query = "select(ingresos.fecha) as Ingreso,ingresos.fechasalida as Salida, (ingresos.tiempo) as  Hora_Entrada,ingresos.horasalida as Hora_salida, ingresos.Placas, ingresos.Lugar,vehiculos.NombreCliente,vehiculos.Marca,(vehiculos.TipoV) as Tipo from ingresos left join vehiculos on ingresos.Placas = vehiculos.Placas where MONTH (fecha) = '$mes' ORDER BY ingresos.fecha ";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF('L','mm','Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	while($row = $resultado->fetch_assoc())
	{
	$pdf->Cell(80,8,'Reporte del dia: '.$mesenletras,0,1,'C');
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(60,6,'Nombre Cliente',1,0,'C',1);
	$pdf->Cell(40,6,'Marca',1,0,'C',1);
	$pdf->Cell(40,6,'Placas',1,0,'C',1);
	$pdf->Cell(40,6,'Fecha Ingreso',1,0,'C',1);
	$pdf->Cell(40,6,'Fecha Salida',1,0,'C',1);
	$pdf->Cell(40,6,'Hora Ingreso',1,0,'C',1);
	$pdf->Cell(40,6,'Hora Salida',1,0,'C',1);
	$pdf->Cell(40,6,'Lugar',1,1,'C',1);
	
	$pdf->Cell(60,8,utf8_decode($row['NombreCliente']),1,0,'C');
	$pdf->Cell(40,8,utf8_decode($row['Marca']),1,0,'C');
	$pdf->Cell(40,8,utf8_decode($row['Placas']),1,0,'C');
	$pdf->Cell(40,8,utf8_decode($row['Ingreso']),1,0,'C');
	$pdf->Cell(40,8,utf8_decode($row['Salida']),1,0,'C');
	$pdf->Cell(40,8,utf8_decode($row['Hora_Entrada']),1,0,'C');
	$pdf->Cell(40,8,utf8_decode($row['Hora_salida']),1,0,'C');
	$pdf->Cell(40,8,utf8_decode($row['Lugar']),1,0,'C');
	
		}
	
	$pdf->Output();
?>