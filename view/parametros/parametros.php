<h1 class="page-header">Datos del parqueadero</h1>

<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-success" href="parametrizar.php">Asignar parqueaderos</a>
    <a class="btn btn-primary" href="?c=Parametros&a=Crud">Ingresar Datos</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>NIT o Cédula</th>
            <th>Dirección</th>
            <th >Telefonos de contacto</th>
            <th >Correo de contacto</th>
            <th >Lugares Registrados</th>
            <th ></th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre_Empresa; ?></td>
            <td><?php echo $r->identificacion; ?></td>
            <td><?php echo $r->Direccion; ?></td>
            <td><?php echo $r->Telefonos; ?></td>
            <td><?php echo $r->correo; ?></td>
            <td><?php echo $r->cantidad; ?></td>
            <td>
                <a href="?c=Parametros&a=Update&id=<?php echo $r->id_cantidad; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Parametros&a=Eliminar&id=<?php echo $r->id_cantidad; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
