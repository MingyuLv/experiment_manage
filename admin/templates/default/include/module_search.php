<?php
	if (!defined('templates')) exit;
	//防止恶意调用
?>
	<script type="text/javascript" src="./templates/default/js/function.js"></script>

	<div class="container">
	
		<?php 
		if( !isset($_POST['stu_num']) && !isset($_POST['date'])){
			echo "历史数据查询 ><br><br><br>";
			if( $_GET['search']=='stu_num'){
				$out = "
					<div>
						<form action='./index.php?search=stu_num' method='POST'>
							<p>
								按学号：<input type='text' name='stu_num'>
								<button type='submit'>查询</button>
							</p>
						</form>
					</div>";
			}else if($_GET['search']=='date'){
				$out = "
						<div>
							<form action='./index.php?search=date' method='POST'>
								<p>
									按日期：
									<input type='date' name='date'>
									<button type='submit'>查询</button>
								</p>
							<form>
						</div>";
			}
			echo $out;
		}else{
			
			
			if(isset($_POST['stu_num'])){
				echo "查询结果（按学号）><br><br><br>";
				$out = "
				<table class='table-search-result'>
					<tr>
						<th>日期</th>
						<th>实验名称</th>
						<th>求助次数</th>
						<th>未通过次数</th>
						<th>成绩</th>
						<th></th>
					<tr>";
				echo $out;
				echo search_info_num($_POST['stu_num']);
				echo "</table>";
			}else if(isset($_POST['date'])){
				echo "查询结果（按日期）><br><br><br>";
				$out = "
				<table class='table-search-result'>
					<tr>
						<th>时间</th>
						<th>实验名称</th>
						<th>任课教师</th>
						<th></th>
					<tr>";
				echo $out;
				echo search_info_date($_POST['date']);
				echo "</table>";
			}
		}
		?>

	
	</div>