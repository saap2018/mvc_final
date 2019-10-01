<?php
include_once 'sesion.php';
require_once 'model/ingreso.php';

class IngresoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Ingreso();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/ingreso/ingreso.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Ingreso();
        
        require_once 'view/header.php';
        require_once 'view/ingreso/ingreso-editar.php';
        require_once 'view/footer.php';
    }
    public function Update(){
        $alm = new Ingreso();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/ingreso/ingreso-actualizar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Ingreso();
        $alm->IdControlIngreso = $_REQUEST['IdControlIngreso'];
        $alm->fecha = $_REQUEST['fecha'];
		$alm->tiempo = $_REQUEST['tiempo'];
        $alm->TipoTarifa = $_REQUEST['TipoTarifa'];
        $alm->PlacasVehiculo = $_REQUEST['PlacasVehiculo'];
        $alm->NombreEmpleado = $_REQUEST['NombreEmpleado'];
		$alm->Lugar = $_REQUEST['Lugar'];
		$alm->estado = $_REQUEST['estado'];
		$alm->liquidado = $_REQUEST['liquidado'];
        
            $this->model->Registrar($alm);
			$this->model->CambiarEstado($alm);
        
        header('Location: ingresos.php');
    }
    public function Modificar(){
        $alm = new Ingreso();
    	$alm->IdControlIngreso = $_REQUEST['IdControlIngreso'];
        $alm->fecha = $_REQUEST['fecha'];
		$alm->tiempo = $_REQUEST['tiempo'];
        $alm->TipoTarifa = $_REQUEST['TipoTarifa'];
        $alm->PlacasVehiculo = $_REQUEST['PlacasVehiculo'];
        $alm->NombreEmpleado = $_REQUEST['NombreEmpleado'];
		$alm->Lugar = $_REQUEST['Lugar'];
		$alm->estado = $_REQUEST['estado'];
        $alm->liquidado = $_REQUEST['liquidado'];
					
            $this->model->Actualizar($alm);
     
	header('Location: ingresos.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: ingresos.php');
    }
}