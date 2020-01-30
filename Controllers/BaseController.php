<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Base;

class BaseController extends Controller {

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
            'menuActive' => 'base'
        );
    }

    public function index() {

        $base = new Base();

        $this->arrayInfo['list'] = $base->getList();
        $this->loadTemplate('base', $this->arrayInfo);
    }

    public function add()
    {
		$base = new Base();
	
        $this->loadTemplate('base_add', $this->arrayInfo);
    }

    public function add_action()
    {
       $nome = $_POST['nome'];
		
       $base = new Base();
       $base->add($nome);

       header("Location: ".BASE_URL."base");
       exit;
    }

    public function edit($id)
    {
        $base = new Base();

        $this->arrayInfo['info'] = $base->getInfo($id);
        $this->loadTemplate('base_edit', $this->arrayInfo);
    }

    public function edit_action($id)
    {
       $nome   = $_POST['nome'];
     
      
        $base = new Base();
        $base->edit($id, $nome);

        header("Location: ".BASE_URL."base");
        exit;
    }
	
    public function delete($id)
    {
		$base = new Base();
        $base->delete($id);

        header("Location: ".BASE_URL."base");
        exit;
    }
	

}