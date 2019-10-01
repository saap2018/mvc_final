<h1 class="page-header">Roles registrados</h1>
<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Roles&a=Crud">Nuevo rol</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre del rol</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nivel; ?></td>
            <td><?php echo $r->Estado; ?></td>
            </td>
             <td>
                <a href="?c=Roles&a=Update&id=<?php echo $r->id_nivel; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Roles&a=Eliminar&id=<?php echo $r->id_nivel; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
