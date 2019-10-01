<?php
include_once 'sesion.php';
require_once 'model/salida.php';

class SalidaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Salida();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/salida/salida.php';
        require_once 'view/footer.php';
    }
    
    
    public function Update(){
        $alm = new Salida();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/salida/salida-actualizar.php';
        require_once 'view/footer.php';
    }
    
   public function Modificar(){
        $alm = new Salida();
    	$alm->IdControlIngreso = $_REQUEST['IdControlIngreso'];
        $alm->fechasalida = $_REQUEST['fechasalida'];
		$alm->horasalida = $_REQUEST['horasalida'];
		
        $alm->estado = $_REQUEST['estado'];
      
        	
            $this->model->Actualizar($alm);
     
	header('Location: salidas.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: salidas.php');
    }
}