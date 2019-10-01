
<h1 class="page-header">Tipo de Documento</h1>
<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=TipoDocumento&a=Crud">Nuevo Documento</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Tipo de Documento</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre_documento; ?></td>
            
            </td>
             <td>
                <a href="?c=TipoDocumento&a=Update&id=<?php echo $r->id_tipo; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=TipoDocumento&a=Eliminar&id=<?php echo $r->id_tipo; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
