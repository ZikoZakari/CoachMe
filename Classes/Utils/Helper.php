<?php

namespace Classes\Utils;

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
}
