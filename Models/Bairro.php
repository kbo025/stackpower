<?php

namespace Models;

use \Core\Model;

class Bairro extends Model
{
    private $nome_tabela = "bairros";

    public function getList()
    {
        $data = array();
        $tabela = $this->nome_tabela;
        $sql = $this->db->query("SELECT * FROM $tabela");

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return $data;
    }

    public function findOne($cod)
    {
        $tabela = $this->nome_tabela;
        $sql = "SELECT * FROM $tabela WHERE cod_bairro = $cod";
        $sql = $this->db->query("SELECT * FROM $tabela");
        if (!empty($sql)) {
            $data = $sql->fetch();
        }

        return $data;
    }
}