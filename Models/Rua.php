<?php

namespace Models;

use \Core\Model;

class Rua extends Model
{
    private $nome_tabela = "ruas";

    public function getList($cod_bairro = null)
    {
        $where = '';
        if (isset($cod_bairro)) {
            $where = " WHERE cod_bairro = $cod_bairro";
        }
        
        $data = array();
        $tabela = $this->nome_tabela;
        $sql = $this->db->query("SELECT * FROM $tabela $where");

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        $data = array_map(
            function($e) {
                return [
                    'cod_rua' => $e['cod_rua'],
                    'nome' => $e['nome'],
                ];
            },
            $data
        );

        return $data;
    }

    public function findOne($cod)
    {
        $tabela = $this->nome_tabela;
        $sql = "SELECT * FROM $tabela WHERE cod_rua = $cod";
        $sql = $this->db->query("SELECT * FROM $tabela");
        if (!empty($sql)) {
            $data = $sql->fetch();
        }

        return $data;
    }
}