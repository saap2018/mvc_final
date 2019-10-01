<h1 class="page-header">Personas</h1>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Persona&a=Crud">Agregar Persona</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th >Nombres</th>
            <th>Cedula</th>
            <th>Fecha de Nacimiento</th>
            <th >Direccion</th>
            <th >Correo</th>
            <th ></th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombres; ?></td>
            <td><?php echo $r->cedula; ?></td>
            <td><?php echo $r->fecha_nmto; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td><?php echo $r->email; ?></td>
            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Persona&a=Crud&idpersona=<?php echo $r->idpersona; ?>"> Editar</a></i>
            </td>
            <td>
                <i class="glyphicon glyphicon-remove"><a href="?c=Persona&a=Eliminar&idpersona=<?php echo $r->idpersona; ?>"> Eliminar</a></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
