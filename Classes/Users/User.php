<?php 

namespace Classes\Users;

use Classes\Database\Db;
use Classes\Utils\Helper;
use PDO;

class User{

    public function login($username,$password)
    {
        // forging query
        $sql = "SELECT id,email,username FROM users WHERE email = ? AND password = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        // hashing the clear password
        $password = Helper::md5Hash($password);
        $stmt->execute([$username,$password]);

        // getting the values selected and the rows count
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();

        return [$data,$count];
    }

    public function register($fname,$lname,$address,$city,$gender,$email,$username,$password,$role)
    {
        $sql = "INSERT INTO users(fname,lname,address,city,gender,role,email,username,password) VALUES (?,?,?,?,?,?,?,?,?)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $password = Helper::md5Hash($password);
        $stmt->execute([$fname,$lname,$address,$city,$gender,$role,$email,$username,$password]);
    }

}