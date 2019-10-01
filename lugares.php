<?php 
include_once 'sesion.php'; 
$link = mysqli_connect("localhost", "root", "", "saap");
mysqli_select_db($link, "saap");
$Recordset1 =mysqli_query($link, "SELECT * FROM cantidaddeparqueaderos") or die(mysqli_error($link));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAAP</title>
<link rel="stylesheet" type="text/css" href="assets/css/formulario.css"/>
<script>
function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
</script>
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
  opacity: 0.9;
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
<strong>
  <a href="admin.php" class="logo">SAAP</a>
  <div class="header-right">
    <?php echo $_SESSION['nombre']; echo $row_Recordset1['cantidad'];?></strong>
  </div>
</div>
<body>
<div class="footer">Software desarrollado por <strong>SAAP</strong>.</div>
<div id="container">
<div id="login">
<h3>Parámetros del parqueadero </h3>
<form action="parqueaderos.php" method="POST">
<label for="nombre">Nombre <span>(requerido)</span></label>
 <input type="text" name="nombre" class="form-input" required/>
<label for="password">Dirección <span>(requerido)</span></label>
<input type="text" name="direccion" class="form-input" required/>
<label for="nick">Telefono <span>(requerido)</span></label>
<input type="text" name="telefono" class="form-input" / required onkeypress="return numeros(event)">
<label for="email">Email <span>(requerido)</span></label>
 <input type="email" name="email" class="form-input" />
<label for="nick">Lugares <span>(requerido)</span></label>
<input type="text" name="lugares" class="form-input" / required onkeypress="return numeros(event)">
<input class="form-btn" name="submit" type="submit" value="Ingresar" /> 
</form>

</body>
</html>