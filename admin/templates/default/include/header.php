<?php
	if (!defined('templates')) exit;
	//防止恶意调用
	
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>物理实验管理--教师管理页面</title>
	<?php echo "<link rel='stylesheet' type='text/css' href='./templates/default/css/style.css'>";?>
	<?php echo "<link rel='stylesheet' href='./templates/default/css/font-awesome-4.7.0/css/font-awesome.min.css'>";?>
</head>
<body>
	<div class="header">
		<div class="nav">
			<ul class="nav_list">
				<li><a class="fa fa-home" href="#">首 页</a></li>
				<li><a>实时课堂</a></li>
				<li><a>历史数据</a></li>
			</ul>
			<ul class="nav_option">
				<?php echo "<li><a name=".$_SESSION['uid']." id='uid'>用 户 [ ".$_SESSION['user_name']."]</a></li>";?>
				<li><span class="symbol-item">|</span></li>
				<li><a href="../../logout.php">注 销</a></li>
			</ul>
		</div><!--end nav -->
	</div><!--end header -->
