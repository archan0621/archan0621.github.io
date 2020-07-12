<?php
//signup.php
include_once "../config.php";
print_r($_POST);
$id = isset($_POST['id']) ? (int)$_POST['id'] : "";
$action = isset($_POST['action']) ? $_POST['action'] : "";
$username = isset($_POST['username']) ? $_POST['username'] : "";
$useremail = isset($_POST['useremail']) ? $_POST['useremail'] : "";
$title = isset($_POST['title']) ? $_POST['title'] : "";
$content = isset($_POST['content']) ? $_POST['content'] : "";
$photo = "";
if( isset($_FILES['photo']) ) {
	$updir = ROOT . "/photo/";
	if(is_uploaded_file($_FILES['photo']['tmp_name'])){
		$upfile=date("YmdHis") . "_" . basename($_FILES['photo']['name']);
		$target=$updir . $upfile;
		echo $target;
		if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
			$photo = $upfile;
		}
	}
}

if($action == "add") {
	if( $username 
		&& $useremail 
		&& $title 
		&& $content
		&& $login ) {
		$sql = "INSERT INTO blog(username, useremail, title, content, photo, created_at, updated_at) VALUES(:username, :useremail, :title, :content, :photo, now(), now())";
		if( $rs = $db->prepare($sql) ) {
			$rs->bindParam(":username", $username);
			$rs->bindParam(":useremail", $useremail);
			$rs->bindParam(":title", $title);
			$rs->bindParam(":content", $content);
			$rs->bindParam(":photo", $photo);
			$rs->execute();
		}
	}
} else if($action == "edit") {
	echo "edit";
	if( $username 
		&& $useremail 
		&& $title 
		&& $content
		&& $login 
		&& $useremail==$loginemail 
		&& $id) {
		$sql = "UPDATE blog SET ";
		$sql .= " title=:title ";
		$sql .= ", content=:content ";
		if( $photo ) $sql .= ", photo=:photo ";
		$sql .= ", updated_at=now() ";
		$sql .= " WHERE id={$id} AND useremail='{$loginemail}' ";
		echo $sql;
		if( $rs = $db->prepare($sql) ) {
			$rs->bindParam(":title", $title);
			$rs->bindParam(":content", $content);
			if( $photo ) $rs->bindParam(":photo", $photo);
			$rs->execute();
		}
	}
} else if($action == "del") {
	if( $id && $login && $loginemail) {
		$sql = "DELETE FROM blog WHERE id={$id} AND useremail='{$loginemail}'";
		$db->query($sql);
	}
}

header("Location: " . PATH . "/app/blog.php");