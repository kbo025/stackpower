<?php

namespace Models;

use \Core\Model;

class Sarquear extends Model
{

    public function getList()
    {
        $data = array();
        $sql = $this->db->query("SELECT TIMEDIFF(a.dtfinal, a.dtinicial) as diferenca , a.id, a.id_usuario, a.id_operador,
		case a.situacao when 1 then 'Anotações Criminais'
						when 2 then 'Busca e Apreensão'
						when 3 then 'Dados Inconsistentes'
						when 4 then 'Desaparecidos'
						when 5 then 'Evadido'
						when 6 then 'Mandado'
						when 7 then 'Nada Constatado'
						when 8 then 'Veiculo Roubado'
						when 9 then 'Outros'
         end as situacaonova, a.nome, a.placa, a.tipo, a.rg, a.cpf, c.base, a.nascimento, a.status, a.dtinicial, a.pai, a.mae,
		 a.dtfinal, b.name FROM sarque a LEFT JOIN users b ON a.id_usuario = b.id LEFT JOIN base c ON a.base = c.id where a.status NOT IN(3,5,6,7)");
        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return $data;
    }

    public function addPessoa($base, $txtrgpm, $telefone, $localocorrencia, $tpconsulta, $motivo, $txtnome, $txtrg, $txtcpf, $txtdtnasc, $txtmae, $txtpai, $txtobs, $id_operador)
    {
        $sql = $this->db->prepare("INSERT INTO sarque 
		SET nome = :nome, rg = :rg, rgpm =:rgpm, cpf = :cpf, nascimento = :nascimento, telefone=:telefone,endereco=:endereco,		
		base = :base, status = 1, dtinicial = now(), motivo = :motivo, obs = :obs, mae = :mae, pai = :pai, tipo = :tipo, 
		id_operador =:id_operador");
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
        $sql->bindValue(":id_operador", $id_operador);

        $sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		}
		return false;
    }    
	public function addVeiculo($base, $txtrgpm, $telefone, $localocorrencia, $txtplaca, $tpconsulta, $txtobs, $id_operador)
    {
        $sql = $this->db->prepare("INSERT INTO sarque 
		SET rgpm =:rgpm, telefone=:telefone, endereco=:endereco, placa =:placa,		
		base = :base, status = 1, dtinicial = now(), obs = :obs, tipo = :tipo, id_operador =:id_operador");
		$sql->bindValue(":rgpm", $txtrgpm);
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":endereco", $localocorrencia);
        $sql->bindValue(":base", $base);
        $sql->bindValue(":obs", $txtobs);
        $sql->bindValue(":tipo", $tpconsulta);
        $sql->bindValue(":placa", $txtplaca);
        $sql->bindValue(":id_operador", $id_operador);

        $sql->execute();
    }
	
	public function atender($id, $id_usuario){
	    $sql = $this->db->prepare("UPDATE sarque SET status = 2, dtinicial = now(), id_usuario =:id_usuario WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		}
		return false;		
    }
    
	public function conduzir_update($id, $txtro, $txtcondutor, $txtrgtestmunha, $data, $hora, $delito, $status, $txtdinamica){
	    $sql = $this->db->prepare("UPDATE sarque SET 
        status =:status, 
        data_conduzir =:data_conduzir, 
        hora_conduzir =:hora_conduzir,
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

        $sql = $this->db->prepare("SELECT a.id, a.nome, a.rg, a.cpf, a.base, a.placa, a.telefonepm, a.nascimento, a.pai, a.mae, a.situacao, a.obs, a.status, b.name FROM sarque a  LEFT JOIN users b ON a.id_usuario = b.id WHERE a.id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetch();
        }

        return $data;
    }

    public function getPesquisador()
    {
        $data = array();

        $sql = $this->db->prepare("SELECT * FROM users WHERE tipo_usuario = 2");
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return $data;
    }
	
    public function edit($id, $situacao, $status, $check, $obs,  $txtnome, $txtrg, $txtcpf, $txtplaca)
    {
        $sql = $this->db->prepare("UPDATE sarque SET situacao = :situacao, resposta = :resposta, 
        nome =:nome, rg =:rg, cpf = :cpf, placa =:placa,
        status = :status, dtfinal = now(), 
        baseconsultas = :check WHERE id = :id");
        $sql->bindValue(":id", $id);
		$sql->bindValue(":situacao", $situacao);
        $sql->bindValue(":resposta", $obs);
        $sql->bindValue(":status", $status);
        $sql->bindValue(":check", $check);
        $sql->bindValue(":nome", $txtnome);
        $sql->bindValue(":rg", $txtrg);
        $sql->bindValue(":cpf", $txtrg);
        $sql->bindValue(":placa", $txtplaca);
        $sql->execute();
    }

    public function delete($id)
    {
        $sql = $this->db->prepare("DELETE FROM sarque WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }    
    public function fechar($id)
    {
        $sql = $this->db->prepare("UPDATE sarque set status = 5 WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    // public function server(){
    //     # define momento em que começou a roda o Polling
    //         $start = time();
    //         # Defini tempo maximo da conexão
    //         $timeRequest = 55;

    //         #verifica se ouve post
    //         if (isset( $_POST['entry'] )) {
    //             # previne injections e tags invalidas
    //             $entry = trim( $_POST['entry'] );
    //         }else{
    //             # pega hora atual do servidor 
    //             $getTime = $this->db->prepare("SELECT NOW() as now");
    //             # executa query 
    //             $getTime->execute();
    //             # transforma o resultado em objeto
    //             $result = $getTime->fetchObject();
    //             # atribui valor do resultado
    //             $entry = $result->now;
    //         }

    //         # pepara a query para buscar os registro novos
    //         $stmt = $this->db->prepare("SELECT * FROM sarque WHERE timestamp > '$entry'" );

    //         # controle para saber se ouve novo registro
    //         $newData = false;
    //         # array para as novas notificações
    //         $notify = array();

    //         # mantem a conexão aberta até o limite maximo estabelecido em $start
    //         while (!$newData and (time()-$start) < $timeRequest ) {
    //             $stmt->execute();

    //         # caso encontre resultado fecha a conexão
    //         while ($result = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
    //             # atribui valor do resultado
    //             $notify = $result;
    //             # encerra a conexão
    //             $newData = true;
    //         }
    //         # aguarda 1/2 segundo para abrir a conexão
    //         usleep(500000);
    //         }
    //         # pega novamente a hora do servidor
    //         $getTime = $this->db->prepare("SELECT NOW() as now");
    //         # executa query
    //         $getTime->execute();
    //         # transforma resultado em objeto
    //         $result = $getTime->fetchObject();
    //         # atribui valor do resultado
    //         $entry = $result->now;
    //         # converte tudo em um array
    //         # envia dados em formato Json para o front-end 
    //         echo json_encode($notify, JSON_PRETTY_PRINT);
    //         # encerra execução de escript php
    //         exit;
            
    // }

}