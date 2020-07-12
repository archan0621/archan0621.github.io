<?php
	include_once '../config.php';
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	if( ! $page ) $page = 1;
	$list = 10;
	$start = ($page - 1) * $list;

	$sql = "SELECT * FROM blog ORDER BY created_at DESC LIMIT {$start}, {$list}";
	if( $rs = $db->query($sql) ){
		if( $blog = $rs->fetchAll() ) {
			foreach ($blog as $b) {
?>
<tr>
	<td><?=$b['id']?></td>
	<td class="list-photo">
		<?php if($b['photo']):?>
			<img src="<?=PATH?>/photo/<?=$b['photo']?>" alt="<?=$b['photo']?>">
		<?php endif;?>
	</td>
	<td><a href="view.php?id=<?=$b['id']?>"><?=$b['title']?></a></td>
	<td><?=$b['username']?></td>
	<td><?=substr($b['created_at'],0,10)?></td>
</tr>
<?php								
			}
		}
	}
?>