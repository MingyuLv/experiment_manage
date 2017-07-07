
<?php
	if (!defined('templates')) exit;
	//防止恶意调用
?>

<script type="text/javascript" src="./templates/default/js/function.js"></script>

<div class="container">
	<div class="course">
		<a href="javascript:void(0)" onclick="startCourse(this,1)" name="oscillograph">示波器与李萨如图形</a>
		<a href="javascript:void(0)" onclick="startCourse(this,2)" name="potentioneter">电位差计</a>
		<a href="javascript:void(0)" onclick="startCourse(this,3)" name="">试验三</a>
		<a href="javascript:void(0)" onclick="startCourse(this,4)" name="">试验四</a>
		<a href="javascript:void(0)" onclick="startCourse(this,5)" name="">试验五</a>
		<a href="javascript:void(0)" onclick="startCourse(this,6)" name="">试验六</a>
	</div>
</div>

<div class="popup-bg" id="popup-bg">
	<div class="mask">
		<button class="mask-close" onclick="close_popup()"><span aria-hidden="true">×</span></button>
		<p class="t">将开启新的课堂</p>
		<div class="course_info">
			<p><span class="mask-title">实验名称</span><span class="mask-content" id="experiment_name"></span></p>
			<p><span class="mask-title">教&emsp;&emsp;师</span><span class="mask-content"><?php echo($_SESSION["user_name"]);?></span></p>
			<p><span class="mask-title">上课时间</span><span class="mask-content"><?php echo(ymd_date());?>&emsp;<?php course_time();?></span></p>
			<form class="mask-form" action="" method="POST">
				<div class="class_number">
					<span class="class-icon"><i class="fa fa-drivers-license-o"></i></span>
					<input type="text" class="class-input" placeholder="班级（选填）" id="classNum" name="classNum">
				</div>
				<button type="submit" class="mask-submit">确认开始</button>
			</form>
		</div>
	</div>
</div>