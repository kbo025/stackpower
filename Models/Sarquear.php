<?php

namespace Models;

use \Core\Model;

class Sarquear extends Model
{
    
    public function getList($params = array(), $id_usuario = null)
    {

        $tipoUsuario = addslashes($_SESSION['StockPower']['tipo_usuario']);

        $data = array();
        $strSql = "SELECT
            TIMEDIFF(a.dtfinal, a.dtinicial) as diferenca ,
            a.nome,
            a.placa,
            a.tipo,
            a.rg,
            a.cpf,
            a.nascimento,
            a.status,
            a.dtinicial,
            a.pai,
            a.mae,
            a.dtfinal,
            a.id,
            a.id_usuario,
            a.id_operador,
            case a.situacao
                when 1 then 'Anotações Criminais'
                when 2 then 'Busca e Apreensão'
                when 3 then 'Dados Inconsistentes'
                when 4 then 'Desaparecidos'
                when 5 then 'Evadido'
                when 6 then 'Mandado'
                when 7 then 'Nada Constatado'
                when 8 then 'Veiculo Roubado'
                when 9 then 'Outros'
            end as situacaonova,
            c.base,
            b.name
            FROM sarque a
            LEFT JOIN usuario b ON a.id_operador = b.id
            LEFT JOIN base c ON a.base = c.id
            WHERE
             (
            	CASE
                WHEN ('$tipoUsuario' = 3) THEN 
                a.status IN(1, 2, 4, 3)
                WHEN ('$tipoUsuario' = 2) THEN 
                a.status IN(1, 2)
                END
            )";
          

        if (!empty($params) && is_array($params)) {
            if(isset($params['base']) && is_array($params['base'])) {
                $baseFilter = "(" . implode(',', $params['base']) . ")";
                $strSql = "$strSql AND a.base IN $baseFilter";
            }
        }

        if (!empty($id_usuario)) {
            $strSql .= " AND a.id_usuario = $id_usuario";
        }

        $sql = $this->db->query($strSql);
        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return array_map(
            function ($e) {
                return [
                    'diferenca'   => $e['diferenca'],
                    'nome'         => $e['nome'],
                    'placa'        => $e['placa'],
                    'tipo'         => $e['tipo'],
                    'rg'           => $e['rg'],
                    'cpf'          => $e['cpf'],
                    'nascimento'   => $e['nascimento'],
                    'status'       => $e['status'],
                    'pai'          => $e['pai'],
                    'mae'          => $e['mae'],
                    'dtfinal'      => $e['dtfinal'],
                    'dtinicial'    => $e['dtinicial'],
                    'id'           => $e['id'],
                    'id_usuario'   => $e['id_usuario'],
                    'id_operador'  => $e['id_operador'],
                    'situacaonova' => $e['situacaonova'],
                    'base'         => $e['base'],
                    'name'         => $e['name'],
                ];
            },
            $data);
    }

    public function addPessoa($base, $txtrgpm, $telefone, $localocorrencia, $tpconsulta, $motivo, $txtnome, $txtrg, $txtcpf, $txtdtnasc, $txtmae, $txtpai, $txtobs, $id_operador)
    {
        date_default_timezone_set('America/Fortaleza');
        $date = date('Y-m-d H:i:s');
   
        $sql = $this->db->prepare("INSERT INTO sarque 
		SET nome = :nome, rg = :rg, rgpm =:rgpm, cpf = :cpf, nascimento = :nascimento, telefone=:telefone,endereco=:endereco,		
		base = :base, status = 1, dtinicial = :dt, motivo = :motivo, obs = :obs, mae = :mae, pai = :pai, tipo = :tipo, 
		id_usuario =:id_usuario");
        $sql->bindValue(":nome", $txtnome);
		$sql->bindValue(":rg", $txtrg);
		$sql->bindValue(":rgpm", $txtrgpm);
        $sql->bindValue(":cpf", $txtcpf);
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":endereco", $localocorrencia);
        $sql->bindValue(":nascimento", $txtdtnasc);
        $sql->bindValue(":base", $base);
        $sql->bindValue(":mae", $txtmae);
        $sql->bindValue(":pai", $txtpai);
        $sql->bindValue(":obs", $txtobs);
        $sql->bindValue(":tipo", $tpconsulta);
        $sql->bindValue(":motivo", $motivo);
        $sql->bindValue(":id_usuario", $id_operador);
        $sql->bindValue(":dt", $date);

        $sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		}
		return false;
    }    
	public function addVeiculo($base, $txtrgpm, $telefone, $localocorrencia, $txtplaca, $tpconsulta, $txtobs, $id_operador)
    {
        date_default_timezone_set('America/Fortaleza');
        $date = date('Y-m-d H:i:s');
   
        $sql = $this->db->prepare("INSERT INTO sarque 
		SET rgpm =:rgpm, telefone=:telefone, endereco=:endereco, placa =:placa,		
		base = :base, status = 1, dtinicial = :dt, obs = :obs, tipo = :tipo, id_usuario =:id_operador");
		$sql->bindValue(":rgpm", $txtrgpm);
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":endereco", $localocorrencia);
        $sql->bindValue(":base", $base);
        $sql->bindValue(":obs", $txtobs);
        $sql->bindValue(":tipo", $tpconsulta);
        $sql->bindValue(":placa", $txtplaca);
        $sql->bindValue(":id_operador", $id_operador);
        $sql->bindValue(":dt", $date);

        $sql->execute();
    }
	
	public function atender($id, $id_usuario){
        date_default_timezone_set('America/Fortaleza');
        $date = date('Y-m-d H:i:s');
		$data = [];
        
		$sql1 = $this->db->prepare("SELECT id, id_operador FROM sarque WHERE id = :id");
        $sql1->bindValue(":id", $id);
        $sql1->execute();

		if($sql1->rowCount() > 0) {
		$data = $sql1->fetch();

		if($data['id_operador'] == 0){
	    $sql = $this->db->prepare("UPDATE sarque SET status = 2, dtinicial = :dt, id_operador =:id_usuario WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->bindValue(":dt", $date);
        $sql->execute();
			return true;
			}	
		return false;	
		}
			
    }
    
	public function conduzir_update($id, $txtro, $txtcondutor, $txtrgtestmunha, $data, $hora, $datad, $horad, $delito, $status, $txtdinamica){
	    $sql = $this->db->prepare("UPDATE sarque SET 
        status =:status, 
        data_conduzir =:data_conduzir, 
        hora_conduzir =:hora_conduzir,        
        dt_saidadp =:data_delegacia, 
        hr_saidadp =:hora_delegacia,
        rg_condutor =:rg_condutor, 	
        numero_ro =:numero_ro, 
        testemunha =:testemunha,
        dinamica = :dinamica,
        delito =:delito
        WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":numero_ro", $txtro);
        $sql->bindValue(":rg_condutor", $txtcondutor);
        $sql->bindValue(":testemunha", $txtrgtestmunha);
        $sql->bindValue(":delito", $delito);
        $sql->bindValue(":status", $status);
        $sql->bindValue(":data_conduzir", $data);
        $sql->bindValue(":hora_conduzir", $hora);    
        $sql->bindValue(":data_delegacia", $datad);
        $sql->bindValue(":hora_delegacia", $horad);
        $sql->bindValue(":dinamica", $txtdinamica);
        $sql->execute();	
	}

    // public function veic($placa, $base, $id_operador)
	// {
    //     $sql = $this->db->prepare("INSERT INTO sarque SET placa = :placa, dtinicial = now(), base = :base, status = 1, 
	// 								id_operador =:id_operador, nome = 'VEICULO PADRAO', tipo = 2 ");
    //     $sql->bindValue(":placa", $placa);
    //     $sql->bindValue(":base", $base);
    //     $sql->bindValue(":id_operador", $id_operador);
    //     $sql->execute();		
	// }
	
    public function getInfo($id)
    {
        $data = array();

        $sql = $this->db->prepare("SELECT a.id, a.nome, a.resposta, a.rg, a.cpf, a.base, a.placa, a.telefone,
         a.nascimento, a.pai, a.mae, a.situacao, a.id_operador, a.obs, a.status, b.name, a.resposta_usuario, a.caminhofoto, a.id_usuario
        FROM sarque a  LEFT JOIN usuario b ON a.id_usuario = b.id WHERE a.id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetch();
        }

        return $data;
    }

    public function getPesquisador($id)
    {

        $data = array();

        $sql = $this->db->prepare("SELECT * FROM sarque WHERE id = :id");
		$sql->bindValue(":id", $id);
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetch();
        }
         $sql1 = $this->db->prepare("SELECT * FROM usuario WHERE id = :id1");
         $sql1->bindValue(":id1", $data['id_usuario']);
         $sql1->execute();
     
         if (!empty($sql1)) {
            $entries = array();            
            while($data=$sql1->fetch())
            {
                $entries[] = $data;
            }
            
        }
        return $entries;

    }
	    
	public function getAnexo($id)
    {

        $data = array();

        $sql = $this->db->prepare("SELECT * FROM anexo WHERE id_sarque = :id1");
        $sql->bindValue(":id1", $id);
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }
        return $data;
    }
	
    public function edit($id, $situacao, $status, $check, $obs, $txtnome, $txtrg, $txtcpf, $txtplaca, $txtpai, $txtmae, $txttelefonepm, $txtdatanascimento)
    {
        date_default_timezone_set('America/Fortaleza');
        $date = date('Y-m-d H:i:s');

        $sql = $this->db->prepare("UPDATE sarque SET situacao = :situacao, resposta = :resposta, 
        nome =:nome, rg =:rg, cpf = :cpf, placa =:placa, mae =:mae, pai=:pai, telefonepm =:telefonepm, nascimento =:nascimento,
        status = :status, dtfinal = :dt, 
        baseconsultas = :check WHERE id = :id");
        $sql->bindValue(":id", $id);
		$sql->bindValue(":situacao", $situacao);
        $sql->bindValue(":resposta", $obs);
        $sql->bindValue(":status", $status);
        $sql->bindValue(":check", $check);
        $sql->bindValue(":nome", $txtnome);
        $sql->bindValue(":rg", $txtrg);
        $sql->bindValue(":cpf", $txtrg);
        $sql->bindValue(":pai", $txtpai);
        $sql->bindValue(":mae", $txtmae);
        $sql->bindValue(":telefonepm", $txttelefonepm);
        $sql->bindValue(":placa", $txtplaca);
        $sql->bindValue(":nascimento", $txtdatanascimento);
        $sql->bindValue(":dt", $date);
        $sql->execute();
    }

    public function delete($id)
    {
        $sql = $this->db->prepare("DELETE FROM sarque WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }    
    public function fechar($id, $txtresposta_usuario)
    {
        $sql = $this->db->prepare("UPDATE sarque set status = 5, resposta_usuario =:resposta_usuario WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":resposta_usuario", $txtresposta_usuario);
        $sql->execute();
    }

    public function get_image(){
        $type=explode(".",$_FILES['image']['name']);
        $type=$type[count($type)-1];
        $url="uploads/".uniqid(rand()).".".$type;
    
        if(in_array($type,array('jpeg','jpg','bmp','png'))){
            if(is_uploaded_file($_FILES['image']['tmp_name'])){
                if(move_uploaded_file($_FILES['image']['tmp_name'], $url)){
                    $sql = $this->db->prepare("SELECT MAX(id) as id FROM sarque");
                    $sql->execute();
                    if ($sql->rowCount() > 0) {
                        $data = $sql->fetch();
                    }
                    $sql1 = $this->db->prepare("UPDATE sarque set caminhofoto =:caminhofoto WHERE id = :id");
                    $sql1->bindValue(":id", $data['id']);
                    $sql1->bindValue(":caminhofoto", $url);
                    $sql1->execute();
                }
            }
        }
        else{
            return "extensão nao permitida";
        }
    } 
	
	public function get_files($id){
		   
	$Destino = "uploads/";
	$Anexo = $_FILES["anexo"];
	$Conta = 0;

	for($i = 0; $i < sizeof($Anexo); $i++){
	$Nome = $Anexo["name"][$i];
	$Tamanho = $Anexo["size"][$i];
	$Tipo = $Anexo["type"][$i];
	$Tmpname = $Anexo["tmp_name"][$i];
	$ext_validas = array("pdf", "doc", "docx", "pps", "ppt", "cdr", "jpeg", "jpeg", "png", "gif", "bmp");
	
	// Verifica se tem arquivo enviado
	if($Tamanho > 0 && strlen($Nome) > 1){
		if(preg_match($ext_validas, $Tipo) == false){
			$type = explode(".",$Nome);
			$type = $type[count($type)-1];
			$Caminho = $Destino .uniqid(rand()).".".$type;
				if(move_uploaded_file($Tmpname, $Caminho)){
					$Conta++;
					$sql = $this->db->prepare("INSERT INTO anexo SET caminho =:caminho, id_sarque = :id, nome =:nome");
                    $sql->bindValue(":id", $id);
                    $sql->bindValue(":caminho", $Caminho);
                    $sql->bindValue(":nome", $Nome);
                    $sql->execute();
					}else{
						echo "Não foi possível enviar a arquivos #" . ($i+1) . "<br/>";
					}
				}
			}
		}
	}
}	