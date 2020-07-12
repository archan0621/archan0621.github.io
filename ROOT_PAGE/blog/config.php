<?php
session_start();
define("ROOT", __DIR__);
define("PATH", "http://localhost/blog");
try {
	$db = new PDO("mysql:host=localhost; dbname=web; charset=utf8", "root", "");
} catch (PDOException $e) {
	header("Location: ./error.html");
}

$loginname = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$loginemail = isset($_SESSION['useremail']) ? $_SESSION['useremail'] : "";
$login = false;
if( $loginname && $loginemail )  $login = true;