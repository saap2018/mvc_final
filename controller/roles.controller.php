<?php
include_once 'sesion.php';
require_once 'model/roles.php';

class RolesController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Roles();	
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/roles/roles.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Roles();
        
        require_once 'view/header.php';
        require_once 'view/roles/roles-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new Roles();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/roles/roles-actualizar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Roles();
        
        $alm->id_nivel = $_REQUEST['id_nivel'];
        $alm->nivel = $_REQUEST['nivel'];
        $alm->Estado = $_REQUEST['Estado'];
        
            $this->model->Registrar($alm);
        
        header('Location: roles.php');
    }
    public function Modificar(){
        $alm = new Roles();
    		$alm->id_nivel = $_REQUEST['id_nivel'];
        $alm->nivel = $_REQUEST['nivel'];
        $alm->Estado = $_REQUEST['Estado'];
        	
            $this->model->Actualizar($alm);
     
	header('Location: roles.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: roles.php');
    }
}