<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Consulta;
use \Models\Base;

class ConsultaController extends Controller {

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
            'menuActive' => 'consulta'
        );
    }

    public function index() {

        $consulta = new Consulta();

        $this->arrayInfo['list'] = $consulta->getList();
        $this->loadTemplate('consulta', $this->arrayInfo);
    }

    public function add()
    {
		$base = new Base();
		
		$this->arrayInfo['base_list'] = $base->getList();
        $this->loadTemplate('consulta_add', $this->arrayInfo);
    }

    public function add_action()
    {
       $nome = $_POST['nome'];
       $rg   = $_POST['rg'];
       $cpf  = $_POST['cpf'];
       $datanasc = $_POST['dtnasc'];
       $nomemae = $_POST['nomemae'];
       $base = $_POST['base'];


       $consulta = new Consulta();
       $consulta->add($nome, $rg, $cpf, $datanasc, $base, $nomemae);

       header("Location: ".BASE_URL."consulta");
       exit;
    }

	
	public function view($id)
    {
        $consulta = new Consulta();

        $this->arrayInfo['info'] = $consulta->getInfo($id);
        $this->loadTemplate('consulta_view', $this->arrayInfo);
    }
	

}