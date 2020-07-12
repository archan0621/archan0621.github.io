<header>
	<nav>
		<a href="<?=PATH?>">HOME</a> | 
		<?php if( ! $login ):?>
			<a href="<?=PATH?>">LOGIN</a>
		<?php else: ?>
			<a href="<?=PATH?>/app/logout.php"><?=$loginname?>(<?=$loginemail?>)님 LOGOUT</a> | 
			<a href="<?=PATH?>/app/write.php">WRITE</a> | 
			<a href="<?=PATH?>/app/blog.php">BLOG</a>
		<?php endif;?>
	</nav>
</header>