<?php
class TipoVehiculo
{
	private $pdo;
    
    public $id_tipov;
    public $nombre_tipov;

    
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

			$stm = $this->pdo->prepare("SELECT * FROM tipo_de_vehiculo ORDER BY nombre_tipov");
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
			          ->prepare("SELECT * FROM tipo_de_vehiculo WHERE id_tipov = ?");
			          

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
			            ->prepare("DELETE FROM tipo_de_vehiculo WHERE id_tipov = ?");			          

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
			$sql = "UPDATE tipo_de_vehiculo SET 
						nombre_tipov= ? 
					    WHERE id_tipov = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						
    $data->nombre_tipov,
    $data->id_tipov        
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(TipoVehiculo $data)
	{
		try 
		{
		$sql = "INSERT INTO tipo_de_vehiculo (nombre_tipov) VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre_tipov
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}