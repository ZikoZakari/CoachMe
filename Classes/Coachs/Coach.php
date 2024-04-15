<?php 

namespace Classes\Coachs;

use Classes\Database\Db;
use Classes\Utils\Helper;
use PDO;

class Coach{
    public function coaches(){
        $sql = "SELECT U.id, U.fname, U.lname, U.job, U.pictur, D.prix FROM users U, details D WHERE role != 'Admin' AND role != 'Client' AND U.id = D.id_user";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function getCoacheById($id){
        $sql = "SELECT U.id, U.fname, U.lname, U.username, U.about, U.pictur, U.cv, D.prix, D.detail FROM users U, details D WHERE U.id = ? AND U.id = D.id_user";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
}