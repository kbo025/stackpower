<?php

namespace Models;

use \Core\Model;

class Relatorio extends Model
{

    public function getListAll($dt1 , $dt2, $base, $status)
    {
        $data = array();
        $sql = $this->db->prepare("SELECT TIMEDIFF(a.dtinicial, a.dtfinal) as diferenca , a.id, a.situacao,
		case a.situacao when 1 then 'Anotações Criminais'
						when 2 then 'Busca e Apreensão'
						when 3 then 'Dados Inconsistentes'
						when 4 then 'Desaparecidos'
						when 5 then 'Evadido'
						when 6 then 'Mandado'
						when 7 then 'Veiculo Roubado'
						when 8 then 'Outros'
		end as situacaonova,
		a.nome, a.placa, a.tipo, a.rg, a.cpf, c.base, 
		a.nascimento, a.status, a.dtinicial, a.dtfinal, b.name FROM sarque a 
		LEFT JOIN users b ON a.id_usuario = b.id 
		LEFT JOIN base c ON a.base = c.id 
		where a.dtinicial BETWEEN DATE(:dt1 ) AND DATE(:dt2) 
		and c.id =:base 
		and a.status = :status ");
		$sql->bindValue(":dt1", $dt1);
		$sql->bindValue(":dt2", $dt2);
		$sql->bindValue(":base", $base);
		$sql->bindValue(":status", $status);
        $sql->execute();
		
		if (!empty($sql)) {
            $data = $sql->fetchAll();
        }
        return $data;
	}       
	public function getListDT($dt1 , $dt2, $base)
    {
        $data = array();
        $sql = $this->db->prepare("SELECT TIMEDIFF(a.dtinicial, a.dtfinal) as diferenca , a.id, a.situacao,
		case a.situacao when 1 then 'Anotações Criminais'
						when 2 then 'Busca e Apreensão'
						when 3 then 'Dados Inconsistentes'
						when 4 then 'Desaparecidos'
						when 5 then 'Evadido'
						when 6 then 'Mandado'
						when 7 then 'Veiculo Roubado'
						when 8 then 'Outros'
		end as situacaonova, a.nome, a.placa, a.tipo, a.rg, a.cpf, c.base, 
		a.nascimento, a.status, a.dtinicial, a.dtfinal, b.name FROM sarque a 
		LEFT JOIN users b ON a.id_usuario = b.id 
		LEFT JOIN base c ON a.base = c.id 
		where a.dtinicial BETWEEN DATE(:dt1 ) AND DATE(:dt2) and c.id =:base  ");
		$sql->bindValue(":dt1", $dt1);
		$sql->bindValue(":dt2", $dt2);
		$sql->bindValue(":base", $base);
        $sql->execute();
		
		if (!empty($sql)) {
            $data = $sql->fetchAll();
        }
        return $data;
    }    
	public function getListBase($base)
    {
        $data = array();
        $sql = $this->db->prepare("SELECT TIMEDIFF(a.dtinicial, a.dtfinal) as diferenca , a.id, a.situacao,
		case a.situacao when 1 then 'Anotações Criminais'
						when 2 then 'Busca e Apreensão'
						when 3 then 'Dados Inconsistentes'
						when 4 then 'Desaparecidos'
						when 5 then 'Evadido'
						when 6 then 'Mandado'
						when 7 then 'Veiculo Roubado'
						when 8 then 'Outros'
		end as situacaonova, a.nome, a.placa, a.tipo, a.rg, a.cpf, c.base, 
		a.nascimento, a.status, a.dtinicial, a.dtfinal, b.name 
		FROM sarque a 
		LEFT JOIN users b ON a.id_usuario = b.id 
		LEFT JOIN base c ON a.base = c.id 
		where c.id =:base ");
		$sql->bindValue(":base", $base);
        $sql->execute();
		
		if (!empty($sql)) {
            $data = $sql->fetchAll();
        }
        return $data;
	}
	
	public function getListA()
    {
        $data = array();
        $sql = $this->db->prepare("SELECT TIMEDIFF(a.dtinicial, a.dtfinal) as diferenca , a.id, a.situacao,
		case a.situacao when 1 then 'Anotações Criminais'
						when 2 then 'Busca e Apreensão'
						when 3 then 'Dados Inconsistentes'
						when 4 then 'Desaparecidos'
						when 5 then 'Evadido'
						when 6 then 'Mandado'
						when 7 then 'Veiculo Roubado'
						when 8 then 'Outros'
		end as situacaonova, a.nome, a.placa, a.tipo, a.rg, a.cpf, c.base, 
		a.nascimento, a.status, a.dtinicial, a.dtfinal, b.name 
		FROM sarque a 
		LEFT JOIN users b ON a.id_usuario = b.id 
		LEFT JOIN base c ON a.base = c.id ");
        $sql->execute();
		
		if (!empty($sql)) {
            $data = $sql->fetchAll();
        }
        return $data;
    }
	
}