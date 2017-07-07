<?php
	if(!defined('templates')) exit();
	//防止恶意调用

?>

<script type="text/javascript" src="./templates/default/js/function.js"></script>

<div class="container" name="oscillograph">
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
	                <th>测量正弦波</th>
	                <th>李萨如图像</th>
	                <th>求助次数</th>
	                <th>未通过次数</th>
	                <th>原始数据</th>
	            </tr>
	        </thead>
	        <tbody>
	   			<?php init_info_oscillograph();?>
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
	                <th>Vp-p（标准）</th>
	                <th>f（标准）</th>
	                <th>V/DIV</th>
	                <th>Dy</th>
	                <th>V'p-p</th>
	                <th>Ev</th>
	                <th>TIME/DIV</th>
	                <th>n</th>
	                <th>Dx</th>
	                <th>T'</th>
	                <th>f'</th>
	                <th>Ef</th>
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
                <th>Nx</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Ny</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>fy（hz）</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
		 
		<div class="popup_button">
            <button type="button" class="button_2" onclick="pass(2,2)" >通过</button>
            <button type="button" class="button_2" onclick="fail(2,2)" >不通过</button>
        </div>

    </div>
</div>


<script type="text/javascript">window.onload=infoAjax(2);</script>