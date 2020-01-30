<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Usuario;
use \Models\Base;

class UsuarioController extends Controller {

    private $user;
    private $arrayInfo;

    public function __construct() {
        $this->user = new Users();

        if(!$this->user->isLogged()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
		$array['error'] = '';
		
		if(!empty($_SESSION['errorMsg'])) {
			$array['error'] = $_SESSION['errorMsg'];
			$_SESSION['errorMsg'] = '';
		}
		
        $this->arrayInfo = array(
            'user' => $this->user,
			'error' => $array['error'],
            'menuActive' => 'usuario'
        );
	
    }

    public function index() {

        $usuario = new Usuario();

        $this->arrayInfo['list'] = $usuario->getList();
        $this->loadTemplate('usuario', $this->arrayInfo);
    }

    public function add()
    {
		$base = new Base();
		
		$this->arrayInfo['base_list'] = $base->getList();
        $this->loadTemplate('usuario_add', $this->arrayInfo);
    }

    public function add_action()
    {	
	if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['tipo']) && !empty($_POST['base'])) {
		   $nome = addslashes($_POST['nome']);
		   $email = addslashes($_POST['email']);
		   $senha = addslashes($_POST['senha']);
		   $tipo = addslashes($_POST['tipo']);
		   $base = addslashes($_POST['base']);
		   
		   $usuario = new Usuario();
		   	if($usuario->add($nome, $email, $senha, $tipo, $base)) {
				header("Location: ".BASE_URL."usuario");
				exit;
			} else {
				$_SESSION['errorMsg'] = 'Error cadastrar';
			}
			}else {
			$_SESSION['errorMsg'] = 'Preencha os campos abaixo.';
		}
		header("Location: ".BASE_URL."usuario/add");
		exit;
  
    }

    public function edit($id)
    {
       $usuario = new Usuario();
       $this->arrayInfo['info'] = $usuario->getInfo($id);
       $this->loadTemplate('usuario_edit', $this->arrayInfo);
    }

    public function edit_action($id)
    {
       $nome   = $_POST['nome'];
       $email  = $_POST['email'];
       $senha  = $_POST['senha'];
       $tipo   = $_POST['tipo'];;
      
       $usuario = new Usuario();
       $usuario->edit($id, $nome, $email, $senha, $tipo);

       header("Location: ".BASE_URL."usuario");
       exit;
    }
	
    public function delete($id)
    {
        $usuario = new Usuario();
        $usuario->delete($id);

        header("Location: ".BASE_URL."usuario");
        exit;
    }
	

}