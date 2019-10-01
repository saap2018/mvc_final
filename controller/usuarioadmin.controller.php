<?php
include_once 'sesion.php';
require_once 'model/usuarioadmin.php';
class UsuarioadminController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new UsuarioAdmin();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuarioadmin/usuarioadmin.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new UsuarioAdmin();
        
        require_once 'view/header.php';
        require_once 'view/usuarioadmin/usuarioadmin-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new UsuarioAdmin();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/usuarioadmin/usuarioadmin-actualizar.php';
        require_once 'view/footer.php';
    }
    public function Guardar(){
        $alm = new UsuarioAdmin();
        
        $alm->id = $_REQUEST['id'];
        $alm->correo = $_REQUEST['correo'];
		$alm->nombre = $_REQUEST['nombre'];
		$alm->usuario = $_REQUEST['usuario'];
        $alm->contrasena = base64_encode($_REQUEST['contrasena']);
		$alm->privilegio = $_REQUEST['privilegio'];
        
        $this->model->Registrar($alm);
        
        header('Location: registro usuarios admin.php');
    }
	
	public function Modificar(){
        $alm = new UsuarioAdmin();
    	$alm->id = $_REQUEST['id'];
        $alm->correo = $_REQUEST['correo'];
		$alm->nombre = $_REQUEST['nombre'];
		$alm->usuario = $_REQUEST['usuario'];
        $alm->contrasena = base64_encode($_REQUEST['contrasena']);
		$alm->privilegio = $_REQUEST['privilegio'];
        	
            $this->model->Actualizar($alm);
     
	header('Location: registro usuarios admin.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: registro usuarios admin.php');
    }
}