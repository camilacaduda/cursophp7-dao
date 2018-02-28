<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){

		return $this->idusuario;
	}

	public function setIdusuario($value){

		$this->idusuario = $value;
	}

	public function getDeslogin(){

		return $this->deslogin;
	}

	public function setDeslogin($value){

		$this->deslogin = $value;
	}


	public function getDessenha(){

		return $this->dessenha;
	}

	public function setDessenha($value){

		$this->dessenha = $value;
	}


	public function getDtcadastro(){

		return $this->dtcadastro;
	}

	public function setDtcadastro($value){

		$this->dtcadastro = $value;
	}


//listando os dados do banco, carregarndo pelo Id/Primary Key 

	public function loadById($id){

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM  tb_usuario Where idsuario = :ID", array(

			":ID"=>$id
		));

		if (isset($result[0])) {

			
				$this->setData($results[0]);
		}

		public function getList(){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuario ORDER BY deslogin;");
		}

		public function login($login,$password){

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM 	tb_usuario Where deslogin = :LOGIN AND dessenha =: PASSWORD", array(

				":LOGIN"=>$login,
				":PASSWORD"=>$password
			));

			if (count($results)>0){

				

				$this->setData($results[0]);

			}else{

				throe new Expeption ("Login e/ou senha inválidos.");
			}

		}

		public function setData($data){

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime ($row['dtcadastro']));

		}

		public function insert(){

			$sql = new Sql();

			$results = $sql->select("CALL sp_usuario_insert(:LOGIN,:PASSWORD)", array(

				':LOGIN'=>$this->getDeslogin(),
				':PASSWORD'=>$this->getDessenha()

			));

			if (count($results)>0){

				
				$this->setData($results[0]);

			}
		}

		public function update($login, $password){

			$this->setDeslogin($login);
			$this->setDessenha($password);
			

			$sql = new Sql();

			$sql->query("UPDATE tb_usuario SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID" array(

				':LOGIN'=>$this->getDeslogin(),
				':PASSWORD'=>$this->getDessenha(),
				':ID'=>$this->getIdusuario()

			));
		}	








// atributos preenchidos com os dados que vem do banco desta função loadById

		public function __toString() {

			return json_encode(array(

				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")
			
			));
		}


	}



}




 ?>