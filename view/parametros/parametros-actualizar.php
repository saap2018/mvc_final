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
$tipo = mysqli_query($link, "SELECT nombre_documento FROM tipo_de_documento") or die(mysql_error());
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
    <?php echo $alm->id_cantidad != null ? $alm->Nombre_Empresa : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Parametros">Parametros</a></li>
  <li class="active"><?php echo $alm->id_cantidad != null ? $alm->Nombre_Empresa : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-Parametros" action="?c=Parametros&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_cantidad" value="<?php echo $alm->id_cantidad; ?>" />
<div class="form-group">
        <label>Nombre del parqueadero</label>
        <input type="text" name="Nombre_Empresa" value="<?php echo $alm->Nombre_Empresa; ?>" class="form-control" placeholder="Nombre del parqueadero"  onkeypress="return soloLetras(event)" required="required"/>
    </div>

<div class="form-group">
        <label>Numero de Identificacion</label>
        <input type="text" name="identificacion" value="<?php echo $alm->identificacion; ?>" class="form-control" placeholder="Identificación del parqueadero o cliente"  onkeypress="return validar(event)" data-validacion-tipo="requerido|max:11" required="required"/>
    </div>
    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="Direccion" value="<?php echo $alm->Direccion; ?>" class="form-control" placeholder="Dirección del parqueadero" required="required"/>
    </div>
    
    <div class="form-group">
        <label>Telefono(s) de contacto</label>
        <input type="text" name="Telefonos" value="<?php echo $alm->Telefonos; ?>" class="form-control" placeholder="Teléonos de contacto" onkeypress="return validar(event)" required="required"/>
    </div>
    <div class="form-group">
        <label>Correo de contacto</label>
        <input type="text" name="correo" value="<?php echo $alm->correo; ?>" class="form-control" placeholder="Correo institucional o del cliente" data-validacion-tipo="requerido|email" required="required"/>
    </div>
    <div class="form-group">
        <label>Lugares del parqueadero</label>
        <input type="text" name="cantidad" value="<?php echo $alm->cantidad; ?>" class="form-control" placeholder="Lugares a asignar en el parqueadero" onkeypress="return soloNumeros(event)" data-validacion-tipo="requerido|max:4" required="required"/>
    </div>
    <hr />
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-Parametros").submit(function(){
            return $(this).validate();
        });
    })
</script>

