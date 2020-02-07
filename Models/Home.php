<?php

namespace Models;

use \Core\Model;

class Home extends Model
{

    public function getListSarcOpen($id_usuario)
    {
        $data = 0;
        $sql = $this->db->prepare("SELECT id, id_usuario FROM sarque WHERE id_usuario = :id AND status <> 3");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->rowCount();
        }
        return $data;
    }
    public function getListSarcClose($id_usuario)
    {
        $data = 0;
        $sql = $this->db->prepare("SELECT id FROM sarque WHERE id_usuario = :id AND status = 3 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->rowCount();
        }

        return $data;
    }
    public function getListCar($id_usuario)
    {
        $data = 0;
        $sql = $this->db->prepare("SELECT id FROM sarque WHERE id_usuario = :id AND tipo = 2 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->rowCount();
        }

        return $data;
    }
    public function getListUser($id_usuario)
    {
        $data = 0;
        $sql = $this->db->prepare("SELECT id FROM sarque WHERE id_usuario = :id AND tipo = 1 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->rowCount();
        }

        return $data;
    } 
    
    public function getListSarcOpenOP($id_usuario)
    {
        $data = 0;
        $sql = $this->db->prepare("SELECT id, id_usuario FROM sarque WHERE id_operador = :id AND status <> 3");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->rowCount();
        }
        return $data;
    }
    public function getListSarcCloseOP($id_usuario)
    {
        $data = 0;
        $sql = $this->db->prepare("SELECT id FROM sarque WHERE id_operador = :id AND status = 3 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->rowCount();
        }

        return $data;
    }
    public function getListCarOP($id_usuario)
    {
        $data = 0;
        $sql = $this->db->prepare("SELECT id FROM sarque WHERE id_operador = :id AND tipo = 2 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->rowCount();
        }

        return $data;
    }
    public function getListUserOP($id_usuario)
    {
        $data = 0;
        $sql = $this->db->prepare("SELECT id FROM sarque WHERE id_operador = :id AND tipo = 1 ");
        $sql->bindValue(":id", $id_usuario);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->rowCount();
        }

        return $data;
    }





}