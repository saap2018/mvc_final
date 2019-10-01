<?php
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset1 =mysqli_query($link,"SELECT nivel FROM nivel WHERE Estado='Verdadero'") or die(mysqli_error($link));
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
	function checkform(form){
	if(form.contrasena.value != ""){
		re=/[0-9]/;
		if(!re.test(form.contrasena.value)){
			alert("La contraseña debe contener numeros 0 -9");
			form.contrasena.focus();
			return false;
		}
		re=/[a-z]/;
		if(!re.test(form.contrasena.value)){
			alert("La contraseña debe tener al menos una minúscula");
			form.contrasena.focus();
			return false;
		}
		re=/[A-Z]/;
		if(!re.test(form.contrasena.value)){
			alert("La contraseña debe tener al menos una mayúscula");
			form.contrasena.focus();
			return false;
		}
	}
	}
</script>
<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
 <li><a href="?c=Usuario">Usuarios</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" onclick="return checkform(this)" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    <div class="form-group">
        <label>Nombre completo</label>
        <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Nombres y apellidos del usuario" onkeypress="return soloLetras(event)" required />
    </div>
    <div class="form-group">
        <label>Usuario</label>
        <input type="text" name="usuario" value="<?php echo $alm->usuario; ?>" class="form-control" placeholder="Usuario en el sistema" onkeypress="return soloLetras(event)" onkeyup="
  var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toLowerCase(); this.setSelectionRange(start, end);"required />
    </div>
    <div class="form-group">
        <label>Contraseña </label>
        <input type="password" name="contrasena" value="<?php echo $alm->contrasena; ?>" class="form-control" placeholder="Ingrese su contraseña" data-validacion-tipo="requerido|min:6" required />
    </div> 
    <div class="form-group">
        <label>Correo Electronico</label>
        <input type="email" name="correo" value="<?php echo $alm->correo; ?>" class="form-control" placeholder="E-mail del usuario" required/>
    </div>
    <div class="form-group">
     <label>Rol del usuario</label>   	
          <select name="privilegio" class="form-control" required>
          <option value="">Seleccione el rol del usuario</option>  
			<?php
do {  
?>
            <option value="<?php echo $row_Recordset1['nivel']?>"><?php echo $row_Recordset1['nivel']?></option>
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
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>