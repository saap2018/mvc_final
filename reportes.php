<!DOCTYPE html>
<?php
if ((isset($_POST['nombre'])) && ($_POST['nombre'] != '') && (isset($_POST['direccion'])) && ($_POST['direccion'] != '')&& (isset($_POST['telefonos'])) && ($_POST['telefonos'] != '')&& (isset($_POST['correo'])) && ($_POST['correo'] != '')&& (isset($_POST['cantidad'])) && ($_POST['cantidad'] != '')) {

    include "models/modelo.php";
    $nuevo = new Service();
    $asd = $nuevo->setServicio($_POST['nombre'], $_POST['direccion'],$_POST['telefonos'], $_POST['correo'],$_POST['cantidad']);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SAAP</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Reportes </h1>
               
                <a href="admin.php"> <i class="fa fa-arrow-circle-left"></i> Volver al menú</a>
                <hr/>
            </header>
            <div class="row">
                <div class="col-lg-8">
                <ul>
					<li> <a href="fpdf/reporte mensual.php">Reporte mensual</a></li>
                    <li><a href="fpdf/reporte diario.php">Reporte diario</a></li>
                    </ul>
                </div>
               
            </div>
            <footer class="col-lg-12 text-center">
                SAAP - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>
