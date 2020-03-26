<?php

class Usuario{

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
//===========================================
	public function getDeslogin(){
		return $this->deslogin;
	}
	public function setDeslogin($value){
		$this->deslogin = $value;
	}
//===========================================
	public function getDessenha(){
		return $this->dessenha;
	}
	public function setDessenha($value){
		$this->dessenha = $value;
	}
//==========================================
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

//----------------------------------------------------

	public function loadById($id){ //Método retorna um ID do banco de dados

		$sql = new sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			
			":ID"=>$id
		));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}


	}

	//===================================================================================

		// A vantegem do método estático, que não precisa instanciar

	public static function getList(){ // Método que retorna uma lista dos usuários do banco de dados 

		$sql = new sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");



	}

	//=================================================================================

  //Realiza busca por usuários, através de suas iniciais ou por uma letra

	public static function search($login){

		$sql = new sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(

			':SEARCH'=> "%". $login. "%"

		));

	}


  //==================================================================================

// Método de validação de login 

	public function login($login, $password){

		$sql = new sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		} else {

			throw new Exception("Login ou senha inválidos");	

		}




	}//end class




	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")

		));
	}















}






?>