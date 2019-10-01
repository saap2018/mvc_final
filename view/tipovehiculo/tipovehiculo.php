
<h1 class="page-header">Tipos de vehiculo</h1>
<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=TipoVehiculo&a=Crud">Nuevo Vehiculo</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Tipo de Vehiculo</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre_tipov; ?></td>
            
            </td>
             <td>
                <a href="?c=TipoVehiculo&a=Update&id=<?php echo $r->id_tipov; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=TipoVehiculo&a=Eliminar&id=<?php echo $r->id_tipov; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
