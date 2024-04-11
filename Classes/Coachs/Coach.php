<?php 

namespace Classes\Coachs;

use Classes\Database\Db;
use Classes\Utils\Helper;
use PDO;

class Coach{
    public function coaches(){
        $sql = "SELECT * FROM users WHERE role != 'Admin' AND role != 'Client'";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
}