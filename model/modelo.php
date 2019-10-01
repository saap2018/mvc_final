<?php

class Parametros {
    
    private $Parametro;
    private $db;

    public function __construct() {
        $this->parametro = array();
        $this->db = new PDO('mysql:host=localhost;dbname=saap', "root", "");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getParametros() {

        self::setNames();
        $sql = "SELECT id_cantidad, Nombre_Empresa, Direccion, Telefonos, correo, cantidad FROM parametros";
        foreach ($this->db->query($sql) as $res) {
            $this->parametro[] = $res;
        }
        return $this->parametro;
        $this->db = null;
    }

    public function setParametros($Nombre_Empresa,$Direccion,$Telefonos,$correo,$cantidad) {

        self::setNames();
        $sql = "INSERT INTO parametros(Nombre_Empresa, Direccion, Telefonos, correo, cantidad) VALUES ('" . $Nombre_Empresa . "', '" . $Direccion . "','" . $Telefonos . "','" . $correo . "','" . $cantidad . "',)";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>