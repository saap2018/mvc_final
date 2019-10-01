<?php
include_once 'sesion.php';
require_once 'model/cargo.php';

class CargoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Cargo();	
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/cargo/cargo.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Cargo();
        
        require_once 'view/header.php';
        require_once 'view/cargo/cargo-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new Cargo();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/cargo/cargo-actualizar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Cargo();
        
        $alm->id_cargo = $_REQUEST['id_cargo'];
        $alm->nombre_cargo = $_REQUEST['nombre_cargo'];        
            $this->model->Registrar($alm);
        
        header('Location: cargos.php');
    }
    public function Modificar(){
        $alm = new Cargo();
    		$alm->id_cargo = $_REQUEST['id_cargo'];
            $alm->nombre_cargo = $_REQUEST['nombre_cargo'];
        	
            $this->model->Actualizar($alm);
     
	header('Location: cargos.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: cargo.php');
    }
}