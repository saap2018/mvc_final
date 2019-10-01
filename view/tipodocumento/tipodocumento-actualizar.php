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
</script>
<h1 class="page-header">
    <?php echo $alm->id_tipo != null ? $alm->nombre_documento : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
 <li><a href="?c=TipoDocumento">Tipo de Vehiculo</a></li>
  <li class="active"><?php echo $alm->id_tipo != null ? $alm->nombre_documento : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" action="?c=TipoDocumento&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_tipo" value="<?php echo $alm->id_tipo; ?>" />
    <div class="form-group">
        <label>Nombre del documento</label>
        <input type="text" name="nombre_documento" value="<?php echo $alm->nombre_documento; ?>" class="form-control" placeholder="Nombre del nuevo documento" onkeypress="return soloLetras(event)" required />
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