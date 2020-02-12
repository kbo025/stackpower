<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Sarquear;
use \Models\Base;
use \Models\Bairro;
use \Models\Rua;

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

    public function add()
    {
		$base = new Base();
		$bairro = new Bairro();
		
		$this->arrayInfo['base_list']    = $base->getList();
		$this->arrayInfo['bairros_list'] = $bairro->getList();

        $this->loadTemplate('sarquear_add', $this->arrayInfo);
	}
	
	public function asyncruas()
	{
		$cod_bairro = $_GET['cod_bairro'];
		$ruas =  (new Rua)->getList($cod_bairro);

		echo json_encode($ruas);
		die;
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

	public function asyncdata() {

		$params = [];
		if (!empty($_GET['filter'])) {
			$params['base'] = explode("|", $_GET['filter']);
			$_SESSION['sarquear_filters'] = $params['base'];
		} else if (isset($_SESSION['sarquear_filters'])) {
			$params['base'] = $_SESSION['sarquear_filters'];
		}

		$sarquear = new Sarquear();
		//$id_usuario = addslashes($_SESSION['StockPower']['id']);
		$data = $sarquear->getList($params/*, $id_usuario*/);

		$data = array_map(
				function($e) {
					$opcoes = '';
					$base = BASE_URL;
					$id = $e['id'];
					if ($_SESSION['StockPower']['tipo_usuario'] != 3) {
						if ($e['status'] == 1) { 
							$opcoes .= "<a href='{$base}sarquear/atender/$id' class='btn btn-success'  target='_blank'>Atender</a>";
						} elseif (($e['id_usuario'] == $_SESSION['StockPower']['id']) && ($e['status'] == 4)  && ($_SESSION['StockPower']['tipo_usuario'] = 1)) {
							$opcoes .= "<a href='{$base}sarquear/conduzir/$id' class='btn btn-danger'>Conduzir</a>";
						} elseif (($e['id_operador'] == $_SESSION['StockPower']['id']) && ($e['status'] == 2)) { 
							$opcoes .= "<a href='{$base}sarquear/responder/$id' class='btn btn-primary'>Responder</a>";
						}
					} elseif (($e['id_usuario'] == $_SESSION['StockPower']['id']) && ($e['status'] == 4) && ($_SESSION['StockPower']['tipo_usuario'] = 3)) { 
						$opcoes .= "<a href='{$base}sarquear/conduzir/$id' class='btn btn-danger'>Conduzir</a>";
					}elseif (($e['id_usuario'] == $_SESSION['StockPower']['id']) && ($e['status'] == 3) && ($_SESSION['StockPower']['tipo_usuario'] = 3)) { 
						$opcoes .= "<a href='{$base}sarquear/view/$id' class='btn btn-success'>Visualizar</a>";
					}
					
					$opcoes =  "<div class='btn-group'>$opcoes</div>";
					$e['opcoes'] = $opcoes;
					return $e;
				},
			$data);

		echo json_encode(['data' => $data]);
		die;
	}

	public function add_action() {
		if(!empty(addslashes($_POST['txtplaca']))){
		   $base 			  = addslashes($_POST['base']);
		   $txtrgpm 		  = addslashes($_POST['txtrgpm']);
		   $telefone   		  = addslashes($_POST['telefone']);
		   $txtplaca   		  = addslashes($_POST['txtplaca']);
		   $cod_bairro   	  = addslashes($_POST['bairroocorrencia']);
		   $cod_rua			  = addslashes($_POST['ruaocorrencia']);
		   $bairro 			  = (new Bairro)->findOne($cod_bairro);
		   $rua			      = (new Rua)->findOne($cod_rua);
		   $localocorrencia   = $bairro['nome'] . ', ' . $rua['nome'];
		   $tpconsulta  	  = addslashes($_POST['tpconsulta']);	
		   $id_operador       = addslashes($_SESSION['StockPower']['id']);	
		   $txtobs            = addslashes($_POST['txtobs']);

			$sarquear = new Sarquear();
			$sarquear->addVeiculo($base, $txtrgpm, $telefone, $localocorrencia, $txtplaca, $tpconsulta, $txtobs, $id_operador);
			header("Location: ".BASE_URL."sarquear");
			exit;
		   
			
		}
		
		if(!empty(addslashes($_POST['txtrgpm']) && !empty(addslashes($_POST['base'])))) {	
				$base 			    = addslashes($_POST['base']);
				$txtrgpm 		    = addslashes($_POST['txtrgpm']);
				$telefone   		= addslashes($_POST['telefone']);
				$bairro 			= (new Bairro)->findOne($cod_bairro);
				$rua			    = (new Rua)->findOne($cod_rua);
				$localocorrencia   = $bairro['nome'] . ', ' . $rua['nome'];
				$tpconsulta  	    = addslashes($_POST['tpconsulta']);
				$motivo  		    = addslashes($_POST['motivo']);
				$txtnome  		    = addslashes($_POST['txtnome']);
				$txtrg   		    = addslashes($_POST['txtrg']);
				$txtcpf  		    = addslashes($_POST['txtcpf']);
				$txtdtnasc 		    = date("Y-m-d", strtotime(addslashes($_POST['txtdtnasc'])));
				$txtmae             = addslashes($_POST['txtmae']);
				$txtpai             = addslashes($_POST['txtpai']);
				$txtobs             = addslashes($_POST['txtobs']);
				$id_operador 		= addslashes($_SESSION['StockPower']['id']);;
			
			
				$sarquear = new Sarquear();
				if(	$sarquear->addPessoa($base, $txtrgpm, $telefone, $localocorrencia, $tpconsulta, $motivo, $txtnome, $txtrg, $txtcpf, $txtdtnasc, $txtmae, $txtpai, $txtobs, $id_operador)) {
					if($_FILES) {
						try {
							if (!$_FILES) {
								throw new \UnexpectedValueException(
									'There was a problem with the upload. Please try again.'
								);
							}
						} catch (\Exception $exc) {
							echo $exc->getMessage();
							exit();
						}
						$sarquear->get_image();
					}
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
		$id_usuario      = addslashes($_SESSION['StockPower']['id']);
        $sarquear 		 = new Sarquear();

        $this->arrayInfo['info'] = $sarquear->getInfo($id);
		$this->arrayInfo['list_pesq'] = $sarquear->getPesquisador($id);
        $this->loadTemplate('sarquear_responder', $this->arrayInfo);
    }

    public function responder_aqui($id)
    {   
	
		$protudoIcone = join(",",$_POST["check"]);

		$arr = array($protudoIcone);

		$tam = sizeof($arr);

		for ($i = 0; $i <= $tam-1; $i++) {
			$outra .= $arr[$i];
		}
		$date1 = strtr($_POST['txtdatanascimento'], '/', '-');
		
	    $d = date('Y-m-d', strtotime($date1));
		
        $situacao	= addslashes($_POST['situacao']);
		$status		= addslashes($_POST['status']);
        $check 		= $outra;
		$obs 		= addslashes($_POST['resposta']);
		$txtnome	= addslashes($_POST['txtnome']);
		$txtrg		= addslashes($_POST['txtrg']);
		$txtcpf		= addslashes($_POST['txtcpf']);
		$txtpai		= addslashes($_POST['txtpai']);
		$txtmae		= addslashes($_POST['txtmae']);
		$txttelefonepm	= addslashes($_POST['txttelefonepm']);
		$txtplaca	= addslashes($_POST['txtplaca']);
		$txtdatanascimento	= $d ;

		if ($status == '') {
			$_SESSION['errorMsg'] = 'selecione um Status';
			header("Location: ".BASE_URL."sarquear/responder/".$id);
			exit;
		}
		
        $sarquear = new Sarquear();
		if($_FILES) {
			try {
				if (!$_FILES) {
					throw new \UnexpectedValueException(
					'There was a problem with the upload. Please try again.'
					);
				}
			} catch (\Exception $exc) {
				echo $exc->getMessage();
				exit();
			}
			$sarquear->get_files($id);
		}		
        $sarquear->edit($id, $situacao, $status, $check, $obs, $txtnome, $txtrg, $txtcpf, $txtplaca, $txtpai, $txtmae, $txttelefonepm, $txtdatanascimento);

        header("Location: ".BASE_URL."sarquear");
        exit;
	}
	
	public function conduzir($id)
    {	
        $sarquear = new Sarquear();

        $this->arrayInfo['info'] = $sarquear->getInfo($id);
        $this->arrayInfo['anexo'] = $sarquear->getAnexo($id);
        $this->loadTemplate('sarquear_conduzir', $this->arrayInfo);
	}
	
	public function conduzir_aqui($id)
    {
        $txtro				= addslashes($_POST['txtro']);
		$txtcondutor		= addslashes($_POST['txtcondutor']);
        $txtrgtestmunha 	= addslashes($_POST['txtrgtestmunha']);
		$data 				= $_POST['data'];
		$hora				= $_POST['hora'];
		$datad 				= $_POST['datad'];
		$horad				= $_POST['horad'];
		$delito				= addslashes($_POST['delito']);
		$status				= addslashes($_POST['status']);
		$txtdinamica		= addslashes($_POST['txtdinamica']);
		
		
        $sarquear = new Sarquear();
        $sarquear->conduzir_update($id, $txtro, $txtcondutor, $txtrgtestmunha, $data, $hora, $datad, $horad, $delito, $status, $txtdinamica);

        header("Location: ".BASE_URL."sarquear");
        exit;
	}

	public function view($id)
    {
		//$id_usuario       = addslashes($_SESSION['StockPower']['id']);
		
        $sarquear = new Sarquear();

        $this->arrayInfo['info'] = $sarquear->getInfo($id);
		$this->arrayInfo['list_pesq'] = $sarquear->getPesquisador($id);
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
		$txtresposta_usuario = addslashes($_POST['txtresposta_usuario']);
		
        $sarquear = new Sarquear();
		$sarquear->fechar($id, $txtresposta_usuario);

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
