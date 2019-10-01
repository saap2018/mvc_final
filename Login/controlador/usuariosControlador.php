<?php

include "../datos/usuariosDatos.php";

class usuariosControlador{
      function insertarUsuarios($correo,$usuario,$pass,$privilegio){
		    $obj = new usuariosDatos();
		    return $obj->insertarUsuarios($correo,$usuario,$pass,$privilegio);
	    }
      function validar($usuario,$pass){
        $obj = new usuariosDatos();
		    return $obj->validar($usuario,$pass);
      }

      function getId($usuario,$pass){
      	$obj = new usuariosDatos();
      	return $obj->getId($usuario,$pass);
      }
}

?>