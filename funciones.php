<?php
class Database extends PDO{
public function __construct(){
try{
	parent::__construct('mysql:host=localhost;dbname=saap','root','');
	parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $ex){
	die('La base de datos no existe');
}
}
public function insert(){
$sentencia = $this->prepare('INSERT INTO cantidaddeparqueaderos (Nombre_Empresa,Direccion,Telefonos,cantidad VALUES (:nombre, :direccion, :telefonos, :lugares))');
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefonos',$telefonos);
$sentencia->bindParam(':lugares',$lugares);
}
}
?>