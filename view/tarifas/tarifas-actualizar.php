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
</script>
<h1 class="page-header">
    <?php echo $alm->id_tarifa != null ? $alm->tarifa : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
 <li><a href="?c=Cargo">Cargo</a></li>
  <li class="active"><?php echo $alm->id_tarifa != null ? $alm->tarifa : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" action="?c=Tarifas&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_tarifa" value="<?php echo $alm->id_tarifa; ?>" />
    <div class="form-group">
        <label>Nombre de la tarifa</label>
        <input type="text" name="tarifa" value="<?php echo $alm->tarifa; ?>" class="form-control" placeholder="Tarifa a modificar" onkeypress="return soloLetras(event)" required />
    </div>
    <div class="form-group">
        <label>Valor Tarifa</label>
        <input type="text" name="valor" value="<?php echo $alm->valor; ?>" class="form-control" placeholder="Nuevo valor" onkeypress="return soloNumeros(event)" required />
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