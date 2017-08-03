<?php
	if(!defined('templates')) exit();
	//防止恶意调用

?>

<script type="text/javascript" src="./templates/default/js/function.js"></script>




	<div class="container" name="thermal_conductivity">
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
		                <th>温度示值</th>
		                <th>尺寸和质量</th>
		                <th>求助次数</th>
		                <th>未通过次数</th>
		                <th>原始数据</th>
		            </tr>
		        </thead>
		        <tbody>
		   			<?php init_info_thermal_conductivity();?>
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

			<div class="table_titile">一、铜盘在T2附近自然冷却时的温度示值</div>

	        <div class="detail-info-div">
	           
		            <div>
		                <span>稳态时的温度示值</span>
					    <span>高温T1=  </span>
					    <span>低温T2=  </span>
		            </div>
	           
		            <div>
		                <span>次序</span>
		                <span>1</span>
		                <span>2</span>
		                <span>3</span>
		                <span>4</span>
		                <span>5</span>
		                <span>6</span>
		                <span>7</span>
		                <span>8</span>
		                <span>9</span>
		                <span>10</span>
	           		</div>

	           		<div>
		                <span>时间t/s</span>
		                <span></span>
		                <span></span>
		                <span></span>
		                <span></span>
		                <span></span>
		                <span></span>
		                <span></span>
		                <span></span>
		                <span></span>
		                <span></span>
	           		</div>
						
					<tr>
		                <th>温度示值T/C</th>
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

	        </div>
	           		<p>温度变化率：</p>      

	        <div class="popup_button">
	            <button type="button" class="button_1" onclick="pass(1,2)">通过</button>
	            <button type="button" class="button_1" onclick="fail(1,2)" style="margin-right: 35px">不通过</button>
	        </div>

 			<div class="table_titile">二、几何尺寸和质量的测量</div>

	        <div class="tb-content" style='width:400px'>
	            <tr>
	                <th>次序</th>
	                <td>1</td>
	                <td>2</td>
	                <td>3</td>
	                <td>4</td>
	                <td>5</td>
	                <td>6</td>
	                <td>平均</td>
	            </tr>
	            <tr>
	                <th>样品盘B</th>
	                <th>厚度hB/cm</th>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	            </tr>

	            <tr>
	             	<th style="border-top: 0"></th>
	                <th>直径dB/cm</th>
	                <td></td>
	            </tr>

	             <tr>
	                <th>散热铜盘C</th>
	                <th>厚度hC/cm</th>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	            </tr>

	             <tr>
	             	<th style="border-top: 0"></th>
	                <th>直径dC/cm</th>
	                <td></td>
	            </tr>

	             <tr>
	             	<th style="border-top: 0"></th>
	                <th>质量m/g</th>
	                <td></td>
	            </tr>


	        </div>
			 
			<div class="popup_button">
	            <button type="button" class="button_2" onclick="pass(2,2)" >通过</button>
	            <button type="button" class="button_2" onclick="fail(2,2)" style="margin-right: 135px">不通过</button>
	        </div>

	    </div>
	</div>
	
<div class="body1">
	<div class="body-bg-1"></div>
</div><!--end body1-->


<script type="text/javascript">window.onload=infoAjax(2);</script>