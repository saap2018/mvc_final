<?php
include_once 'sesion.php';
require_once 'model/tiempo.php';

class tiempoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Tiempo();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/tiempo/tiempo.php';
        require_once 'view/footer.php';
    }
    public function Crud(){
        $alm = new Tiempo();
        
        require_once 'view/header.php';
        require_once 'view/tiempo/tiempo-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Update(){
        $alm = new Tiempo();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/tiempo/tiempo-actualizar.php';
        require_once 'view/footer.php';
    }
    public function Guardar(){
        $alm = new Tiempo();
        $alm->IdControlTiempo = $_REQUEST['IdControlTiempo'];
        $alm->Fechaliquidacion = $_REQUEST['Fechaliquidacion'];
		$alm->Placas = $_REQUEST['Placas'];
        $alm->Fecha_Entrada = $_REQUEST['Fecha_Entrada'];
        $alm->Fecha_Salida = $_REQUEST['Fecha_Salida'];
		$alm->Hora_Entrada = $_REQUEST['Hora_Entrada'];
		$alm->Hora_Salida = $_REQUEST['Hora_Salida'];
   
            $this->model->Registrar($alm);
			
        header('Location: tiempos.php');
    }
   public function Modificar(){
        $alm = new Tiempo();
        $alm->Placas = $_REQUEST['Placas'];
        $alm->valor = $_REQUEST['valor'];
		$alm->Placas = $_REQUEST['Placas'];
        $alm->Fecha_Entrada = $_REQUEST['Fecha_Entrada'];
        $alm->Fecha_Salida = $_REQUEST['Fecha_Salida'];
		$alm->Lugar = $_REQUEST['Lugar'];
		$alm->estado = $_REQUEST['Hora_Entrada'];
		$alm->liquidado = $_REQUEST['Hora_Salida'];
		
            $this->model->Actualizar($alm);
     
	header('Location: tiempos.php');
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: tiempos.php');
    }
}