<?php 

namespace Classes\Users;

use Classes\Database\Db;
use PDO;

class User{

    public function login($username,$password)
    {
        $sql = "SELECT id,email,username FROM users WHERE email = ? AND password = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$username,$password]);

        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();

        return [$data,$count];
    }

}