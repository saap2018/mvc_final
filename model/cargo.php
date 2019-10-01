<?php
class Cargo
{
	private $pdo;
    
    public $id_cargo;
    public $nombre_cargo;

    
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

			$stm = $this->pdo->prepare("SELECT * FROM cargos ORDER BY nombre_cargo");
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
			          ->prepare("SELECT * FROM cargos WHERE id_cargo = ?");
			          

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
			            ->prepare("DELETE FROM cargos WHERE id_cargo = ?");			          

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
			$sql = "UPDATE cargos SET 
						nombre_cargo= ? 
					    WHERE id_cargo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						
    $data->nombre_cargo,
    $data->id_cargo        
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cargo $data)
	{
		try 
		{
		$sql = "INSERT INTO cargos (nombre_cargo) VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre_cargo
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}