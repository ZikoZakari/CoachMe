<?php 

namespace Classes\Contacts;

use Classes\Database\Db;
use PDO;

class Contact{
    public function sendMessage($fullname,$email,$phone,$subject,$message){
        $sql = "INSERT INTO contact (name,email,phone,subject,message) VALUE(?,?,?,?,?)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$fullname,$email,$phone,$subject,$message]);
    }

    public function getAllMessages(){
        $sql = "SELECT * FROM contact";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function deleteContactMessag($id){
        $sql = "DELETE FROM contact WHERE id = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
    }
}