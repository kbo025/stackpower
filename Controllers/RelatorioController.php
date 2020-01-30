<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Relatorio;
use \Models\Base;

class RelatorioController extends Controller {

    private $user;
    private $arrayInfo;
	private $error;

    public function __construct() {
        $this->user = new Users();
        if(!$this->user->isLogged()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
		
        $this->arrayInfo = array(
            'user' => $this->user,
            'menuActive' => 'relatorio'
        );
		
    }

    public function index() {

        $relatorio = new Relatorio();
		$base = new Base();
		
		$this->arrayInfo['base_list'] = $base->getList();
        $this->loadTemplate('relatorio', $this->arrayInfo);
    }
	
	public function rel_action()
    {	
       $data = $_POST['data'];
       $data1 = $_POST['data1'];
       $base = $_POST['base'];
       $status = $_POST['status'];
     
      $relatorio = new Relatorio();
	  
	  if ($data != '' && $data1 != '' && $base != null && $status != null)
	  {
	
		  $this->arrayInfo['list'] = $relatorio->getListAll($data, $data1, $base, $status);
		  ob_start();
		  $this->loadView("relatorio_sarc", $this->arrayInfo);
		  
		  $html = ob_get_contents();
		  ob_get_clean();
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $mpdf->WriteHTML($html);
		  $mpdf->OutPut();
		  exit();
	  }  	  
	  if ($data != '' && $data1 != ''&& $base != '')
	  {
		  
		  $this->arrayInfo['list'] = $relatorio->getListDT($data, $data1, $base);
		  ob_start();
		  $this->loadView("relatorio_sarc", $this->arrayInfo);
		  
		  $html = ob_get_contents();
		  ob_get_clean();
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $mpdf->WriteHTML($html);
		  $mpdf->OutPut();
		  exit();
	  }  
	  
	  if ($base != null)
	  {
	      $this->arrayInfo['list'] = $relatorio->getListBase($base);
		  ob_start();
		  $this->loadView("relatorio_sarc", $this->arrayInfo);
		  
		  $html = ob_get_contents();
		  ob_get_clean();
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $mpdf->WriteHTML($html);
		  $mpdf->OutPut();
		  exit();
	  }  
	 if ($data == '' && $data1 == '' && $base == '' && $status == '')
	  {
	      $this->arrayInfo['list'] = $relatorio->getListA();
		  ob_start();
		  $this->loadView("relatorio_sarc", $this->arrayInfo);
		  
		  $html = ob_get_contents();
		  ob_get_clean();
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $mpdf->WriteHTML($html);
		  $mpdf->OutPut();
		  exit();
	  }   
	  	
    }
	
}