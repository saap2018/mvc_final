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
/*
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset1 = mysqli_query($link, "SELECT IdCliente FROM clientes ORDER BY IdCliente ASC") or die(mysqli_error($link));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
*/
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset1 = mysqli_query($link, "SELECT NombreCliente,ApellidosCliente FROM clientes") or die(mysqli_error($link));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
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
    <?php echo $alm->IdConvenio != null ? $alm->NombreConvenio : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Convenio">Convenios</a></li>
  <li class="active"><?php echo $alm->IdConvenio != null ? $alm->NombreConvenio : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Convenio&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdConvenio" value="<?php echo $alm->IdConvenio; ?>" />
    
    <div class="form-group">
        <label>Nombre del Convenio</label>
        <input type="text" name="NombreConvenio" value="<?php echo $alm->NombreConvenio; ?>" class="form-control" placeholder="Nombre del Convenio"  onkeypress="return soloLetras(event)" required="required"/>
    </div>
    
    <div class="form-group">
        <label>Valor del convenio</label>
        <input type="text" name="Valor" value="<?php echo $alm->Valor; ?>" class="form-control" placeholder="Valor del convenio" onkeypress="return soloNumeros(event)" required="required"/>
    </div>
    
    <div class="form-group">
        <label>NombreCliente</label>
        
      <label for="select2" ></label>
        <select name="NombreCliente" id="select2" class="form-control">
        <option required value="">Seleccione nombre del cliente </option>
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset1['NombreCliente'].' '.$row_Recordset1['ApellidosCliente']?>"><?php echo $row_Recordset1['NombreCliente'].' '.$row_Recordset1['ApellidosCliente']?></option>
          <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysqli_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
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

