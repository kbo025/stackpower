<?php

namespace Models;

use \Core\Model;

class Users extends Model {

	// Metodo para verificar se o Usuario está logado
	public function isLogged() {
		
		// Se a sessão NÃO estiver vazia e EXISTIR, retorne true.
		if(!empty($_SESSION['StockPower'])) {
			return true;
		}

		// Caso nao exista, retorne false;
		return false;

	}

	// Metodo para verificar o Login
	public function validateLogin($email, $password) {
		
		$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':password', md5($password));
		$sql->execute();

		if($sql->rowCount() > 0) {
			// Se o usuario existe, armazenamos as informações dele, e criamos uma sessao para ele
			$row = $sql->fetch();
			$_SESSION['StockPower'] = $row;
			
			// Retorna true (verdadeiro) caso encontre algum usuario.
			return true;
		}

		// Caso não seja encontrado, retorna false (falso)
		return false;
		
	}

} // End of Model