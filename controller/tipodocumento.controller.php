<?php
include_once 'sesion.php';
require_once 'model/tipodocumento.php';

class TipoDocumentoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new TipoDocumento();	
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/tipodocumento/tipodocumento.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new TipoDocumento();
        
        require_once 'view/header.php';
        require_once 'view/tipodocumento/tipodocumento-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new TipoDocumento();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/tipodocumento/tipodocumento-actualizar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new TipoDocumento();
        
        $alm->id_tipo = $_REQUEST['id_tipo'];
        $alm->nombre_documento = $_REQUEST['nombre_documento'];        
          $this->model->Registrar($alm);
        
        header('Location: tipodocumento.php');
    }
    public function Modificar(){
        $alm = new TipoDocumento();
    		$alm->id_tipo = $_REQUEST['id_tipo'];
            $alm->nombre_documento = $_REQUEST['nombre_documento'];
        	
            $this->model->Actualizar($alm);
     
	header('Location: tipodocumento.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: tipodocumento.php');
    }
}