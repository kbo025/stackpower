<?php

namespace Models;

use \Core\Model;

class Base extends Model
{

    public function getList()
    {
        $data = array();
        $sql = $this->db->query("SELECT * FROM base");

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return $data;
    }

    public function add($name)
    {
        $sql = $this->db->prepare("INSERT INTO base SET base = :base");
        $sql->bindValue(":base", $name);
        $sql->execute();
    }

    public function getInfo($id)
    {
        $data = array();

        $sql = $this->db->prepare("SELECT * FROM base WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetch();
        }

        return $data;
    }

    public function edit($id, $base)
    {
        $sql = $this->db->prepare("UPDATE base SET base = :base WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":base", $base);
        $sql->execute();
    }

    public function delete($id)
    {
        $sql = $this->db->prepare("DELETE FROM base WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}