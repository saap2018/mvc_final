<?php
include_once 'sesion.php';

require_once 'model/parametros.php';

class parametrosController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new parametros();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/parametros/parametros.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new parametros();
        
        require_once 'view/header.php';
        require_once 'view/parametros/parametros-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new parametros();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/parametros/parametros-actualizar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new parametros();
        
        $alm->id_cantidad = $_REQUEST['id_cantidad'];
        $alm->Nombre_Empresa= $_REQUEST['Nombre_Empresa'];
        $alm->identificacion = $_REQUEST['identificacion'];
        $alm->Direccion = $_REQUEST['Direccion'];
        $alm->Telefonos = $_REQUEST['Telefonos'];
        $alm->correo = $_REQUEST['correo'];
		$alm->cantidad = $_REQUEST['cantidad'];	
        
            $this->model->Registrar($alm);
        
        header('Location: parametros.php');
    }
    public function Modificar(){
        $alm = new parametros();
    	$alm->id_cantidad = $_REQUEST['id_cantidad'];
        $alm->Nombre_Empresa= $_REQUEST['Nombre_Empresa'];
        $alm->identificacion = $_REQUEST['identificacion'];
        $alm->Direccion = $_REQUEST['Direccion'];
        $alm->Telefonos = $_REQUEST['Telefonos'];
        $alm->correo = $_REQUEST['correo'];
		$alm->cantidad = $_REQUEST['cantidad'];
		
        	
            $this->model->Actualizar($alm);
     
	header('Location: parametros.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: parametros.php');
    }
}

	