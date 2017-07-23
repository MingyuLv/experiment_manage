<?php
	if(!defined('templates')) exit();
	//防止恶意调用

?>

<script type="text/javascript" src="./templates/default/js/function.js"></script>

<div class="container" name="potentioneter">
	<div class="left_item">
		<div class="widget evaluating">
			<?php  init_evaluating();?>
		</div>
		
		<div class="widget help">
			<?php init_help();?>
		</div>
	</div>
   
	<div class="info_table">
	    <table class="cur_data" id="cur_data">
	        <thead >
	            <tr>
	                <th>组号</th>
	                <th>学号</th>
	                <th>姓名</th>
	                <th>定标</th>
	                <th>测量电动势</th>
	                <th>求助次数</th>
	                <th>未通过次数</th>
	                <th>原始数据</th>
	            </tr>
	        </thead>
	        <tbody>
	   			<?php init_info_potentioneter();?>
	        </tbody>
	    </table>
    </div>
</div>

<div class="popup-bg" id="popup-bg">
	 <div class="popup-detail">
	 <button class="detail-close" onclick="close_popup()"><span aria-hidden="true">×</span></button>

        <div class="stu_info">
            <span>组号：<span id="group_num"></span></span>
            <span>姓名：<span id="stu_name"></span></span>
            <span>学号：<span id="stu_num"></span></span>
        </div>

        <table class="tb-content">
            <thead>
	            <tr>
	                <th>U_ab</th>
	                <th>U_0</th>
	                <th>I_s</th>
	                <th>Rab</th>
	                <th>Is</th>
	                <th>U0</th>
	                <th>Uab</th>
	                <th>E(误差)</th>
	            </tr>
            </thead>
            <tbody>
	            <tr>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
           		</tr>
            </tbody>
        </table>

        <div class="popup-button">
            <button type="button" class="button_1" onclick="pass(1,2)">通过</button>
            <button type="button" class="button_1" onclick="fail(1,2)">不通过</button>
        </div>

        <table class="tb-content" style='width:400px'>
             <tr>
	                <th>n</th>
	                <th>1</th>
	                <th>2</th>
	                <th>3</th>
	                <th>4</th>
	                <th>5</th>
	                <th>6</th>
	                <th>平均值lx</th>
	        </tr>
      
           
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </table>
		 
		<div class="popup_button">
            <button type="button" class="button_2" onclick="pass(2,2)" >通过</button>
            <button type="button" class="button_2" onclick="fail(2,2)" >不通过</button>
        </div>

    </div>
</div>


<script type="text/javascript">window.onload=infoAjax(2);</script>