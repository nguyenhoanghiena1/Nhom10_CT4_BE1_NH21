<?php
class Products extends Db {
    public function getProductsByManu($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllProducts() { //lay tat ca san pham
        $sql = self::$connection->prepare("SELECT * FROM products");
        return $this->select($sql);
    }
    public function getNewProducts() { //lay ra 10 san pham moi nhat
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE 1 ORDER BY ID DESC LIMIT 0,10");
        return $this->select($sql);
    }
    public function getSellingProducts() { //lay ra 10 san pham bán chạy nhất
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE feature = 1 ");
        return $this->select($sql);
    }
    public function chiaTrang($page, $string) //chia trang
    {
        $page = $page * 4 - 4;
        $sql = self::$connection->prepare($string);
        $sql->bind_param('i', $page);

        return $this->select($sql);
    }

    public function getProductsByID($id) {
        //lấy ra sản pham dựa trên id
        $sql = self::$connection->prepare("SELECT * FROM `products`,protypes,manufactures WHERE products.type_ID = protypes.type_ID && manufactures.manu_ID = products.manu_ID && products.ID= ?"); 
        $sql->bind_param('i',$id);
        return $this->select($sql);
    }

    public function chiaProduct()
    {
        return "SELECT * FROM products ORDER BY ID DESC LIMIT ? , 4 ";
    }

    public function chiaProductTK($tim)
    {
        return "SELECT * FROM products WHERE description LIKE '%$tim%' ORDER BY ID DESC LIMIT ? , 4 ";
    }

    public function chiaProductsAdmin() { //lay tat ca san pham
        return "SELECT * FROM products, manufactures, protypes WHERE products.manu_ID = manufactures.manu_ID AND protypes.type_ID = products.type_ID ORDER BY ID DESC LIMIT ? , 4";
    }

    public function chiaProductMenu($tim)
    {
        return "SELECT * FROM products, manufactures WHERE products.manu_ID = manufactures.manu_ID AND manu_name LIKE '%$tim%' ORDER BY ID LIMIT ? ,4 ";
    }

    public function nutChuyenTrang($page, $mang, $bool, $tim)//hien thi nut chuyen trang
    { 
        $soTrang = $this->countSo($mang);
        ?>
        <form action="" method="get">
        <a href="?page=1<?php if($bool == 't'){ echo "&timkiem=" .  $tim; } ?>"><<</a> <!--den trang dau tien-->

        <!--tro lai 1 trang-->
        <?php if($page == 1){ ?>
            <span><</span>
        <?php } else { ?>
            <a href="?page=<?php echo ($page - 1); if($bool == 't'){ echo "&timkiem=$tim"; } ?>"><</a>
        <?php } ?>

        <!--Nhap trang muon den-->
        <input type="submit/text" name="page" value="<?php echo $page ?>">

        <!--tien them 1 trang-->
        <?php if($page == $soTrang){ ?>
            <span>></span>
        <?php } else { ?>
            <a href="?page=<?php echo ($page + 1); if($bool == 't'){ echo "&timkiem=" .  $tim; } ?>">></a>
        <?php } ?>
        
        <!--ve cuoi danh sach-->
        <a href="?page=<?php echo $soTrang; if($bool == 't'){ echo "&timkiem=" .  $tim; }?>">>></a>
        </form>
    <?php }

    public function countSo($mang) //lay so san pham
    {
        $all = count($mang); //lay so san pham
        return $soTrang = ceil($all / PAGE); //tinh so trang
    }

    public function timkiem($tim) { //tim kiem
        $i = '%' . $tim . '%';
        $sql = self::$connection->prepare("SELECT *
        FROM products
        WHERE description LIKE ?
        ");
        $sql->bind_param('s',$i);
        return $this->select($sql);
    }

    public function timkiem1($tim) { //tim kiem
        $i = '%' . $tim . '%';
        $sql = self::$connection->prepare("SELECT *
        FROM products, manufactures
        WHERE products.manu_ID = manufactures.manu_ID
        AND manu_name LIKE ?");
        $sql->bind_param('s',$i);
        return $this->select($sql);
    }

    public function getAllProductsAdmin() { //lay tat ca san pham
        $sql = self::$connection->prepare("SELECT * FROM products, manufactures WHERE products.manu_ID = manufactures.manu_ID");
        return $this->select($sql);
    }

    public function deleteProduct($id) {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `ID` = ? ");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }
    public function addProduct($name,$price,$image,$des,$manu_ID,$type_ID)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(products.name, products.price, products.image, products.description, products.manu_ID, products.type_ID) 
        VALUES ( ? , ? , ? , ? , ? , ? )");
        $sql->bind_param('sissii',$name,$price,$image,$des,$manu_ID,$type_ID);
        return $sql->execute();
    }

    public function capNhat($name,$price,$image,$des,$manu_ID,$type_ID, $id)
    {
        $sql = self::$connection->prepare(" UPDATE products SET products.name = ?, products.price = ?, products.image = ?, products.description = ?, products.manu_ID = ?, products.type_ID = ? WHERE ID = ? ");
        $sql->bind_param('sissiii',$name,$price,$image,$des,$manu_ID,$type_ID, $id);
        return $sql->execute();
    }
    public function get3ProductsByManu($manu_id, $page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products
        WHERE manu_id = ?  LIMIT ?,?");
        $sql->bind_param("iii", $manu_id, $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function paginate($url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<li><a href='$url?page=$j'> $j </a><li>";
        }
        return $link;
    }
}