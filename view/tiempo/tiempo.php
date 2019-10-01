<?php 
header('Refresh: 60');

?>
<h1 class="page-header">Liquidar Tiempos</h1>
<ol class="breadcrumb">

  <li><a href="admin.php">Principal</a></li>	
</ol>
<div class="well well-sm text-right">
	
</div>

<table class="table table-striped">
    <thead>
        <tr>
            	<th>Placa</th>
                <th>Fecha ingreso</th>
                <th>Fecha Salida</th>
                <th>Hora Entrada</th>
                <th>Hora Salida</th> 
                        
                        
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Placas; ?></td>
            <td><?php echo $r->fecha; ?></td>
            <td><?php echo $r->fechasalida; ?></td>
            <td><?php echo $r->tiempo; ?></td>
            <td><?php echo $r->horasalida; ?></td>
           <td>
          <?php $idci =$r->IdControlIngreso; ?>
                <a href="fpdf/reporte.php?idci=<?php echo $idci?>">Liquidar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
