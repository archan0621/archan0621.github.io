<?php
//login.php
include_once "../config.php";
$useremail = "";
$userpw = "";
if( isset($_POST['useremail']) ) {
	$useremail = $_POST['useremail'];
}
if( isset($_POST['userpw']) ) {
	$userpw = $_POST['userpw'];
}
if( $useremail && $userpw && ! $login ) {
	//보안코딩
	$sql = "SELECT * FROM users WHERE useremail=:email AND userpw=password(:pw)";
	if( $rs = $db->prepare($sql) ) {
		$rs->bindParam(":email", $useremail);
		$rs->bindParam(":pw", $userpw);
		if( $rs->execute() ) {
			if( $rs->rowCount() > 0 ) {
				$user = $rs->fetch();
				$_SESSION['username'] = $user['username'];
				$_SESSION['useremail'] = $user['useremail'];
			}
		}
	}



	/*
	// a@b.c' or 1=1; -- 와 같이 하면 뚤림
	$sql = "select * from users where useremail='{$useremail}' and userpw=password('{$userpw}')";
	if( $rs = $db->query($sql) ) {
		if( $rs->rowCount() > 0 ) {
			$user = $rs->fetch();
			$_SESSION['username'] = $user['username'];
			$_SESSION['useremail'] = $user['useremail'];
		}
	}
	*/
}

//print_r($_SESSION);

header("Location: ../");