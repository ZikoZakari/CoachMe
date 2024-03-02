<?php 

$base_path = __DIR__;

require_once $base_path . "/vendor/autoload.php";

use Classes\Database\Db;

$database = new DB();

var_dump($database->getConnection());


