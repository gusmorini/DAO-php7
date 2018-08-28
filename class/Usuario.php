<?php 

class Usuario
{
	private $idusuario, $deslogin, $dessenha, $dtcadastro;

	public function getIdusuario()
	{
		return $this->idusuario;
	}
	public function setIdusuario($i)
	{
		$this->idusuario = $i;
	}	

	public function getDeslogin()
	{
		return $this->deslogin;
	}
	public function setDeslogin($i)
	{
		$this->deslogin = $i;
	}

	public function getDessenha()
	{
		return $this->dessenha;
	}
	public function setDessenha($i)
	{
		$this->dessenha = $i;
	}	

	public function getDtcadastro()
	{
		return $this->dtcadastro;
	}
	public function setDtcadastro($i)
	{
		$this->dtcadastro = new DateTime($i);
	}

	//-------------------------------------------------------------------------------

	public function setData($data)
	{
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro($data['dtcadastro']);
	}

	public static function getList()
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
	}

	public static function search($login)
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"
		));
	}

	public function login($login, $password)
	{
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if (count($results) > 0 )
		{
			$this->setData($results[0]);
		}
		else
		{
			throw new Exception("Login e/ou senha inválidos.");
		}
	}

	public function loadById($id)
	{
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));

		if (count($results) > 0 )
		{
			$this->setData($results[0]);
		}
	}

	public function insert($login, $senha)
	{
		$sql = new Sql();
		$sql->query("INSERT INTO tb_usuarios (deslogin,dessenha) VALUES (:LOGIN,:SENHA)", 
			array(":LOGIN"=>$login, ":SENHA"=>$senha));
	}

	public function update($login, $senha)
	{
		$this->setDeslogin($login);
		$this->setDessenha($senha);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios 
							SET deslogin = :LOGIN, 
								dessenha = :SENHA 
							WHERE idusuario = :ID", 
			array(
				':LOGIN'=>$this->getDeslogin(),
				':SENHA'=>$this->getDessenha(),
				':ID'=>$this->getIdusuario()
		));
	}

	public function delete()
	{
		$sql = new Sql();
		$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", 
			array(':ID'=>$this->getIdusuario()));
		echo 'usuario deletado';

	}


	public function __toString()
	{
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}

}