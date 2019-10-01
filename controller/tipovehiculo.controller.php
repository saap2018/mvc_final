<?php
include_once 'sesion.php';
require_once 'model/tipovehiculo.php';

class TipoVehiculoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new TipoVehiculo();	
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/tipovehiculo/tipovehiculo.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new TipoVehiculo();
        
        require_once 'view/header.php';
        require_once 'view/tipovehiculo/tipovehiculo-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new TipoVehiculo();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/tipovehiculo/tipovehiculo-actualizar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new TipoVehiculo();
        
        $alm->id_tipov = $_REQUEST['id_tipov'];
        $alm->nombre_tipov = $_REQUEST['nombre_tipov'];        
          $this->model->Registrar($alm);
        
        header('Location: tipovehiculo.php');
    }
    public function Modificar(){
        $alm = new TipoVehiculo();
    		$alm->id_tipov = $_REQUEST['id_tipov'];
            $alm->nombre_tipov = $_REQUEST['nombre_tipov'];
        	
            $this->model->Actualizar($alm);
     
	header('Location: tipovehiculo.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: tipovehiculo.php');
    }
}