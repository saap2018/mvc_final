<?php
class Roles
{
	private $pdo;
    
    public $id_nivel;
    public $nivel;
    public $Estado;
    
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

			$stm = $this->pdo->prepare("SELECT * FROM nivel");
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
			          ->prepare("SELECT * FROM nivel WHERE id_nivel = ?");
			          

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
			            ->prepare("DELETE FROM nivel WHERE id_nivel = ?");			          

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
			$sql = "UPDATE nivel SET 
						nivel= ? ,
						Estado= ? 
					    WHERE id_nivel = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						
    $data->nivel,
    $data->Estado,
    $data->id_nivel        
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Roles $data)
	{
		try 
		{
		$sql = "INSERT INTO nivel (nivel, Estado) VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nivel,
    				$data->Estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}