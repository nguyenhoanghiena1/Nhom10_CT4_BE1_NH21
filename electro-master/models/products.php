<?php
class Products extends Db {


    public function getProductsByManu($manu_id)//lấy sản phẩm theo hãng sản xuất
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_ID = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsByProtype($protype_id)//lấy sản phẩm theo hãng loại sản phẩm
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_ID` = ?");
        $sql->bind_param("i", $protype_id);
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

    public function getProductsByID($id)  //lấy ra sản pham dựa trên id
     {
        $sql = self::$connection->prepare("SELECT * FROM `products`,protypes,manufactures WHERE products.type_ID = protypes.type_ID && manufactures.manu_ID = products.manu_ID && products.ID= ?"); 
        $sql->bind_param('i',$id);
        return $this->select($sql);
    }



    public function chiaProductTK($tim)
    {
        return "SELECT * FROM products WHERE description LIKE '%$tim%' ORDER BY ID DESC LIMIT ? , 4 ";
    }

    public function chiaProductMenu($tim)
    {
        return "SELECT * FROM products, manufactures WHERE products.manu_ID = manufactures.manu_ID AND manu_name LIKE '%$tim%' ORDER BY ID LIMIT ? ,4 ";
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
        $sql = self::$connection->prepare("SELECT * FROM `products`,manufactures,protypes WHERE products.manu_ID = manufactures.manu_ID and products.type_ID= protypes.type_ID and description LIKE ?");
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
        INTO `products`( `name`, `price`, `image`, `description`, `manu_ID`, `type_ID`) 
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
    public function get5ProductPhanTrang( $page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `products`,manufactures,protypes WHERE products.manu_ID = manufactures.manu_ID AND protypes.type_ID = products.type_ID ANd ID LIMIT ?,?");
        $sql->bind_param("ii", $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get3ProductByManuId($manu_ID, $page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `products`,manufactures,protypes WHERE products.manu_ID = manufactures.manu_ID AND protypes.type_ID = products.type_ID ANd `products`.`manu_ID = ? LIMIT ?,?");
        $sql->bind_param("iii",$manu_ID, $firstLink, $perPage);
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
            $link = $link . "<li><a href='$url?page=$j'> $j </a></li>";
        }
        return $link;
    }
}