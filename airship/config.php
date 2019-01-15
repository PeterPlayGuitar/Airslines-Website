<?php
session_start();
define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("DBNAME", "guestbook");
define("CHARSET","utf8");
define("SALT","webDEVblog");

$dsn = "mysql:host=".HOST.";dbname=".DBNAME.";charset=".CHARSET;
try{
    $dbConn = new PDO($dsn,USER,PASSWORD);
} catch (PDOEXCEPTION $e){
    die('Something went wrong: ' . $e->getMessage());
}