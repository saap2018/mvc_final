<?php
include_once 'sesion.php';
require_once 'model/tarifas.php';

class TarifasController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Tarifas();	
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/tarifas/tarifas.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Tarifas();
        
        require_once 'view/header.php';
        require_once 'view/tarifas/tarifas-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new Tarifas();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/tarifas/tarifas-actualizar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Tarifas();
        
        $alm->id_tarifa = $_REQUEST['id_tarifa'];
        $alm->tarifa = $_REQUEST['tarifa'];     
		$alm->valor = $_REQUEST['valor'];        
            $this->model->Registrar($alm);
        
        header('Location: tarifas.php');
    }
    public function Modificar(){
        $alm = new Tarifas();
    		$alm->id_tarifa = $_REQUEST['id_tarifa'];
            $alm->tarifa = $_REQUEST['tarifa'];
        	$alm->valor = $_REQUEST['valor'];
					
            $this->model->Actualizar($alm);
     
	header('Location: tarifas.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: tarifas.php');
    }
}