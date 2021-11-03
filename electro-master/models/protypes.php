<?php
class Protypes extends Db {
    public function getAllProtype()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        return $this->select($sql);
    }

    public function getProtypeByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes` WHERE `type_ID` = ?");
        $sql->bind_param("i",$id);
        return $this->select($sql);
    }

    public function deleteProtype($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_ID` = ? ");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }
    public function addProtype($name, $image)//them manufacture
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_name`, `type_img`)
        VALUES (?, ?)");
        $sql->bind_param('ss',$name,$image);
        return $sql->execute();
    }

    public function capNhat($name, $image, $id)
    {
        $sql = self::$connection->prepare(" UPDATE `protypes` SET `type_name`= ?,`type_img`= ? WHERE type_ID = ? ");
        $sql->bind_param('ssi',$name, $image, $id);
        return $sql->execute();
    }
}