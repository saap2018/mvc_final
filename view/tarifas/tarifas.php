
<h1 class="page-header">Tarifas</h1>
<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Tarifas&a=Crud">Crear tarifa</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Tarifa</th>
			<th>Valor</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->tarifa; ?></td>
            <td><?php echo "$ ".$r->valor; ?></td>
            </td>
             <td>
                <a href="?c=Tarifas&a=Update&id=<?php echo $r->id_tarifa; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Tarifas&a=Eliminar&id=<?php echo $r->id_tarifa; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
