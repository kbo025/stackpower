<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Sarquear;
use \Models\Base;

class SarquearController extends Controller {

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

        $sarquear = new Sarquear();
		$base = new Base();
		
		$this->arrayInfo['base_list'] = $base->getList();
        $this->arrayInfo['list'] = $sarquear->getList();
        $this->loadTemplate('sarquear', $this->arrayInfo);
	}
	
	public function asyncdata() {
		$sarquear = new Sarquear();
		$data = $sarquear->getList();

		echo $data;
		die;
	}

    public function add()
    {
		$base = new Base();
		
		$this->arrayInfo['base_list'] = $base->getList();
        $this->loadTemplate('sarquear_add', $this->arrayInfo);
    }
	public function veic()
    {		
		$base = new Base();
	   
		$this->arrayInfo['base_list'] = $base->getList();
        $this->loadTemplate('sarquear_veic', $this->arrayInfo);
    }
	
	public function veic_action()
	{
	   $placa       = addslashes($_POST['placa']);
	   $base 		= addslashes($_POST['base']);
	   $id_operador = addslashes($_SESSION['StockPower']['id']);
	   
	   $sarquear = new Sarquear();
       $sarquear->veic($placa, $base, $id_operador);

	   header("Location: ".BASE_URL."sarquear/list");
	   exit;
	}

	public function add_action() {
		
		if(!empty(addslashes($_POST['txtplaca']))){
		   $base 			  = addslashes($_POST['base']);
		   $txtrgpm 		  = addslashes($_POST['txtrgpm']);
		   $telefone   		  = addslashes($_POST['telefone']);
		   $txtplaca   		  = addslashes($_POST['txtplaca']);
		   $localocorrencia   = addslashes($_POST['localocorrencia']);
		   $tpconsulta  	  = addslashes($_POST['tpconsulta']);	
		   $id_operador       = addslashes($_SESSION['StockPower']['id']);	
		   $txtobs            = addslashes($_POST['txtobs']);

			$sarquear = new Sarquear();
			$sarquear->addVeiculo($base, $txtrgpm, $telefone, $localocorrencia, $txtplaca, $tpconsulta, $txtobs, $id_operador);
			header("Location: ".BASE_URL."sarquear");
			exit;
		   
			
		}
		
		if(!empty(addslashes($_POST['txtrgpm']) && !empty(addslashes($_POST['base'])))) {
		   $base 			  = addslashes($_POST['base']);
		   $txtrgpm 		  = addslashes($_POST['txtrgpm']);
		   $telefone   		  = addslashes($_POST['telefone']);
		   $localocorrencia   = addslashes($_POST['localocorrencia']);
		   $tpconsulta  	  = addslashes($_POST['tpconsulta']);
		   $motivo  		  = addslashes($_POST['motivo']);
		   $txtnome  		  = addslashes($_POST['txtnome']);
		   $txtrg   		  = addslashes($_POST['txtrg']);
		   $txtcpf  		  = addslashes($_POST['txtcpf']);
		   $txtdtnasc 		  = date("Y-m-d", strtotime(addslashes($_POST['txtdtnasc'])));
		   $txtmae            = addslashes($_POST['txtmae']);
		   $txtpai            = addslashes($_POST['txtpai']);
		   $txtobs            = addslashes($_POST['txtobs']);
		   $id_operador       = addslashes($_SESSION['StockPower']['id']);
	
			$sarquear = new Sarquear();
			if($sarquear->addPessoa($base, $txtrgpm, $telefone, $localocorrencia, $tpconsulta, $motivo, $txtnome, $txtrg, $txtcpf, $txtdtnasc, $txtmae, $txtpai, $txtobs, $id_operador)) {
				header("Location: ".BASE_URL."sarquear");
				exit;
			} else {
				$_SESSION['errorMsg'] = 'Error cadastrar';
			}
		} else {
			$_SESSION['errorMsg'] = 'Preencha os campos abaixo.';
	
		}

		header("Location: ".BASE_URL."sarquear/add");
		exit;
	}	
	
	

    public function atender($id)
    {
		$id_usuario       = addslashes($_SESSION['StockPower']['id']);

		$sarquear = new Sarquear();
		$sarquear->atender($id , $id_usuario);
		header("Location: ".BASE_URL."sarquear");
		exit;
    }
	
	public function responder($id)
    {
        $sarquear = new Sarquear();

        $this->arrayInfo['info'] = $sarquear->getInfo($id);
		$this->arrayInfo['list_pesq'] = $sarquear->getPesquisador();
        $this->loadTemplate('sarquear_responder', $this->arrayInfo);
    }

    public function responder_aqui($id)
    {

        $situacao	= addslashes($_POST['situacao']);
		$status		= addslashes($_POST['status']);
        $check 		= addslashes($_POST['baseconsultas']);
		$obs 		= addslashes($_POST['resposta']);
		$txtnome	= addslashes($_POST['txtnome']);
		$txtrg		= addslashes($_POST['txtrg']);
		$txtcpf		= addslashes($_POST['txtcpf']);
		$txtplaca	= addslashes($_POST['txtplaca']);
		
        $sarquear = new Sarquear();
        $sarquear->edit($id, $situacao, $status, $check, $obs, $txtnome, $txtrg, $txtcpf, $txtplaca);

        header("Location: ".BASE_URL."sarquear");
        exit;
	}
	
	public function conduzir($id)
    {
        $sarquear = new Sarquear();

        $this->arrayInfo['info'] = $sarquear->getInfo($id);
        $this->loadTemplate('sarquear_conduzir', $this->arrayInfo);
	}
	
	public function conduzir_aqui($id)
    {
        $txtro				= addslashes($_POST['txtro']);
		$txtcondutor		= addslashes($_POST['txtcondutor']);
        $txtrgtestmunha 	= addslashes($_POST['txtrgtestmunha']);
		$data 				= $_POST['data'];
		$hora				= $_POST['hora'];
		$delito				= addslashes($_POST['delito']);
		$status				= addslashes($_POST['status']);
		$txtdinamica		= addslashes($_POST['txtdinamica']);
		
        $sarquear = new Sarquear();
        $sarquear->conduzir_update($id, $txtro, $txtcondutor, $txtrgtestmunha, $data, $hora, $delito, $status, $txtdinamica);

        header("Location: ".BASE_URL."sarquear");
        exit;
	}
	public function view($id)
    {
        $sarquear = new Sarquear();

        $this->arrayInfo['info'] = $sarquear->getInfo($id);
		$this->arrayInfo['list_pesq'] = $sarquear->getPesquisador();
        $this->loadTemplate('sarquear_view', $this->arrayInfo);
    }
	
	public function view_veic($id)
    {	
        $sarquear = new Sarquear();

        $this->arrayInfo['info'] = $sarquear->getInfo($id);
        $this->loadTemplate('sarquear_veic', $this->arrayInfo);
    }
	
    public function delete($id)
    {
        $sarquear = new Sarquear();
        $sarquear->delete($id);

        header("Location: ".BASE_URL."sarquear");
        exit;
	}

	public function fechar($id)
    {
		
        $sarquear = new Sarquear();
		$sarquear->fechar($id);

		header("Location: ".BASE_URL."consulta");
        exit;
	}
	
	public function voltar()
	{
		header("Location: ".BASE_URL."consulta");
        exit;
	}	
	public function consultan()
	{
		$sarquear = new Sarquear();
		$sarquear->server();
	}
	
	
}