<?php
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset3 = mysqli_query($link, "SELECT * FROM total_tiempo") or die(mysqli_error($link));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset4 = mysqli_query($link, "SELECT * FROM vehiculos") or die(mysqli_error($link));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$conn = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($conn, "saap");
$Recordset5 = mysqli_query($conn, "SELECT * FROM disponibilidad") or die(mysqli_error($conn));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

?>
<h1 class="page-header">
    <?php echo $alm->IdControlIngreso != null ? $alm->Placas : 'Modificar salida'; ?>
</h1>

<ol class="breadcrumb">
 <li><a href="?c=Salida">Salida</a></li>
  <li class="active"><?php echo $alm->IdControlIngreso != null ? $alm->Placas : 'Modificar ingreso'; ?></li>
</ol>

<form id="frm-ingreso" action="?c=Salida&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdControlIngreso" value="<?php echo $alm->IdControlIngreso; ?>" />
    <?php
	  	date_default_timezone_set('America/Bogota');
		$hora= date ("H:i");
		$fecha= date ("Y/m/d");
		
?>
   <div class="form-group">
        <label>Fecha de Salida</label>
        <input type="text" name="fechasalida" value="<?php echo $fecha; ?>" class="form-control" readonly="readonly"/>
    </div>
    <div class="form-group">
        <label>Hora de Salida</label>
        <input type="text" name="horasalida" value="<?php echo $hora; ?>" class="form-control" placeholder="hora de salida" readonly="readonly"/>
        <?php
       while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
  $rows = mysqli_num_rows($Recordset5);
  if($rows > 0) {
      mysqli_data_seek($Recordset5, 0);
	  $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
	  $lugard = "UPDATE disponibilidad SET Disponibilidad ='Activo' where Lugar ='".$row_Recordset5['Lugar']."'";
	  $lugardisponible= mysqli_query($conn, $lugard);
  }
		?>
    </div>
   <div class="form-group">
       <?php 
	   while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysqli_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
	  $carros = "UPDATE vehiculos SET Estado ='Activo' where Placas ='".$row_Recordset4['Placas']."'";
	  $updatecarros= mysqli_query($link, $carros);
	  
  } 
	  ?>
    </div>
    <hr />
    <div class="text-right">
        <button class="btn btn-success">Salida</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-ingreso").submit(function(){
            return $(this).validate();
        });
    })
</script>

