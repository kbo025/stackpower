<?php

namespace Models;

use \Core\Model;

class Usuario extends Model
{

    public function getList()
    {
        $data = array();
        $sql = $this->db->query("select * from usuario");

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return $data;
    }
	


    public function add($nome, $email, $senha, $tipo)
    {
        $sql = $this->db->prepare("INSERT INTO usuario SET name = :nome, email = :email, password = :senha, 
		tipo_usuario = :tipo");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();
		
		if($sql->rowCount() > 0) {
			return true;
		}
		return false;
    }

    public function verificarEmail($email) {
		
		$sql = $this->db->prepare("SELECT * FROM usuario WHERE email = :email");
		$sql->bindValue(':email', $email);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		}
		return false;
		
	}

    public function getInfo($id)
    {
        $data = array();

        $sql = $this->db->prepare("SELECT * from usuario where id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetch();
        }

        return $data;
    }
	
    public function edit($id, $nome, $email, $senha, $tipo)
    {
        $sql = $this->db->prepare("UPDATE usuario SET name = :nome, email = :email, password =:senha, tipo_usuario = :tipo WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();
    }

    public function delete($id)
    {
        $sql = $this->db->prepare("DELETE FROM usuario WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
	


}