<?php 

namespace Classes\Users;

use Classes\Database\Db;
use Classes\Utils\Helper;
use PDO;

class User{

    public function login($username,$password)
    {
        // forging query
        $sql = "SELECT id,email,username,role FROM users WHERE email = ? AND password = ?";
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

    public function logout(){
        session_start();
        session_destroy();
        header('Location: login.php');
    }

    public function register($fname,$lname,$address,$city,$gender,$email,$username,$password,$role)
    {
        $sql = "INSERT INTO users(fname,lname,address,city,gender,role,email,username,password) VALUES (?,?,?,?,?,?,?,?,?)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $password = Helper::md5Hash($password);
        $stmt->execute([$fname,$lname,$address,$city,$gender,$role,$email,$username,$password]);
    }

    public function add_details($id_user)
    {
        $sql = "INSERT INTO details(id_user) VALUES (?)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$id_user]);
    }

    public function last_user(){
        $sql = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_OBJ);
        return $rows;
    }

    public function details($prix,$detail,$id_user)
    {
        $sql = "UPDATE details SET prix = ?, detail = ? WHERE id_user = ? ";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$prix,$detail,$id_user]);
    }

    public function get_user_info($id){
        $sql = "SELECT * FROM users U, details D WHERE U.id = D.id_user AND U.id = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetch(PDO::FETCH_OBJ);
        return $rows;
    }

    public function get_user_pic($id){
        $sql = "SELECT pictur FROM users WHERE id = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetch(PDO::FETCH_OBJ);
        return $rows;
    }

    public function updateUser($fname, $lname, $about, $adress, $city, $phone, $job, $id){
        $sql = "UPDATE users SET fname = ?, lname = ?, about = ?, address = ?, city = ?, phone = ?, job = ? WHERE id = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$fname, $lname, $about, $adress, $city, $phone, $job, $id]);
    }

    public function updateFile($file, $id, $type){
        if ($type == 'img'){
            $sql = "UPDATE users SET pictur = ? WHERE id = ? ";
        }
        if ($type == 'cv'){
            $sql = "UPDATE users SET cv = ? WHERE id = ? ";
        }
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$file, $id]);
    }


}