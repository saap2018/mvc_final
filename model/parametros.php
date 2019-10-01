<?php
class Parametros
{
	private $pdo;
    
    public $id_cantidad;
    public $Nombre_Empresa;
    public $identificacion;
    public $Direccion;
    public $Telefonos;
    public $correo;
    public $cantidad;
    
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

			$stm = $this->pdo->prepare("SELECT * FROM parametros");
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
			          ->prepare("SELECT * FROM parametros WHERE id_cantidad = ?");
			          

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
			            ->prepare("DELETE FROM parametros WHERE id_cantidad = ?");			          

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
			$sql = "UPDATE parametros SET 
						Nombre_Empresa= ? ,
						identificacion= ? ,
						Direccion= ? ,
						Telefonos= ? ,
						correo= ? ,
						cantidad = ?
					    WHERE id_cantidad = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						
    $data->Nombre_Empresa,
    $data->identificacion,
    $data->Direccion,
    $data->Telefonos,
    $data->correo,
    $data->cantidad,
        $data->id_cantidad        
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Parametros $data)
	{
		try 
		{
		$sql = "INSERT INTO parametros (Nombre_Empresa, identificacion, Direccion, Telefonos, correo, cantidad) VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre_Empresa,
    				$data->identificacion,
    				$data->Direccion,
    				$data->Telefonos,
    				$data->correo,
    				$data->cantidad
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}