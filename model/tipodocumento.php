<?php
class TipoDocumento
{
	private $pdo;
    
    public $id_tipo;
    public $nombre_documento;

    
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

			$stm = $this->pdo->prepare("SELECT * FROM tipo_de_documento ORDER BY nombre_documento");
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
			          ->prepare("SELECT * FROM tipo_de_documento WHERE id_tipo = ?");
			          

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
			            ->prepare("DELETE FROM tipo_de_documento WHERE id_tipo = ?");			          

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
			$sql = "UPDATE tipo_de_documento SET 
						nombre_documento= ? 
					    WHERE id_tipo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						
    $data->nombre_documento,
    $data->id_tipo        
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(TipoDocumento $data)
	{
		try 
		{
		$sql = "INSERT INTO tipo_de_documento (nombre_documento) VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre_documento
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}