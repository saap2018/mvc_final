<?php
include_once 'sesion.php';
require_once 'model/usuario.php';
class UsuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Usuario();
        
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new Usuario();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-actualizar.php';
        require_once 'view/footer.php';
    }
    public function Guardar(){
        $alm = new Usuario();
        
        $alm->id = $_REQUEST['id'];
        $alm->correo = $_REQUEST['correo'];
		$alm->nombre = $_REQUEST['nombre'];
		$alm->usuario = $_REQUEST['usuario'];
        $alm->contrasena = base64_encode($_REQUEST['contrasena']);
		$alm->privilegio = $_REQUEST['privilegio'];
        
        $this->model->Registrar($alm);
        
        header('Location: registro usuarios.php');
    }
	
	public function Modificar(){
        $alm = new Usuario();
    	$alm->id = $_REQUEST['id'];
        $alm->correo = $_REQUEST['correo'];
		$alm->nombre = $_REQUEST['nombre'];
		$alm->usuario = $_REQUEST['usuario'];
        $alm->contrasena = base64_encode($_REQUEST['contrasena']);
		$alm->privilegio = $_REQUEST['privilegio'];
        	
            $this->model->Actualizar($alm);
     
	header('Location: registro usuarios.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: registro usuarios.php');
    }
}