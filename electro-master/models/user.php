<?php
class User extends Db {

    public function dangKy($user, $pass, $email)
    {
       
            $passhash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = self::$connection->prepare("INSERT INTO `user`(`username`, `password`, `email`) VALUES ( ? , ?, ?)");
            $sql->bind_param('sss', $user, $passhash, $email);
            return $sql->execute();
            
      
    }
    public function dangNhap($pass, $email){
        $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `email` = ?");
        $sql->bind_param('s',$email);
        $a = $this->select($sql);
        if(empty($a) == false)
        {
            if(password_verify($pass, $a[0]['password']) == true && $a[0]['email'] == $email)
            {
                $_SESSION['password'] =  $a[0]['password'];
                $_SESSION['email'] = $a[0]['email'];
                $_SESSION['cart']['tien'] = 0;
                $_SESSION['cart']['soluong'] = 0;
                $_SESSION['cart']['hang'] = array();
                $_SESSION['login'] = "1";
                if($a[0]['quyen'] == "113")
                {
                    $_SESSION['quyen'] = "113";
                    header("location: ./mobileadmin/index.php");
                }else{
                    header("location: index.php");
                }
            }
        }
    }

    public function kiemTra($email)
    {

        $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `email` = ?");
        $sql->bind_param('s', $email);
        $a = $this->select($sql);

        if ($_SESSION['password'] ==  $a[0]['password'] && $_SESSION['email'] == $a[0]['email']) {
            if ($_SESSION['quyen'] != "113") {
                header("location: ../../exe6_new_new_moi/index.php");
            }
        }
    }

    public function dangXuat()
    {
        session_unset();
        header('location: login.php');
    }
}