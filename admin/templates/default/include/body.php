
<?php
	if (!defined('templates')) exit;
	//防止恶意调用

	//index文件已经定义了exp常量，此处不许重复定义
	require '../../function/common.php';
?>

<script type="text/javascript" src="./js/function.js"></script>

<div class="container">
	<div class="course">
		<a href="javascript:void(0)" onclick="startCourse(1)">试验一</a>
		<a href="javascript:void(0)" onclick="startCourse(2)">试验二</a>
		<a href="javascript:void(0)" onclick="startCourse(3)">试验三</a>
		<a href="javascript:void(0)" onclick="startCourse(4)">试验四</a>
		<a href="javascript:void(0)" onclick="startCourse(5)">试验五</a>
		<a href="javascript:void(0)" onclick="startCourse(6)">试验六</a>
	</div>
</div>

<div class="popup-bg" id="popup-bg">
	<div class="mask">
		<button class="mask-close" onclick="close_popup()"><span aria-hidden="true">×</span></button>
		<p class="t">将开启新的课堂</p>
		<div class="course_info">
			<p><span class="mask-title">实验名称</span><span class="mask-content" id="experiment_name"></span></p>
			<p><span class="mask-title">教&emsp;&emsp;师</span><span class="mask-content">徐涛涛</span></p>
			<p><span class="mask-title">上课时间</span><span class="mask-content"><?php echo(date('Y/m/d'));?>&emsp;<?php course_time();?></span></p>
			<form class="mask-form" action="./experiment.php" method="POST">
				<div class="class_number">
					<span class="class-icon"><i class="fa fa-drivers-license-o"></i></span>
					<input type="text" class="class-input" placeholder="班级（选填）" id="classNum" name="classNum">
				</div>
				<button type="submit" class="mask-submit">确认开始</button>
			</form>
		</div>
	</div>
</div>