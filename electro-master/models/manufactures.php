<?php 
class Manufactures extends Db
{
    public function getAllManu()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        return $this->select($sql);
    }

    public function getManuByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_ID = ?");
        $sql->bind_param("i",$id);
        return $this->select($sql);
    }

    public function addManufacture($name, $image)//them manufacture
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_name`, `manu_img`)
        VALUES (?, ?)");
        $sql->bind_param('ss',$name,$image);
        return $sql->execute();
    }

    public function deleteManu($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_ID` = ? ");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }


    public function capNhat($name, $image, $id)
    {
        $sql = self::$connection->prepare(" UPDATE `manufactures` SET `manu_name`= ?,`manu_img`= ? WHERE manu_ID = ? ");
        $sql->bind_param('ssi',$name, $image, $id);
        return $sql->execute();
    }
    

    
}