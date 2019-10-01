<?php
	require 'fpdf.php';
	require 'conexion.php';
	class PDF extends FPDF
	{
		function Header()
		{
			require 'conexion.php';
	$query = sprintf("SELECT * FROM parametros");
	$resultado = $mysqli->query($query);
	$row = $resultado->fetch_assoc();
	$nombre = $row['Nombre_Empresa'];
	$NIT = $row['identificacion'];
	$direccion = $row['Direccion'];
	$telefonos = $row['Telefonos'];
	$correo = $row['correo'];
	$this->SetFont('Arial','',20);
	$this->Cell(350,5,$nombre,0,1,'C');
	$this->SetFont('Arial','',14);
	$this->Cell(350,5,$NIT,0,1,'C');
	$this->Cell(350,5,$direccion,0,1,'C');
	$this->Cell(350,5,$telefonos,0,1,'C');
	$this->Cell(350,5,$correo,0,1,'C');
	$this->Ln(5);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>