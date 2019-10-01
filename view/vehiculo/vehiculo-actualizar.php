<?php require_once('Connections/prueba.php'); ?>
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
$marcas = mysqli_query($link, "SELECT * FROM marcas") or die(mysql_error());
$row_marcas = mysqli_fetch_assoc($marcas);
$totalRows_marcas = mysqli_num_rows($marcas);

$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$tipos = mysqli_query($link, "SELECT NombreCliente, ApellidosCliente FROM clientes") or die(mysql_error());
$row_tipos = mysqli_fetch_assoc($tipos);
$totalRows_tipos = mysqli_num_rows($tipos);
//$query_clientes = "SELECT NombreCliente, ApellidosCliente FROM clientes";


$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$tipo = mysqli_query($link, "SELECT nombre_tipov FROM tipo_de_vehiculo") or die(mysql_error());
$row_tipo = mysqli_fetch_assoc($tipo);
$totalRows_tipo = mysqli_num_rows($tipo);
?>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
	function soloNumeros(e){
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key);
		numeros="0123456789";
		especiales = "8-37-39-46";
		tecla_especial = false;
		for(var i in especiales){
			if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
		}
		if(numeros.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
	}
	function validar(e){
  tecla = (document.all) ? e.keyCode : e.which;
  tecla = String.fromCharCode(tecla)
  return /^[0-9\-]+$/.test(tecla);
}
</script>
<h1 class="page-header">
    <?php echo $alm->IdVehiculoCliente != null ? $alm->Marca.' '.$alm->Referencia.' '.$alm->Placas : 'Nuevo Vehiculo'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Vehiculo">Nuevo vehiculo</a></li>
  <li class="active"><?php echo $alm->IdVehiculoCliente != null ? $alm->Marca.' '.$alm->Referencia.' '.$alm->Placas : 'Nuevo Vehiculo'; ?></li>
</ol>

<form id="frm-Vehiculo" action="?c=Vehiculo&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdVehiculoCliente" value="<?php echo $alm->IdVehiculoCliente; ?>" />
    
    <div class="form-group">
        <label>Tipo</label>
      <label for="select"></label>
        <select name="TipoV" class="form-control" required>
        <option value=""><?php echo $alm->TipoV; ?></option>
          <?php
do {  
?>
          <option value="<?php echo $row_tipo['nombre_tipov']?>"><?php echo $row_tipo['nombre_tipov']?></option>
          <?php
} while ($row_tipo = mysqli_fetch_assoc($tipo));
  $rows = mysqli_num_rows($tipo);
  if($rows > 0) {
      mysqli_data_seek($tipo, 0);
	  $row_tipo = mysqli_fetch_assoc($tipo);
  }
  echo $alm->TipoV;
?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Placas del Vehiculo</label>
        <input type="text" name="Placas" value="<?php echo $alm->Placas; ?>" class="form-control" data-validacion-tipo="requerido|max:6" required="required" onkeyup="
  var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
    </div>
    
    <div class="form-group">
        <label>Marca</label>
      <label for="select"></label>
        <select name="Marca" class="form-control" required>
        <option value=""><?php echo $alm->Marca; ?></option>
          <?php
do {  
?>
          <option value="<?php echo $row_marcas['marca']?>"><?php echo $row_marcas['marca']?></option>
          <?php
} while ($row_marcas = mysqli_fetch_assoc($marcas));
  $rows = mysqli_num_rows($marcas);
  if($rows > 0) {
      mysqli_data_seek($marcas, 0);
	  $row_marcas = mysqli_fetch_assoc($marcas);
  }
  echo $alm->Marca;
?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Referencia</label>
        <input type="text" name="Referencia" value="<?php echo $alm->Referencia; ?>" class="form-control"  data-validacion-tipo="requerido|max:15" required="required"/>
    </div>
    <div class="form-group">
        <label>Color</label>
        <input type="text" name="Color" value="<?php echo $alm->Color; ?>" class="form-control"  data-validacion-tipo="requerido|max:15" required="required"/>
    </div>
    <div class="form-group">
        <label>Modelo del vehiculo</label>
        <input type="text" name="Modelo" value="<?php echo $alm->Modelo; ?>" class="form-control"  onkeypress="return soloNumeros(event)" required="required" data-validacion-tipo="requerido|max:4"/>
    </div>
    <div class="form-group">
        <label>Descripcion del vehiculo</label>
        <input type="text" name="Descripcion" value="<?php echo $alm->Descripcion; ?>" class="form-control"  required="required"  data-validacion-tipo="requerido|max:200"/>
    </div>
  <div class="form-group">
        <label>Nombre del Cliente</label>
      <label for="select"></label>
        <select name="NombreCliente" class="form-control" required>
        <option value=""><?php echo $alm->NombreCliente; ?></option>
          <?php
do {  
?>
          <option value="<?php echo $row_tipos['NombreCliente'].' '.$row_tipos['ApellidosCliente']?>"><?php echo $row_tipos['NombreCliente'].' '.$row_tipos['ApellidosCliente']?></option>
          <?php
} while ($row_tipos = mysqli_fetch_assoc($tipos));
  $rows = mysqli_num_rows($tipos);
  if($rows > 0) {
      mysqli_data_seek($tipos, 0);
	  $row_tipos = mysqli_fetch_assoc($tipos);
  }
  echo $alm->NombreCliente;
?>
        </select>
    </div>
  <div class="form-group">
    <input type="hidden" name="Estado" value="<?php echo $alm->Descripcion.'Activo'; ?>" class="form-control" placeholder="En caso de haber seleccionado en marca otro, diligenciar aquí"/>
  </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-Vehiculo").submit(function(){
            return $(this).validate();
        });
    })
</script>
<?php
mysqli_free_result($tipo);

?>
