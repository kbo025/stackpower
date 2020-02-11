<?php

namespace Models;

use \Core\Model;

class Home extends Model
{

    public function getListSarcOpen($id_usuario)
    {

        $sql = $this->db->prepare("SELECT count(*) FROM sarque WHERE id_usuario = :id AND status <> 3");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        return $sql->fetchColumn();
    }

    public function getListSarcClose($id_usuario)
    {
        $sql = $this->db->prepare("SELECT count(*) FROM sarque WHERE id_usuario = :id AND status = 3 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        return $sql->fetchColumn();
    }

    public function getListCar($id_usuario)
    {
        $sql = $this->db->prepare("SELECT count(*) FROM sarque WHERE id_usuario = :id AND tipo = 2 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        return $sql->fetchColumn();
    }

    public function getListUser($id_usuario)
    {
        $sql = $this->db->prepare("SELECT count(*) FROM sarque WHERE id_usuario = :id AND tipo = 1 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        return $sql->fetchColumn();
    } 
    
    public function getListSarcOpenOP($id_usuario)
    {
        $sql = $this->db->prepare("SELECT count(*) FROM sarque WHERE id_operador = :id AND status <> 3");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        return $sql->fetchColumn();
    }

    public function getListSarcCloseOP($id_usuario)
    {
        $sql = $this->db->prepare("SELECT count(*) FROM sarque WHERE id_operador = :id AND status = 3 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        return $sql->fetchColumn();
    }

    public function getListCarOP($id_usuario)
    {
        $sql = $this->db->prepare("SELECT count(*) FROM sarque WHERE id_operador = :id AND tipo = 2 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        return $sql->fetchColumn();
    }

    public function getListUserOP($id_usuario)
    {
        $sql = $this->db->prepare("SELECT count(*) FROM sarque WHERE id_operador = :id AND tipo = 1 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();
        return $sql->fetchColumn();
    }
}
