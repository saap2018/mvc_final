<h1 class="page-header">Usuarios registrados</h1>
<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Usuario&a=Crud">Nuevo usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre de usuario</th>
            <th>Password</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->usuario; ?></td>
            <td><?php echo $r->contrasena; ?></td>
            <td><?php echo $r->correo; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->privilegio; ?></td>
            </td>
             <td>
                <a href="?c=Usuario&a=Update&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Usuario&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
