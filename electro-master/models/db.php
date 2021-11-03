<?php
class Db
{
    public static $connection = NULL;
    /**
     * @return connection object
     */
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            self::$connection->set_charset('utf8');
        }
        return self::$connection;
    }
    public function __destruct()
    {
        //self::$connection->close();
    }
    public function select($sql)
    {
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
