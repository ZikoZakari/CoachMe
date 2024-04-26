<?php 

namespace Classes\Coachs;

use Classes\Database\Db;
use PDO;

class Coach{
    public function coaches(){
        $sql = "SELECT U.id, U.fname, U.lname, U.job, U.pictur, D.prix, U.skills, U.about, (SELECT COUNT(*) FROM recommend R WHERE R.id_coach = U.id) AS recommend FROM users U 
        LEFT JOIN details D
        ON U.id = D.id_user
        LEFT JOIN recommend R
        ON D.id_user = R.id_coach
        WHERE U.role = 'Coach' AND U.status = '1'
        GROUP BY U.id
        ORDER BY recommend DESC";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function getCoacheById($id){
        $sql = "SELECT U.id, U.fname, U.lname, U.username, U.email, U.phone, U.about, U.pictur, U.cv, D.prix, D.detail, U.skills FROM users U, details D WHERE U.id = ? AND U.id = D.id_user";
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
    
    public function getMyClient($id,$status){
        $sql = "SELECT C.id, U.fname, U.lname, U.email, U.phone, C.status, U.role, C.id_coach, C.date FROM users U
        LEFT JOIN coach_client C
        ON U.id = C.id_client
        WHERE C.id_coach = ? AND C.status = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id,$status]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
    
    public function getAllContactCoach($id){
        $sql = "SELECT U.id, U.fname, U.lname, U.email, U.phone, C.status, U.role, C.id_coach, C.date FROM users U
        LEFT JOIN coach_client C
        ON U.id = C.id_coach
        WHERE C.id_client = ? ";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
    
    public function addRecommend($id_client, $id_coach){
        $sql = "INSERT INTO recommend(id_client,id_coach) VALUES (?,?)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        
        $stmt->execute([$id_client,$id_coach]);
    }
    
    public function deleteRecommend($id_client,$id_coach){
        $sql = "DELETE FROM recommend WHERE id_client = ? AND id_coach = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$id_client,$id_coach]);
    }

    public function addCoachClient($id_coach,$id_client){
        $sql = "INSERT INTO coach_client(id_coach,id_client,date) VALUES (?,?,NOW())";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$id_coach,$id_client]);
    }

    public function deleteCoachClient($id_coach,$id_client){
        $sql = "DELETE FROM coach_client WHERE id_coach = ? AND id_client = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$id_coach,$id_client]);
    }

    public function getCoache(){
        $sql = "SELECT U.id, U.fname, U.lname, U.pictur, U.about, (SELECT COUNT(*) FROM recommend R WHERE U.id = R.id_coach) AS recom 
        FROM users U
        WHERE U.role = 'Coach' AND U.status = '1'
        ORDER BY recom DESC LIMIT 3";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function deleteCoachClientByStatus($id_coach,$id_client){
        $sql = "DELETE FROM coach_client WHERE id = (SELECT id FROM coach_client WHERE id_coach = ? AND id_client = ? ORDER BY id DESC LIMIT 1)";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);

        $stmt->execute([$id_coach,$id_client]);
    }

    public function search($search){
        $sql = "SELECT U.id, U.fname, U.lname, U.job, U.pictur, D.prix, U.skills, U.about, (SELECT COUNT(*) FROM recommend R WHERE R.id_coach = U.id) AS recommend FROM users U 
        LEFT JOIN details D
        ON U.id = D.id_user
        LEFT JOIN recommend R
        ON D.id_user = R.id_coach
        WHERE U.role = 'Coach' AND U.status = '1' AND ((skills LIKE ?) OR (fname LIKE ?) OR (lname LIKE ?))
        GROUP BY U.id
        ORDER BY recommend DESC";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute(['%'.$search.'%','%'.$search.'%','%'.$search.'%']);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function getActifUsers($role){
        if ($role === 'coach'){
            $sql = "SELECT count(*) AS coachs FROM users WHERE role = 'Coach' AND status = '1'";
        }
        if ($role === 'client'){
            $sql = "SELECT count(*) AS clients FROM users WHERE role = 'Client'";
        }
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_OBJ);
        return $rows;
    }
}