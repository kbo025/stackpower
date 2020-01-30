<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Base;

class LoginController extends Controller {
	

	public function index() {
		
		$base = new Base();
		
		$array = array(
			'error' => '',
			'base_list' => $base->getList(),
		);

		if(!empty($_SESSION['errorMsg'])) {
			$array['error'] = $_SESSION['errorMsg'];
			$_SESSION['errorMsg'] = '';
		}

		$this->loadView("login", $array);
	}

	public function index_action() {
		if(!empty($_POST['email']) && !empty($_POST['password'])) {
			$email = addslashes($_POST['email']);
			$password = addslashes($_POST['password']);

			$u = new Users();
			if($u->validateLogin($email, $password)) {
				header("Location: ".BASE_URL);
				exit;
			} else {
				$_SESSION['errorMsg'] = 'E-mail e/ou senha incorretos';
			}
		} else {
			$_SESSION['errorMsg'] = 'Preencha os campos abaixo.';
		}

		header("Location: ".BASE_URL."login");
		exit;
	}

	public function logout() {
		unset($_SESSION['StockPower']);
		header("Location: ".BASE_URL."login");
		exit;
	}

} // End of Controller