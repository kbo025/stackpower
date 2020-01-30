<?php

namespace Models;

use \Core\Model;

class Usuario extends Model
{

    public function getList()
    {
        $data = array();
        $sql = $this->db->query("select * from users");

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return $data;
    }
	


    public function add($nome, $email, $senha, $tipo, $base)
    {
        $sql = $this->db->prepare("INSERT INTO users SET name = :nome, email = :email, password = :senha, 
		tipo_usuario = :tipo, id_base = :base");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":tipo", $tipo);
        $sql->bindValue(":base", $base);
        $sql->execute();
		
		if($sql->rowCount() > 0) {
			return true;
		}
		return false;
    }

    public function getInfo($id)
    {
        $data = array();

        $sql = $this->db->prepare("SELECT * from users where id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetch();
        }

        return $data;
    }
	
    public function edit($id, $nome, $email, $senha, $tipo)
    {
        $sql = $this->db->prepare("UPDATE users SET name = :nome, email = :email, password =:senha, tipo_usuario = :tipo WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();
    }

    public function delete($id)
    {
        $sql = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
	


}