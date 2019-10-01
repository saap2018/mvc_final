<?php
class Tiempo
{
	private $pdo;
    
	public $Fechaliquidacion;
	public $Placas; 
	public $Fecha_Entrada; 
    public $Fecha_Salida; 
	public $Hora_Entrada; 
    public $Hora_Salida;
	
   
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM ingresos where liquidado = ''");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tiempo WHERE IdControlTiempo = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tiempo WHERE IdControlTiempo = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE tiempo SET
			    Fechaliquidacion= ?, 
				Placas= ?, 
				Fecha_Entrada= ?, 
    			Fecha_Salida= ?,
				Hora_Entrada=?,
				Hora_Salida = ?
				WHERE IdControlTiempo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						
					
	$data->Fechaliquidacion,
    $data->Placas,
   	$data->Fecha_Entrada, 
	$data->Fecha_Salida, 
    $data->Hora_Entrada,
	$data->Hora_Salida,
	$data->IdControlTiempo  
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tiempo $data)
	{
		try 
		{
		$sql = "INSERT INTO tiempo (Fechaliquidacion, Placas, Fecha_Entrada, Fecha_Salida, Hora_Entrada,Hora_Salida)
		        VALUES (?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
				$data->Fechaliquidacion,
                $data->Placas,
   				$data->Fecha_Entrada, 
				$data->Fecha_Salida, 
    			$data->Hora_Entrada,
				$data->Hora_Salida
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}