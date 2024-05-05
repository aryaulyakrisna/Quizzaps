<?php
require_once realpath(__DIR__ . "/../vendor/autoLoad.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->safeLoad();

define("DB_HOST", $_ENV["DB_HOST"]);
define("DB_UNAME", $_ENV["DB_UNAME"]);
define("DB_PASS", $_ENV["DB_PASS"]);
define("DB_DNAME", $_ENV["DB_DNAME"]);
$conn=mysqli_connect(DB_HOST,DB_UNAME,DB_PASS,DB_DNAME);