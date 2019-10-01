<h1 class="page-header">Ingreso al Parqueadero</h1>
<ol class="breadcrumb">

  <li><a href="admin.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
	¿Ya ingresaste los datos del vehículo?
    <a class="btn btn-success" href="vehiculos.php?c=Vehiculo&a=Crud">Crear vehículo</a>
    <a class="btn btn-primary" href="?c=Ingreso&a=Crud">Hacer Ingreso</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            	<th>Fecha ingreso</th>
                <th>Hora ingreso</th> 
				<th>Placas del Vehiculo</th> 
    			<th>Nombre del Empleado</th> 
                <th>Lugar Asignado</th> 
                        
                        
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            
            <td><?php echo $r->fecha; ?></td>
            <td><?php echo $r->tiempo; ?></td>
            <td><?php echo $r->Placas; ?></td>
            <td><?php echo $r->NombreEmpleado; ?></td>
            <td><?php echo $r->Lugar; ?></td>
           <td>
                <a href="?c=Ingreso&a=Update&id=<?php echo $r->IdControlIngreso; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Ingreso&a=Eliminar&id=<?php echo $r->IdControlIngreso; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
