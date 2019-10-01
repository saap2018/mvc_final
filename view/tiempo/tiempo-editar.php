<?php 
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset1 =mysqli_query($link,"SELECT valor from tarifas WHERE tarifa ='Dia'") or die(mysqli_error($link));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
mysqli_select_db($link, "saap");
$Recordset2 =mysqli_query($link,"SELECT valor from tarifas WHERE tarifa ='Hora'") or die(mysqli_error($link));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
mysqli_select_db($link, "saap");
$Recordset3 =mysqli_query($link,"SELECT valor from tarifas WHERE tarifa ='Hora Feliz'") or die(mysqli_error($link));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);
mysqli_select_db($link, "saap");
$Recordset4 =mysqli_query($link,"SELECT valor from tarifas WHERE tarifa ='Minuto'") or die(mysqli_error($link));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);
mysqli_select_db($link, "saap");
$Recordset5 =mysqli_query($link,"SELECT valor from tarifas WHERE tarifa ='Convenio'") or die(mysqli_error($link));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
 
?>
<h1 class="page-header">
    <?php echo $alm->placas != null ? $alm->Tarifa : 'Ingresar tiempo'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Tiempo">Tiempo</a></li>
  <li class="active"> <?php echo $alm->placas != null ? $alm->Tarifa : 'Liquidar tiempo'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Tiempo&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdControlTiempo" value="<?php echo $alm->IdControlTiempo; ?>" />
    
    <div class="form-group">
        <label>Hora de entrada</label>
        <input type="time" name="Hora_Entrada" value="<?php echo $alm->Hora_Entrada ?>" class="form-control" placeholder="Hora que ingreso el vehiculo" />
    </div>
    
    <div class="form-group">
        <label>Fechaliquidacion</label>
        <input type="time" name="Fechaliquidacion" value="<?php echo $alm->Fechaliquidacion ?>" class="form-control" placeholder="Hora  de salida del vehiculo" />
    </div>
    
     <div class="form-group">
        Placas del Vehiculo 
          <label for="select"></label>
          <select name="PlacaVehiculo" id="select">
          <option value="">Placa del vehículo </option>
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset2['Placas']?>"><?php echo $row_Recordset2['Placas']?></option>
            <?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
  $rows = mysqli_num_rows($Recordset2);
  if($rows > 0) {
      mysqli_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
  }
  echo $alm->PlacaVehiculo;
?>
          </select>
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php

mysqli_free_result($Recordset2);
?>
