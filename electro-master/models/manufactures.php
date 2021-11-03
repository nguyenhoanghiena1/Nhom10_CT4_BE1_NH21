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

    public function chiaManu()
    {
        return "SELECT * FROM manufactures ORDER BY manu_ID DESC LIMIT ? , 4 ";
    }

    public function chiaTrang($page, $string) //chia trang
    {
        $page = $page * 4 - 4;
        $sql = self::$connection->prepare($string);
        $sql->bind_param('i', $page);

        return $this->select($sql);
    }

    public function nutChuyenTrang($page, $mang)//hien thi nut chuyen trang
    { 
        $soTrang = ceil(count($mang) / PAGE);

        ?>
        <form action="" method="get">
        <a href="?page=1"><<</a> <!--den trang dau tien-->

        <!--tro lai 1 trang-->
        <?php if($page == 1){ ?>
            <span><</span>
        <?php } else { ?>
            <a href="?page=<?php echo ($page - 1); ?>"><</a>
        <?php } ?>

        <!--Nhap trang muon den-->
        <input type="submit/text" name="page" value="<?php echo $page ?>">

        <!--tien them 1 trang-->
        <?php if($page == $soTrang){ ?>
            <span>></span>
        <?php } else { ?>
            <a href="?page=<?php echo ($page + 1);?>">></a>
        <?php } ?>
        
        <!--ve cuoi danh sach-->
        <a href="?page=<?php echo $soTrang;?>">>></a>
        </form>
    <?php }

    public function capNhat($name, $image, $id)
    {
        $sql = self::$connection->prepare(" UPDATE `manufactures` SET `manu_name`= ?,`manu_img`= ? WHERE manu_ID = ? ");
        $sql->bind_param('ssi',$name, $image, $id);
        return $sql->execute();
    }

    
}