<?php
	
	
	define('templates',true);
	//调用前端组件的标记
	define('exp',true);
	//调用后台函数文件的标记

	require dirname(__FILE__).'/../../function/database.class.php';
	require dirname(__FILE__).'/../../function/common.php';
    
	
	if(!isset($_SESSION['user_name'])){
		_location('请先登录','../../login.php');
	}

	$exp_name = $_GET['exp_name'];

	include dirname(__FILE__).'/include/header.php';

?>
	
	<script type="text/javascript" src="./templates/default/js/function.js"></script>

	<div class="container">
	
		<?php 
		switch($_GET['exp_name']){
			case 'oscillograph':
				echo ("实验仪器参数设置 &nbsp;>&nbsp;&nbsp;&nbsp;");
		?>
				<a href='javascript:void(0)' class='confirm' onclick="modified_course_status('oscillograph')">点击确认</a><br><br>
		<?php
			
					$out = "
						<table class='table-search-result' style='width: 800px'>
							<tr>
								<th>组号</th>
								<th>Vp-p(V)</th>
								<th>f(Hz)</th>
								<th>操作</th>
							<tr>";
					echo $out;
					if( isset($_GET['action']) && $_GET['action'] == "set"){
						echo set_parameter($_GET['exp_name']);
					}
					else if( isset($_GET['action']) && $_GET['action']=="modified"){
						echo query_parameter($_GET['exp_name']);
					}
					echo "</table>";
				break;
			case 'potentioneter':
				echo ("实验仪器参数设置 &nbsp;>&nbsp;&nbsp;&nbsp;");
		?>
				<a href='javascript:void(0)' class='confirm' onclick="modified_course_status('potentioneter')">点击确认</a><br><br>
		<?php
			
					$out = "
						<table class='table-search-result' style='width: 700px'>
							<tr>
								<th>组号</th>
								<th>E<sub>xs</sub>(V)</th>
								<th>操作</th>
							<tr>";
					echo $out;
					if( isset($_GET['action']) && $_GET['action'] == "set"){
						echo set_parameter($_GET['exp_name']);
					}
					else if( isset($_GET['action']) && $_GET['action']=="modified"){
						echo query_parameter($_GET['exp_name']);
					}
					echo "</table>";
				break;

		}
		?>

	
	</div>


	<div class="popup-bg-parameter" id="popup-bg-parameter">
		<div class="popup-detail-parameter">
			<button class="detail-close" onclick="close_popup_para()"><span aria-hidden="true">×</span></button>
			<p class="t">修改参数</p>			
			<?php
				if($_GET['exp_name'] == 'oscillograph'){ 
					echo "
					<div class='mask-form'>
						<p> <span class='mask-title'>实验</span><span class='mask-content'>示波器与李萨如图形</span></p>
						<p> <span class='mask-title'>组号</span><span class='mask-content' id='para_group_num'></span></p>
						<div class='parameter_changed'>
							<div><span class='para-title'>V<sub>p-p</sub> (<i>V</i> )：</span><input type='text' class='class-input' id='v_std' ></div>
							<div><span class='para-title'>f (<i>Hz</i> )：</span><input type='text' class='class-input' id='f_std'></div>
						</div>
						<button class='mask-submit' onclick='change_para_submit_oscillograph()'>确认修改</button>
					</div>";
				}else if($_GET['exp_name']=='potentioneter'){
					echo "
					<div class='mask-form'>
						<p> <span class='mask-title'>实验</span><span class='mask-content'>电位差计实验</span></p>
						<p> <span class='mask-title'>组号</span><span class='mask-content' id='para_group_num'></span></p>
						<div class='parameter_changed'>
							<div><span class='para-title'>E<sub>xs</sub> (<i>V</i> )：</span><input type='text' class='class-input' id='E_std' ></div>
						</div>
						<button class='mask-submit' onclick='change_para_submit_potentioneter()'>确认修改</button>
					</div>";	
				}


			?>

		</div>
	</div>
</div>



<?php
	include dirname(__FILE__).'/include/footer.php';
?>