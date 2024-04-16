<?php 

namespace Classes\Contacts;

use Classes\Database\Db;

class Contact{
    public function sendMessage($fullname,$email,$phone,$subject,$message){
        $sql = "INSERT INTO contact (name,email,phone,subject,message) VALUE(?,?,?,?,?)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$fullname,$email,$phone,$subject,$message]);
    }
}