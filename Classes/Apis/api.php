<?php 

namespace Classes\Apis;

use Classes\Database\Db;
use PDO;

class Api{
    public function chart(){
        $db = (new Db())->getConnection();
        $homme = "SELECT count(*) AS homme FROM users WHERE gender = 'M' ";
        $femme = "SELECT count(*) AS femme FROM users WHERE gender = 'F'";
        $stmt = $db->prepare($homme);
        $stmt->execute();
        $rows_homme = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt = $db->prepare($femme);
        $stmt->execute();
        $rows_femme = $stmt->fetch(PDO::FETCH_OBJ);

        $response = array("nb_homme" => $rows_homme->homme , "nb_femme" => $rows_femme->femme);
        
        return $response;
    }

}