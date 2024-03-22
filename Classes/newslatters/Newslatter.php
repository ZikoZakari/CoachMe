<?php 

namespace Classes\Newsletter;

use Classes\Database\Db;
use Classes\Utils\Helper;
use PDO;

class Newslatter{

    public function add($email,$ip)
    {
        $sql = "INSERT INTO newslatter(email,ip) VALUES (?,?)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$email,$ip]);
    }

    public function get()
    {
        $sql = "SELECT * FROM newslatter";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
}