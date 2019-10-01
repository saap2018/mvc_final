<?
header('Refresh: 60');
?>
<h1 class="page-header">Salida del Parqueadero</h1>
<ol class="breadcrumb">

  <li><a href="admin.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
	Luego de hacer la salida pasa a 
    <a class="btn btn-success" href="tiempos.php">Liquidar tiempo</a>
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
                <a href="?c=Salida&a=Update&id=<?php echo $r->IdControlIngreso; ?>">Salida</a>
                <?php ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
