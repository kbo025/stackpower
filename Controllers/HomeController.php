<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Home;

class HomeController extends Controller {

	private $user;
	private $arrayInfo;

	public function __construct() {
		$this->user = new Users();

		if(!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");
			exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'home'
		);
	}

	public function index() {

		$id_usuario       = addslashes($_SESSION['StockPower']['id']);
		
	    $home = new Home();

	    $this->arrayInfo['listaSarcAberto'] = $home->getListSarcOpen($id_usuario);
	    $this->arrayInfo['listaSarcFechado'] = $home->getListSarcClose($id_usuario);
	    $this->arrayInfo['listaSarcCar'] = $home->getListCar($id_usuario);
	    $this->arrayInfo['listaSarcUser'] = $home->getListUser($id_usuario);

		$this->loadTemplate('home', $this->arrayInfo);
	}

}