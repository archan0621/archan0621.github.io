<?php include_once "config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" href="<?=PATH?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=PATH?>/css/all.min.css">
	<link rel="stylesheet" href="<?=PATH?>/css/common.css">
	<link rel="stylesheet" href="<?=PATH?>/css/style.css">
</head>
<body>
	<?php include_once 'app/header.php';?>
	<div class="login-page">
	  <div class="form">
	  		<?php if($login):?>
				<script>
					location.href = "app/blog.php";
				</script>
	  		<?php else:?>
	    <form action="app/signup.php" class="register-form" method="post" onsubmit="return checkJoinForm()">
	      <input type="text" name="username" id="register_name" placeholder="username" required>
	      <input type="text" name="useremail" id="register_email" placeholder="id address" required>
	      <input type="password" name="userpw" id="register_pw" placeholder="password" required>
	      <input type="password" name="userpw2" id="register_pw2" placeholder="confirm password" required>
	      <button>create</button>
	      <p class="message">Already registered? <a href="#">Sign In</a></p>
	    </form>
	    <form action="app/login.php" class="login-form" method="post">
	      <input type="id" name="useremail" id="login_email" placeholder="id address" required>
	      <input type="password" name="userpw" id="login_pw" placeholder="password" required>
	      <button>login</button>
	      <p class="message">Not registered? <a href="#">Create an account</a></p>
	    </form>
	   	<?php endif;?>
	  </div>
	</div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>