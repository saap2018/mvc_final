<?php
class parametros
{
	private $pdo;
    
    public $id_cantidad;
    public $Nombre_Empresa;
    public $Direccion;
    public $Telefonos;
    public $correo;
    public $cantidad;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conexion::StartUp();     
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

	public function getting($id_cantidad)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM parametros WHERE id_cantidad = ?");
			          

			$stm->execute(array($id_cantidad));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_cantidad)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM parametros WHERE id_cantidad = ?");			          

			$stm->execute(array($id_cantidad));
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
						nombres          = ?, 
						cedula        = ?,
                        fecha_nmto        = ?,
						direccion            = ?, 
						email = ?
				    WHERE id_cantidad = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombres, 
                        $data->cedula,
                        $data->fecha_nmto,
                        $data->direccion,
                        $data->email,
                        $data->id_cantidad
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(parametros $data)
	{
		try 
		{
		$sql = "INSERT INTO parametros (id_cantidad,nombres,cedula,fecha_nmto,direccion,email) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_cantidad,
                    $data->nombres, 
                    $data->cedula,
                    $data->fecha_nmto,
                    $data->direccion,
                    $data->email                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>
