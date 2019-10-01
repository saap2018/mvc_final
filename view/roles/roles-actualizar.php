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
    <?php echo $alm->id_nivel != null ? $alm->nivel : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
 <li><a href="?c=Roles">Roles</a></li>
  <li class="active"><?php echo $alm->id_nivel != null ? $alm->nivel : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" action="?c=Roles&a=Modificar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_nivel" value="<?php echo $alm->id_nivel; ?>" />
    <div class="form-group">
        <label>Nombre del rol</label>
        <input type="text" name="nivel" value="<?php echo $alm->nivel; ?>" class="form-control" placeholder="Nombre del Rol" onkeypress="return soloLetras(event)" required />
    </div>
     <div class="form-group">
       
        <input type="hidden" name="Estado" value="Verdadero" class="form-control" />
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Modificar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>