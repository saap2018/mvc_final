
<h1 class="page-header">Cargos</h1>
<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Cargo&a=Crud">Nuevo cargo</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre del cargo</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre_cargo; ?></td>
            
            </td>
             <td>
                <a href="?c=Cargo&a=Update&id=<?php echo $r->id_cargo; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cargo&a=Eliminar&id=<?php echo $r->id_cargo; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
