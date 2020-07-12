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
$view['action'] = "add";
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if( $id ) {
	$sql = "SELECT * FROM blog WHERE id={$id}";
	if( $rs = $db->query($sql) ){
		if( $rs->rowCount() ) {
			$view = $rs->fetch();	
			$view['action'] = "edit";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Write</title>
	<link rel="stylesheet" href="<?=PATH?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=PATH?>/css/all.min.css">
	<link rel="stylesheet" href="<?=PATH?>/css/common.css">
</head>
<body>
	<?php include_once './header.php';?>
	<div class="container">
		<form action="save.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" id="id" value="<?=$view['id'] ?>">
			<input type="hidden" name="action" id="action" value="<?=$view['action']?>">
			<input type="hidden" name="useremail" id="useremail" value="<?=$loginemail?>">
			<div class="form-group">
				<label for="title">제목</label><br>
				<input type="text" name="title" id="title" class="form-control" value="<?=$view['title']?>">
			</div>
			<div class="form-group">
				<label for="username">작성자</label><br>
				<input type="text" name="username" id="username" readonly value="<?=$loginname?>" class="form-control">
			</div>
			<div class="form-group">
				<label for="content">본문</label><br>
				<textarea name="content" id="content" cols="80" rows="10" class="form-control"><?=$view['content']?></textarea>
			</div>	
			<div class="form-group">
				<label for="photo">사진</label><br>
				<input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.gif,.png">
				<div id="preview">
					<?php if($view['photo']):?>
						<img src="<?=PATH?>/photo/<?=$view['photo']?>" alt="<?=$view['photo']?>">
					<?php endif;?>
				</div>
			</div>	
			<button class="btn btn-primary"><i class="fas fa-pen"></i> 등록하기</button>
			<a href="<?=PATH?>" class="btn btn-primary"><i class="fas fa-home"></i> HOME</a>
		<a href="<?=PATH?>/app/blog.php" class="btn btn-dark"><i class="fas fa-blog"></i> BLOG</a>
		</form>
	</div>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/script.js"></script>	
</body>
</html>
