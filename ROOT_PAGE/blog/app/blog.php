<?php include_once '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BLOG</title>
	<link rel="stylesheet" href="<?=PATH?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=PATH?>/css/all.min.css">
	<link rel="stylesheet" href="<?=PATH?>/css/common.css">
</head>
<body>
	<?php include_once './header.php';?>
	<div class="container">
		<table id="blog-list" class="table">
			<thead>
				<tr>
					<th>번호</th>
					<th>이미지</th>
					<th>제목</th>
					<th>작성자</th>
					<th>날짜</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
	<div id="photo-pop"></div>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/script.js"></script>		
	<script>
		var page = 1;
		getList();
		function getList() {
			$.get("bloglist.php?page="+page, function(blist){
				$("#blog-list tbody").append(blist);
			});
		}
		$(window).scroll(function(){
			var sTop = $(window).scrollTop();
			var sHeight = $(window).height();
			var docHeight = $(document).height();
			if( (sTop + sHeight) == docHeight ) {
				page++;
				getList();
			}
		});
	</script>
</body>
</html>
