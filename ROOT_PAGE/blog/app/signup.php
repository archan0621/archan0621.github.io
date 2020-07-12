<?php
//signup.php
include_once "../config.php";
$username = "";
$useremail = "";
$userpw = "";
$userpw2 = "";
if( isset($_POST['username']) ) {
	$username = $_POST['username'];
}
if( isset($_POST['useremail']) ) {
	$useremail = $_POST['useremail'];
}
if( isset($_POST['userpw']) ) {
	$userpw = $_POST['userpw'];
}
if( isset($_POST['userpw2']) ) {
	$userpw2 = $_POST['userpw2'];
}

if( $username 
	&& $useremail 
	&& $userpw 
	&& $userpw2 
	&& $userpw==$userpw2 
	&& ! $login ) {
	$sql = "INSERT INTO users(username, useremail, userpw, joindate) VALUES(:username, :useremail, PASSWORD(:userpw), now())";
	if( $rs = $db->prepare($sql) ) {
		$rs->bindParam(":username", $username);
		$rs->bindParam(":useremail", $useremail);
		$rs->bindParam(":userpw", $userpw);
		$rs->execute();
	}
}
header("Location: ../");