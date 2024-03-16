<?php 

namespace Classes\Utils;

class Helper {

    public static function validateEmail($email)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
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

        if(!preg_match($pattern, $name))
        {
            return false;
        }

            return true;
    }

    public static function sanitizeString($str)
    {
        return htmlspecialchars($str);
    }

    public static function parseEnvFile($filename)
    {
        $env = [];
        $stream = @file_get_contents($filename);

        if(!$stream)
        {
            $filename = "../" . $filename;
            $stream = file_get_contents($filename);
            
        }

        $vars = explode("\n", $stream);
        foreach($vars as $var)
        {
            $p = explode('=', $var);
            $env[$p[0]] = trim($p[1]);
        }

        return $env;

    }

    public static function flushMessage($msg,$class)
    {
        return "<div class=\"$class\">$msg</div>";
    }

    public static function checkIfConnected()
    {
        if(!empty($_SESSION))
            return true;
        return false;
    }
}