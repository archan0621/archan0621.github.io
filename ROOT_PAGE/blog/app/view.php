<?php 
include_once '../config.php'; 
$view = array();
$view['id'] = "";
$view['title'] = "";
$view['content'] = "";
$view['username'] = "";
$view['useremail'] = "";
$view['photo'] = "";
$view['created_at'] = "";
$view['updated_at'] = "";
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if( $id ) {
	$sql = "SELECT * FROM blog WHERE id={$id}";
	if( $rs = $db->query($sql) ){
		if( $rs->rowCount() ) {
			$view = $rs->fetch();	
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VIEW</title>
	<link rel="stylesheet" href="<?=PATH?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=PATH?>/css/all.min.css">
	<link rel="stylesheet" href="<?=PATH?>/css/common.css">
</head>
<body>
	<?php include_once './header.php';?>
	<div class="container">
		<h3><?=$view['title']?></h3>
		<p><?=$view['username']?> <?=$view['useremail']?> 작성 <?=$view['created_at']?> 업데이트 <?=$view['updated_at']?></p>
		<hr>
		<p><?=nl2br($view['content'])?></p>
		<?php if($view['photo']):?>
		<p class="photo-view"><img src="<?=PATH?>/photo/<?=$view['photo']?>" alt="<?=$view['photo']?>"></p>
		<?php endif;?>
		<a href="<?=PATH?>" class="btn btn-primary"><i class="fas fa-home"></i> HOME</a>
		<a href="<?=PATH?>/app/blog.php" class="btn btn-dark"><i class="fas fa-blog"></i> BLOG</a>
		<?php if( $login && $view['id'] && $view['useremail']==$loginemail ):?>
			<a href="<?=PATH?>/app/write.php?id=<?=$view['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i> 수정</a>
			<a href="javascript:delBlog(<?=$view['id']?>)" class="btn btn-danger"><i class="fas fa-trash"></i> 삭제</a>
			<form id="del-form" action="save.php" method="post"><input type="hidden" name="action" value="del"><input type="hidden" name="id" value="<?=$view['id']?>"></form>
		<?php endif;?>
	</div>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/script.js"></script>	
</body>
</html>