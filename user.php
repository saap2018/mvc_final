	<?php
include_once 'sesion.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAAP</title>
<style>
.header {
  overflow: hidden;
  background-color: #999;
  padding: 20px 10px;
  font-family:Arial, Helvetica, sans-serif;
  opacity: 0.6;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}
.header p {
  float: right;
  font-family:Arial, Helvetica, sans-serif;
  size: 10px;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #999;
  opacity: 0.6;
  text-align: center;
  font-family:Arial, Helvetica, sans-serif;
}
p{
	font-family:Arial, Helvetica, sans-serif;
	size: 18px;
	color:#333;
}
</style>
</head>
<div class="header">
  <a href="#default" class="logo">SAAP</a>
  <div class="header-right">
    <a href="convenios.php">Convenios</a>
    <a href="ingresos.php">Ingreso</a>
    <a href="registro clientes.php">Clientes</a>
    <a href="disponibles.php">Parqueaderos ocupados</a>
    <a href="salidas.php">Salidas</a>
    <a href="vehiculos.php">Vehículos</a>
    <a href="tiempos.php">Liquidar tiempo</a>
    <a href='cerrarsesion.php'><img src="img/boton.png" width="30" height="30" /></a>
  </div>
</div>
<p>Hola <strong><?php echo $_SESSION["nombre"]; ?></strong> <br />
<p><strong>Rol:</strong><?php echo $_SESSION["privilegio"]; ?><p>
<center><img src="img/Logo.PNG" width="437" height="194" /><br></center>
  
<div class="footer">Software desarrollado por <strong>SAAP</strong>.</div>
</body>
</html>
