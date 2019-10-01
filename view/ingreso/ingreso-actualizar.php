<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset2 = mysqli_query($link, "SELECT nombre_tipov FROM tipo_de_vehiculo") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset3 = mysqli_query($link, "SELECT tarifa FROM tarifas") or die(mysqli_error($link));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$con= mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset4 = mysqli_query($link, "SELECT * FROM vehiculos where Estado ='Activo'") or die(mysqli_error($link));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset6 = mysqli_query($link, "SELECT * FROM disponibilidad where Disponibilidad='Activo'") or die(mysqli_error($link));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);
?>
<h1 class="page-header">
    <?php echo $alm->IdControlIngreso != null ? $alm->Placas : 'Ingreso al parqueadero'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Ingreso">Ingreso</a></li>
  <li class="active"> <?php echo $alm->IdControlIngreso != null ? $alm->Placas : 'Ingreso al parqueadero'; ?></li>
</ol>

<form id="frm-ingreso" action="?c=Ingreso&a=Modificar" method="post" enctype="multipart/form-data">
   <input type="hidden" name="IdControlIngreso" value="<?php echo $alm->IdControlIngreso; ?>" />
	 <?php
	  	date_default_timezone_set('America/Bogota');
		$hora= date ("H:i");
		$fecha= date ("Y/m/d");
		$valor = 'Activo';
?>
     <div class="form-group">
    	Fecha       
      <input name="fecha" type="text" class="form-control" id="textfield" value="<?php echo $fecha; ?>" readonly="readonly"/>
    </div>
    <div class="form-group">
    	Tiempo         
      <input name="tiempo" type="text" class="form-control" id="textfield" value="<?php echo $hora; ?>" readonly="readonly"/>
    </div>
     <div class="form-group">
    Placas del vehiculo  	
          <select name="Placas" class="form-control" required>
          <option value=""><?php echo $alm->Placas; ?></option>  
			<?php
do {  
?>
            <option value="<?php echo $row_Recordset4['Placas']?>"><?php echo $row_Recordset4['Placas']?></option>
            <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysqli_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
	  $carro = "UPDATE vehiculos SET Estado ='Inactivo' where Placas ='".$row_Recordset4['Placas']."'";
	  $updatecarro= mysqli_query($con, $carro);
	  
  }
 
?>
          </select>
    </div>
    <div class="form-group">
    	Empleado        
      <input name="NombreEmpleado" type="text" class="form-control" id="textfield" value="<?php echo $_SESSION['nombre']; ?>" readonly="readonly"/>
    </div>
    <div class="form-group">
     Lugar   	
          <select name="Lugar" class="form-control" required>
          <option value=""> <?php echo $alm->Lugar; ?></option>  
			<?php
do {  
?>
            <option value="<?php echo $row_Recordset6['Lugar']?>"><?php echo $row_Recordset6['Lugar']?></option>
            <?php
} while ($row_Recordset6 = mysqli_fetch_assoc($Recordset6));
  $rows = mysqli_num_rows($Recordset6);
  if($rows > 0) {
      mysqli_data_seek($Recordset6, 0);
	  $row_Recordset6 = mysqli_fetch_assoc($Recordset6);
	  //$lugar = $row_Recordset6['Lugar']; 
	  $cambiar = "UPDATE disponibilidad SET Disponibilidad ='Falso' where Lugar ='".$row_Recordset6['Lugar']."'";
	  $update= mysqli_query($conn, $cambiar);
	  
  }
 
?>
          </select>
    </div>
    <div class="form-group">
      <input name="estado" type="hidden" class="form-control" id="textfield" value="Activo"/>
    </div>
    <div class="form-group">
      <input name="liquidado" type="hidden" class="form-control" id="textfield" value="No"/>
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-ingreso").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

?>
