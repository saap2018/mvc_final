
<h1 class="page-header">Parqueaderos utilizados</h1>
<ol class="breadcrumb">
  <li><a href="admin.php">Principal</a></li>	
</ol>


<table class="table table-striped">
    <thead>
        <tr>
            			<th>Fecha de ingreso</th> 
                        <th>Hora de entrada </th> 
						<th>Placas del Vehículo</th>
                        <th>Lugar asignado</th>
                        <th>Nombre del Cliente</th>
                        <th>Marca del Vehículo</th>
                        <th>Tipo de Vehículo</th>                                                
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            
            <td><?php echo $r->Fecha_Ingreso; ?></td>
            <td><?php echo $r->Hora_Entrada; ?></td>
            <td><?php echo $r->Placas; ?></td>
          	<td><?php echo $r->Lugar; ?></td>
            <td><?php echo $r->NombreCliente; ?></td>
            <td><?php echo $r->Marca; ?></td>
            <td><?php echo $r->Tipo; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
