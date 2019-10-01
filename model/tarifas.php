<?php
class Tarifas
{
	private $pdo;
    
    public $id_tarifa;
    public $tarifa;
    public $valor;

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

			$stm = $this->pdo->prepare("SELECT * FROM tarifas ORDER BY tarifa");
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
			          ->prepare("SELECT * FROM tarifas WHERE id_tarifa = ?");
			          

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
			            ->prepare("DELETE FROM tarifas WHERE id_tarifa = ?");			          

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
			$sql = "UPDATE tarifas SET 
						tarifa= ?,
						valor= ? 
					    WHERE id_tarifa = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						
    $data->tarifa,
	$data->valor,
    $data->id_tarifa        
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tarifas $data)
	{
		try 
		{
		$sql = "INSERT INTO tarifas (tarifa,valor) VALUES (?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->tarifa,
					$data->valor
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}