<?php
	$conn = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($conn, "saap");
$Recordset5 = mysqli_query($conn, "SELECT * FROM ingresos ") or die(mysqli_error($conn));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
	session_start();
	include 'plantilla.php';
	require 'conexion.php';
	$idcontrol= $_GET['idci'];
	
	$query = "SELECT Placas , fecha, fechasalida, tiempo , horasalida ,(datediff (fechasalida, fecha)) as dias, hour(TIMEDIFF (horasalida, tiempo)) As horas, minute(TIMEDIFF (horasalida, tiempo)) As minutos from ingresos where IdControlIngreso = '$idcontrol'";
	$resultado = $mysqli->query($query);
	while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
    $rows = mysqli_num_rows($Recordset5);
    if($rows > 0) {
       mysqli_data_seek($Recordset5, 0);
	   $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
	   $cambiar = "UPDATE ingresos SET liquidado ='Si' where IdControlIngreso ='$idcontrol'";
	  $update= mysqli_query($conn, $cambiar);    
  }
	$valordia = "SELECT valor FROM tarifas WHERE tarifa='Dia'";
	$resultado1 = $mysqli->query($valordia);
	$valorhora = "SELECT valor FROM tarifas WHERE tarifa='Hora'";
	$resultado2 = $mysqli->query($valorhora);
	$valorminuto = "SELECT valor FROM tarifas WHERE tarifa='Minuto'";
	$resultado3 = $mysqli->query($valorminuto);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	while($row = $resultado->fetch_assoc())
	{
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(180,8,'Placas',1,1,'C',1);
	$pdf->Cell(180,8,utf8_decode($row['Placas']),1,1,'C');
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(45,6,'Fecha Entrada',1,0,'C',1);
	$pdf->Cell(45,6,'Fecha Salida',1,0,'C',1);
	$pdf->Cell(45,6,'Hora Entrada',1,0,'C',1);
	$pdf->Cell(45,6,'Hora Salida',1,1,'C',1);
	$pdf->Cell(45,6,$row['fecha'],1,0,'C');
	$pdf->Cell(45,6,$row['fechasalida'],1,0,'C');
	$pdf->Cell(45,6,utf8_decode($row['tiempo']),1,0,'C');
	$pdf->Cell(45,6,utf8_decode($row['horasalida']),1,1,'C');
	$pdf->Cell(60,6,'Dias',1,0,'C',1);
	$pdf->Cell(60,6,'Horas',1,0,'C',1);
	$pdf->Cell(60,6,'Minutos',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,6,utf8_decode($row['dias']),1,0,'C');
	$pdf->Cell(60,6,utf8_decode($row['horas']),1,0,'C');
	$pdf->Cell(60,6,utf8_decode($row['minutos']),1,1,'C');

	while($row1 = $resultado1->fetch_assoc())
	{
	$totaldias = $row1['valor']*$row['dias']; 
	$pdf->Cell(60,6,$totaldias,1,0,'C');
	}
	while($row2 = $resultado2->fetch_assoc())
	{
	$totalhoras = $row2['valor']*$row['horas']; 	
	$pdf->Cell(60,6,$totalhoras,1,0,'C');
	}
	while($row3 = $resultado3->fetch_assoc())
	{
	$totalminutos = $row3['valor']*$row['minutos']; 	
	$pdf->Cell(60,6,$totalminutos,1,1,'C');
	}
	$totalapagar = $totalminutos;
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(60,6,'Total a pagar',1,0,'C',1);
	$pdf->Cell(120,6,$totaldias+$totalhoras+$totalminutos,1,1,'C');
	$pdf->Cell(180,6,'CLIENTE',1,1,'C');
	//Espacios 
	$pdf->Cell(180,6,'',0,1,'C');
	$pdf->Cell(180,6,'',0,1,'C');
	$pdf->Cell(180,6,'',0,1,'C');
	$pdf->Cell(180,6,'',0,1,'C');
	$pdf->Cell(180,6,'',0,1,'C');
	//Fin espacios 
	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(180,8,'Placas',1,1,'C',1);
	$pdf->Cell(180,8,utf8_decode($row['Placas']),1,1,'C');
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(45,6,'Fecha Entrada',1,0,'C',1);
	$pdf->Cell(45,6,'Fecha Salida',1,0,'C',1);
	$pdf->Cell(45,6,'Hora Entrada',1,0,'C',1);
	$pdf->Cell(45,6,'Hora Salida',1,1,'C',1);
	$pdf->Cell(45,6,$row['fecha'],1,0,'C');
	$pdf->Cell(45,6,$row['fechasalida'],1,0,'C');
	$pdf->Cell(45,6,utf8_decode($row['tiempo']),1,0,'C');
	$pdf->Cell(45,6,utf8_decode($row['horasalida']),1,1,'C');
	$pdf->Cell(60,6,'Dias',1,0,'C',1);
	$pdf->Cell(60,6,'Horas',1,0,'C',1);
	$pdf->Cell(60,6,'Minutos',1,1,'C',1);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,6,utf8_decode($row['dias']),1,0,'C');
	$pdf->Cell(60,6,utf8_decode($row['horas']),1,0,'C');
	$pdf->Cell(60,6,utf8_decode($row['minutos']),1,1,'C');

	while($row1 = $resultado1->fetch_assoc())
	{
	$totaldias = $row1['valor']*$row['dias']; 
	$pdf->Cell(60,6,$totaldias,1,0,'C');
	}
	while($row2 = $resultado2->fetch_assoc())
	{
	$totalhoras = $row2['valor']*$row['horas']; 	
	$pdf->Cell(60,6,$totalhoras,1,0,'C');
	}
	while($row3 = $resultado3->fetch_assoc())
	{
	$totalminutos = $row3['valor']*$row['minutos']; 	
	$pdf->Cell(60,6,$totalminutos,1,1,'C');
	}
	$totalapagar = $totalminutos;
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(60,6,'Total a pagar',1,0,'C',1);
	$pdf->Cell(120,6,$totaldias+$totalhoras+$totalminutos,1,1,'C');
	$pdf->Cell(180,6,'PARQUEADERO',1,1,'C');	
		}
	
	$pdf->Output();
?>