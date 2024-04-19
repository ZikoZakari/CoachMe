<?php 

namespace Classes\Coachs;

use Classes\Database\Db;
use Classes\Utils\Helper;
use PDO;

class Coach{
    public function coaches(){
        $sql = "SELECT U.id, U.fname, U.lname, U.job, U.pictur, D.prix FROM users U, details D WHERE U.role = 'Coach' AND U.status = '1' AND U.id = D.id_user";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function getCoacheById($id){
        $sql = "SELECT U.id, U.fname, U.lname, U.username, U.email, U.phone, U.about, U.pictur, U.cv, D.prix, D.detail FROM users U, details D WHERE U.id = ? AND U.id = D.id_user";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function getAllCoache(){
        $sql = "SELECT U.id, U.fname, U.lname, U.email, U.phone, U.cv, U.status, U.role, D.prix, D.detail
        FROM users U
        LEFT JOIN details D
        ON U.id = D.id_user
        WHERE U.status = '0' AND U.role = 'Coach'";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function addCoachClient($id_coach,$id_client){
        $sql = "INSERT INTO coach_client(id_coach,id_client) VALUES (?,?)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$id_coach,$id_client]);
    }

    public function getAllContact($id){
        $sql = "SELECT U.id, U.fname, U.lname, U.email, U.phone, C.status, U.role, C.id_coach FROM users U
        LEFT JOIN coach_client C
        ON U.id = C.id_client
        WHERE C.id_coach = ? AND C.status = '0'";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function getAllAcceptedContact($id){
        $sql = "SELECT U.id, U.fname, U.lname, U.email, U.phone, C.status, U.role, C.id_coach FROM users U
        LEFT JOIN coach_client C
        ON U.id = C.id_client
        WHERE C.id_coach = ? AND C.status = '1'";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function getAllContactCoach($id){
        $sql = "SELECT U.id, U.fname, U.lname, U.email, U.phone, C.status, U.role, C.id_coach FROM users U
        LEFT JOIN coach_client C
        ON U.id = C.id_coach
        WHERE C.id_client = ? ";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
}