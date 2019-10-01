<!DOCTYPE html>
<?php
if ((isset($_POST['nombre'])) && ($_POST['nombre'] != '') && (isset($_POST['direccion'])) && ($_POST['direccion'] != '')&& (isset($_POST['telefonos'])) && ($_POST['telefonos'] != '')&& (isset($_POST['correo'])) && ($_POST['correo'] != '')&& (isset($_POST['cantidad'])) && ($_POST['cantidad'] != '')) {

    include "../parametros/models/modelo.php";
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
                <h1>Reporte personalizado</h1>
                <a href="../reportes.php"> <i class="fa fa-arrow-circle-left"></i> Volver a los reportes</a>
                <hr/>
            </header>
            <div class="row">
                <div class="col-lg-6">

                    <form action="reportefinalp.php" method="post" class="col-lg-8">
                        <h3>Ingrese las dos fechas</h3>                
                        Fecha inicial: <input type="date" name="finicial" class="form-control" required/>    
                        Fecha final: <input type="date" name="ffinal" class="form-control" required/>    
                        <br/>
                        <input type="submit" value="Generar" class="btn btn-success"/>
                    </form>
                </div>
                
            </div>
            <footer class="col-lg-12 text-center">
                SAAP - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>
