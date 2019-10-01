<h1 class="page-header">Clientes registrados</h1>

<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Cliente&a=Crud">Registrar cliente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Tipo de Documento</th>
            <th>Numero</th>
            <th>Nombres</th>
            <th >Apellido o tipo de Sociedad </th>
            <th >Numero de contacto</th>
            <th >Correo de contacto</th>
            <th ></th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->TipoDocumento; ?></td>
            <td><?php echo $r->DocumentoCliente; ?></td>
            <td><?php echo $r->NombreCliente; ?></td>
            <td><?php echo $r->ApellidosCliente; ?></td>
            <td><?php echo $r->NumeroTelefonico; ?></td>
            <td><?php echo $r->Email; ?></td>
            <td>
                <a href="?c=Cliente&a=Update&id=<?php echo $r->IdCliente; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cliente&a=Eliminar&id=<?php echo $r->IdCliente; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
