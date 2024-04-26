<?php

namespace Classes\Utils;

use Classes\Database\Db;
use PDO;

class Helper
{

    public static function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // username - (domaine - tld)
        $parts = explode("@", $email);

        // domain - tld
        $sparts = explode(".", $parts[1]);

        return true;
    }

    public static function validateName($name)
    {
        $pattern = '/^[a-zA-Z ]+$/';

        if (!preg_match($pattern, $name)) {
            return false;
        }

        return true;
    }

    public static function validatePhone($phone)
    {
        $pattern = '/^[0-9 ]+$/';

        if (!preg_match($pattern, $phone)) {
            return false;
        }

        return true;
    }

    public static function extractUsernameFromEmail($email)
    {
        return explode('@', $email)[0];
    }

    public static function sanitizeString($str)
    {
        return htmlspecialchars($str);
    }

    public static function parseEnvFile($filename)
    {
        $env = [];
        $stream = @file_get_contents($filename);

        if (!$stream) {
            $filename = "../" . $filename;
            $stream = file_get_contents($filename);
        }

        $vars = explode("\n", $stream);
        foreach ($vars as $var) {
            $p = explode('=', $var);
            $env[$p[0]] = trim($p[1]);
        }

        return $env;
    }

    public static function flushMessage($msg, $class)
    {
        return "<div class=\"$class\">$msg</div>";
    }

    public static function checkIfConnected()
    {
        if (!empty($_SESSION))
            return true;
        return false;
    }

    public static function md5Hash($str)
    {
        return md5($str);
    }

    public static function genderRange($gender)
    {
        if ($gender == 'F' || $gender == 'M' || $gender == 'O')
            return true;
        return false;
    }

    public static function userRoleRange($role)
    {
        if ($role == 'Coach' || $role == 'Client')
            return true;
        return false;
    }

    public static function imgCheck($file)
    {   
        $fileType = explode('.',$file["name"])[1];
        $uploadOk = 1;

        // Check file size
        if ($file["size"] > 1000000) { // limits the file size to 1MB
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedTypes = ['jpg', 'png', 'jpeg', 'gif'];
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = 0;
        }
        if ($uploadOk == 1){
            return true;
        }else{
            return false;
        }
    }

    public static function fileCheck($file)
    {   
        $fileType = explode('.',$file["name"])[1];
        $uploadOk = 1;

        // Check file size
        if ($file["size"] > 5000000) { // limits the file size to 5MB
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedTypes = ['pdf'];
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = 0;
        }
        if ($uploadOk == 1){
            return true;
        }else{
            return false;
        }
    }

    public static function checkIfNotExist($table,$id_coach,$id_client){

        if ($table == 1){
            $sql = "SELECT id FROM coach_client WHERE id_coach = ? AND id_client = ?";
        }

        if ($table == 2){
            $sql = "SELECT id FROM recommend WHERE id_coach = ? AND id_client = ?";
        }

        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_coach,$id_client]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

        if ($rows == NULL)
            return true;
        return false;
    }

    public static function checkCoachClientStatus($id_coach,$id_client,$status){
        $sql = "SELECT id FROM coach_client WHERE id_coach = ? AND id_client = ? AND status = ? ORDER BY id LIMIT 1";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_coach,$id_client,$status]);
        $rows = $stmt->fetch(PDO::FETCH_OBJ);

        if ($rows == NULL)
            return false;
        return true;
    }

    public static function checkIfLinkExist($table,$id){

        $db = (new Db())->getConnection();

        if ($table === 1){
            $sql = "SELECT id FROM details WHERE id_user = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
        }
        if ($table === 2){
            $sql = "SELECT id FROM coach_client WHERE (id_coach = ? OR id_client = ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id,$id]);
        }
        if($table === 3){
            $sql = "SELECT id FROM recommend WHERE (id_coach = ? OR id_client = ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id,$id]);
        }

        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

        if ($rows == NULL)
            return false;
        return true;
    }

    public static function messagNotExist($id){
        $sql = "SELECT id FROM alert_messag WHERE id_user = ?";
        $db = (new Db())->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

        if ($rows == NULL)
            return true;
        return false;
    }

    public static function stringLimiter($string,$max){
        if(strlen($string) <= $max){
            return $string;
        }else if (strlen($string) > $max){
            return substr($string,0,$max) . " ...";
        }
    }
}
