<?php

 require_once('funciones.php');
 
 //Recibir
 $nombre = strip_tags($_POST['nombre']);
 $direccion = strip_tags($_POST['direccion']);
 $telefono = strip_tags($_POST['telefono']);
 $email = strip_tags($_POST['email']);
 $lugares = strip_tags($_POST['lugares']);
 $meter = mysqli_query('INSERT INTO cantidaddeparqueaderos (Nombre_Empresa, Direccion, Telefonos,cantidad) values ("'.mysqli_real_escape_string($nombre).'", "'.mysqli_real_escape_string($direccion).'", "'.mysqli_real_escape_string($telefono).'", "'.mysqli_real_escape_string($email).'", "'.mysqli_real_escape_string($lugares).'")');
 if($meter)
 {
 echo 'Datos registrados con exito';
header('Location: admin.php');
 }else{
 echo 'Hubo un error en el registro.';
 }
 ?>
