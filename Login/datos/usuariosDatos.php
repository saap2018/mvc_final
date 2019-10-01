<?php

include "../entidades/usuarios.php";
include "conexion.php";

class usuariosDatos extends conexion {

	public function __construct(){
         $usuarios = new usuarios();
    }

	function insertarUsuarios($correo,$usuario,$pass,$privilegio){

		$con = $this->conectar();
		
		$usuarios = new usuarios();
		$usuarios->correo=$correo;
		$usuarios->usuario=$usuario;
		$usuarios->contrasena = base64_encode($pass);
		$usuarios->privilegio=$privilegio;
		mysqli_select_db($con,"saap");
		$sql = "INSERT INTO usuarios (correo,usuario,contrasena,privilegio)VALUES(
		'".$usuarios->correo."',
		'".$usuarios->usuario."',
		'".$usuarios->contrasena."',
		'".$usuarios->privilegio."'
		)";
		if(mysqli_query($con,$sql)){
			return true;
		}else{
			return false;
		}
		mysqli_close($con);

	}

    function validar($usuario,$pass){
		$con = $this->conectar();
		$usuarios = new usuarios();
		$usuarios->usuario=$usuario;
		$usuarios->contrasena = base64_encode($pass);
        
		mysqli_select_db($con,"saap");
        
		$sql = "SELECT * FROM usuarios WHERE usuario='".$usuarios->usuario."' and contrasena='".$usuarios->contrasena."'";
        $consulta = mysqli_query($con,$sql);
        $fila = mysqli_fetch_array($consulta);
        if($fila>0){
            if($fila["usuario"] == $usuarios->usuario && $fila["contrasena"]==$usuarios->contrasena){
                return $fila;
            }
        }

    }

 

    public function getDatoU($usuario,$pass){
		$con = $this->conectar();
		$usuarios = new usuarios();
		$usuarios->usuario=$usuario;
		$usuarios->contrasena = base64_encode($pass);

		mysqli_select_db($con,"saap");
        
		$sql = "SELECT * FROM usuarios WHERE usuario='".$usuarios->usuario."' and contrasena='".$usuarios->contrasena."'";
        $consulta = mysqli_query($con,$sql);
        $fila = mysqli_fetch_array($consulta);
        if($fila>0){
            if($fila["usuario"] == $usuarios->usuario && $fila["contrasena"]==$usuarios->contrasena){
                return json_encode($fila);
            }
        }else{
            return "";
        }

    }

}
?>