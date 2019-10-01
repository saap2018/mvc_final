<?php
class UsuarioAdmin
{
	private $pdo;
    
    public $id;
	public $correo;
	public $nombre;
    public $usuario;
    public $contrasena;
   public $privilegio;

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

			$stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE privilegio NOT IN ('Superusuario') ORDER BY privilegio");
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
			          ->prepare("SELECT * FROM usuarios WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idu)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuarios WHERE id = ?");			          

			$stm->execute(array($idu));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuarios SET 
						correo          = ?, 
						nombre        = ?,
						usuario          = ?, 
						contrasena        = ?,
						privilegio        = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->correo, 
                        $data->nombre,
						$data->usuario, 
                        $data->contrasena,
					    $data->privilegio,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(UsuarioAdmin $data)
	{
		try 
		{
		$sql = "INSERT INTO usuarios (correo,nombre,usuario,contrasena,privilegio) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->correo, 
                    $data->nombre,
					$data->usuario, 
                    $data->contrasena,
					$data->privilegio
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}