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
				<li><a class="fa fa-home" href="./index.php">首 页</a></li>
				<li class="trigger_dropdown">
					<a href="javascript:void(0)">课堂管理</a>
					<div class="dropdown">
					<?php
						if( if_cur_course($_SESSION['uid'])){
							echo "<a href='./index.php?exp_name=".cur_course_name($_SESSION['uid'])."'>实时数据</a>";
							echo "<a href='javascript:void(0)' onclick='close_course()'>结束当前课堂</a>";
						}else{
							echo "<p>没有正在进行的课程！</p>";
						}
					?>
					</div>
				</li>
				<li class='trigger_dropdown'>
					<a>历史数据</a>
					<div class="dropdown">
						<a href="javascript:void(0)">按日期查找</a>
						<a href="javascript:void(0)">按学号查找</a>
					</div>
				</li>
				<li class='trigger_dropdown'>
					<a>账户管理</a>
					<div class="dropdown">
						<a href="javascript:void(0)">修改密码</a>
						<!-- <a href="javascript:void(0)"></a> -->
					</div>
				</li>
			</ul>
			<ul class="nav_option">
				<li><a href="./logout.php">退 出 】</a></li>
				<li><span class="symbol-item" style="font-weight: bold">|</span></li>
				<?php echo "<li><a name=".$_SESSION['uid']." id='uid'>【 ".$_SESSION['user_name']."</a>";?>
					
				<?php echo"</li>";?>
			</ul>
		</div><!--end nav -->
	</div><!--end header -->
