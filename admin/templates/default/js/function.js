/*js函数库*/


//找出要开启的课程
function startCourse(number){
	var obj = document.getElementById("experiment_name");
	switch(number){
		case 1: 
			obj.innerHTML = "示波器与李萨如图形";
			break;
		case 2:
			obj.innerHTML = "实验二";
			break;
		case 3:
			obj.innerHTML = "实验三";
			break;
		case 4:
			obj.innerHTML = "实验四";
			break;
		case 5:
			obj.innerHTML = "实验五";
			break;
		case 6:
			obj.innerHTML = "实验六";
			break;
	}
	document.getElementById("popup-bg").style.display = "block";
}

//关闭课程确认窗口
function close_popup(){
	document.getElementById("popup-bg").style.display="none";
}

function createXMLHttpRequest(){
	var obj;
	if(window.ActiveXObject){
		obj = new ActiveXObject("Microsoft.XMLHTTP");
	}else if(window.XMLHttpRequest){
		obj = new XMLHttpRequest();
	}
	return obj;
}

//自定义删除所有子节点
function removeAllChild(node)
{
    while(node.hasChildNodes()) //当div下还存在子节点时 循环继续
    {
        node.removeChild(node.firstChild);
    }
}

//实时刷新后台数据
function infoAjax(flag1, flag2){
	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./infoXML.php?exp=true",true);
	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
	
			//处理新提交的条目
			var xml_doc = xmlobj.responseXML;
			var node_list = xml_doc.getElementsByTagName("student");
			//console.log(node_list[1]);
			var tr = document.getElementsByClassName("cur_data")[0];
			tr = tr.getElementsByTagName("tr");
			//console.log(tr[1]);
			var tag = new Array('stunum','name','status1','status2','helptimes','failtimes');
			if( node_list.length!=0 ){
				for( var i = 0; i<node_list.length; i++){
					var td = tr[i+1].getElementsByTagName("td");
					//console.log(td);
					for( var j = 1; j<=6; j++){
						td[j].innerHTML = node_list[i].getElementsByTagName(tag[j-1])[0].innerHTML;
					}
				}
			}
	
			//处理等待评测的组号
			var evaluating = xml_doc.getElementsByTagName("evaluating");
			var len = evaluating.length;
			var count = document.getElementsByClassName("count_evaluating");
			count[0].innerHTML = len;
			var li_operation = (document.getElementsByClassName("evaluating"))[0].getElementsByClassName("group_list")[0];
			removeAllChild(li_operation);		//删除所有子节点
			var i;
			for(i = 0; i < len; i++){
				var new_a = document.createElement("a");
				new_a.setAttribute("href","javascript:void(0)");
				new_a.innerHTML = evaluating[i].innerHTML;
				var new_li = document.createElement("li");
				new_li.setAttribute("title","详情");
				new_li.setAttribute("onclick","show_detail_widget(this)");
				new_li.appendChild(new_a);
				if(flag1===0 && i >= 4){
					new_li.style.display = "none";
				}
				li_operation.appendChild(new_li);
			}
			var new_a = document.createElement("a");
			new_a.setAttribute("href","javascript:void(0)");
			var new_li = document.createElement("li");
			new_li.setAttribute("onclick","eval_spread()");
			if(flag1===1) {
				new_a.innerHTML = "<span class='option_symbol'> << </span>";
				new_li.setAttribute("title","收起");
				new_li.setAttribute("onclick","eval_fold_up()");
			}else{
				new_a.innerHTML = "<span class='option_symbol'> >> </span>";
				new_li.setAttribute("title","展开");
			}
			new_li.appendChild(new_a);
			li_operation.appendChild(new_li);

			//处理求助信息
			var help = xml_doc.getElementsByTagName("help");
			var len_help = help.length;
			var count_help = document.getElementsByClassName("count_help");
			count_help[0].innerHTML = len_help;
			var li_operation_help = (document.getElementsByClassName("help"))[0].getElementsByClassName("group_list")[0];
			removeAllChild(li_operation_help);	
			for(i = 0; i < len_help; i++){
			    new_a = document.createElement("a");
				new_a.setAttribute("href","javascript:void(0)");
				new_a.innerHTML = help[i].innerHTML;
				new_li = document.createElement("li");
				new_li.setAttribute("title","详情");
				new_li.setAttribute("onclick","solve_help(flag1,flag2,this)");
				new_li.appendChild(new_a);
				if(flag2===0 && i >= 4){
					new_li.style.display = "none";
				}
				li_operation_help.appendChild(new_li);
			}
			var new_a = document.createElement("a");
			new_a.setAttribute("href","javascript:void(0)");
			var new_li = document.createElement("li");
			new_li.setAttribute("onclick","help_spread()");
			if(flag2===1) {
				new_a.innerHTML = "<span class='option_symbol'> << </span>";
				new_li.setAttribute("title","收起");
				new_li.setAttribute("onclick","help_fold_up()");
			}else{
				new_a.innerHTML = "<span class='option_symbol'> >> </span>";
				new_li.setAttribute("title","展开");
			}
			new_li.appendChild(new_a);
			li_operation_help.appendChild(new_li);

		}
	}

	setTimeout("infoAjax(flag1,flag2)",4000);
	xmlobj.send();
}

//展开列表
function eval_spread(){
	var count = document.getElementsByClassName("count_evaluating")[0].innerHTML;
	var group_list = (document.getElementsByClassName("evaluating")[0]).getElementsByClassName("group_list");
	li = group_list[0].getElementsByTagName("li");
	group_list[0].removeChild(li[count]);	//先删除末尾的“展开”符号节点
	if(count >= 5){
		for(var i = 4; i<count; i++){
			li[i].style.display = "block";
		}
	}
	var new_a = document.createElement("a");
	new_a.setAttribute("href","javascript:void(0)");
	var new_li = document.createElement("li");
	new_a.innerHTML = "<span class='option_symbol'> << </span>";
	new_li.setAttribute("title","收起");
	new_li.setAttribute("onclick","eval_fold_up()");
	new_li.appendChild(new_a);
	group_list[0].appendChild(new_li);
	flag1 = 1;
}

//收起列表
function eval_fold_up(){
	var count = document.getElementsByClassName("count_evaluating")[0].innerHTML;
	var group_list = (document.getElementsByClassName("evaluating")[0]).getElementsByClassName("group_list");
	li = group_list[0].getElementsByTagName("li");
	if(count >= 4){
		group_list[0].removeChild(li[count]);	//先删除末尾的“展开”符号节点
		for(var i = 4; i<count; i++){
			li[i].style.display = "none";
		}
	}
	var new_a = document.createElement("a");
	new_a.setAttribute("href","javascript:void(0)");
	var new_li = document.createElement("li");
	new_a.innerHTML = "<span class='option_symbol'> >> </span>";
	new_li.setAttribute("title","展开");
	new_li.setAttribute("onclick","eval_spread()");
	new_li.appendChild(new_a);
	group_list[0].appendChild(new_li);
	flag1 = 0;
}
 
function help_spread(){
	var count = document.getElementsByClassName("count_help")[0].innerHTML;
	var group_list = (document.getElementsByClassName("help")[0]).getElementsByClassName("group_list");
	li = group_list[0].getElementsByTagName("li");
	group_list[0].removeChild(li[count]);	//先删除末尾的“展开”符号节点
	if(count >= 4){
		for(var i = 4; i<count; i++){
			li[i].style.display = "block";
		}
	}
	var new_a = document.createElement("a");
	new_a.setAttribute("href","javascript:void(0)");
	var new_li = document.createElement("li");
	new_a.innerHTML = "<span class='option_symbol'> << </span>";
	new_li.setAttribute("title","收起");
	new_li.setAttribute("onclick","help_fold_up()");
	new_li.appendChild(new_a);
	group_list[0].appendChild(new_li);
	flag2 = 1;

}


function help_fold_up(){
	var count = document.getElementsByClassName("count_help")[0].innerHTML;
	var group_list = (document.getElementsByClassName("help")[0]).getElementsByClassName("group_list");
	li = group_list[0].getElementsByTagName("li");
	group_list[0].removeChild(li[count]);	//先删除末尾的“展开”符号节点
	if(count >= 5){
		for(var i = 4; i<count; i++){
			li[i].style.display = "none";
		}
	}
	var new_a = document.createElement("a");
	new_a.setAttribute("href","javascript:void(0)");
	var new_li = document.createElement("li");
	new_a.innerHTML = "<span class='option_symbol'> >> </span>";
	new_li.setAttribute("title","展开");
	new_li.setAttribute("onclick","help_spread()");
	new_li.appendChild(new_a);
	group_list[0].appendChild(new_li);
	flag2 = 0;
}

//json解释器,适合接近w3c标准的浏览器
function parseJson(str){
 	return JSON.parse(str);
}

//显示学生的详细信息
function show_detail_table(obj){
	var li = obj.parentNode.parentNode.getElementsByTagName("td");
	var stu_num = li[1].innerHTML;
	if(stu_num == ""){
		alert("该组没有学生！");
		return;
	}else{
		show_detail_option(li);
	} 
}

function show_detail_widget(obj){
	var group_num = (obj.getElementsByTagName("a"))[0].innerHTML;
	var li = document.getElementById("cur_data");
	li = li.getElementsByTagName("tbody");
	li = li[0].getElementsByTagName("tr");
	li = li[group_num-1].getElementsByTagName("td");
	show_detail_option(li);
}

function show_detail_option(li){
	var popup_bg = document.getElementById("popup-bg");
	popup_bg.style.display = "block";
	(document.getElementById("group_num")).innerHTML = li[0].innerHTML;
	(document.getElementById("stu_name")).innerHTML = li[2].innerHTML;
	(document.getElementById("stu_num")).innerHTML = li[1].innerHTML;

	var group_num = (document.getElementById("group_num")).innerHTML;
	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./infoAjax.php?action=detail_data&group_num="+group_num,true);
	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
			var result = xmlobj.responseText;
			result = parseJson(result);
			//console.log(result);

			if( result['status_1'] != '2'){
				var bt = document.getElementsByClassName("button_1");
				bt[0].setAttribute("disabled","disabled");
				bt[0].style.background = "#fff";
				bt[1].setAttribute("disabled","disabled");
				bt[1].style.background = "#fff";
			}
			if( result['status_2'] != '2'){
				var bt = document.getElementsByClassName("button_2");
				bt[0].setAttribute("disabled","disabled");
				bt[0].style.background = "#fff";
				bt[1].setAttribute("disabled","disabled");
				bt[1].style.background = "#fff";
			}
			var tb = document.getElementsByClassName("tb-content");
			
			td = tb[0].getElementsByTagName("td");
			td[0].innerHTML = result['v_std'];
			td[1].innerHTML = result['f_std'];
			td[2].innerHTML = result['V_DIV'];
			td[3].innerHTML = result['Dy'];
			td[4].innerHTML = result['v_up'];
			td[5].innerHTML = result['E_v'];
			td[6].innerHTML = result['TIME_DIV'];
			td[7].innerHTML = result['n'];
			td[8].innerHTML = result['Dx'];
			td[9].innerHTML = result['T'];
			td[10].innerHTML = result['f_up'];
			td[11].innerHTML = result['E_f'];

			td = tb[1].getElementsByTagName("td");
			td[0].innerHTML = result['Nx1'];
			td[1].innerHTML = result['Nx2'];
			td[2].innerHTML = result['Nx3'];
			td[3].innerHTML = result['Nx4'];
			td[4].innerHTML = result['Ny1'];
			td[5].innerHTML = result['Ny2'];
			td[6].innerHTML = result['Ny3'];
			td[7].innerHTML = result['Ny4'];
			td[8].innerHTML = result['fy1'];
			td[9].innerHTML = result['fy2'];
			td[10].innerHTML = result['fy3'];
			td[11].innerHTML = result['fy4'];
		}
	}
	xmlobj.send();

}

function pass(flag1,flag2,option){
	var group_num = (document.getElementById("group_num")).innerHTML;
//	console.log(group_num);
	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./infoAjax.php?action=pass&group_num="+group_num+"&option="+option,true);
	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
			var result = xmlobj.responseText;
			result = parseJson(result);
			//console.log(result);
			if( result['status'] == '1'){
				alert("提交成功！");
				infoAjax(flag1,flag2);			//提交后刷新一次
				var del = document.getElementById("popup-bg");
				del.style.display = "none";
			}else{ 
				alert("提交失败！");
			}
		}
	}
	xmlobj.send();
}

function fail(flag1,flag2,option){
	var group_num = (document.getElementById("group_num")).innerHTML;
	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./infoAjax.php?action=fail&group_num="+group_num+"&option="+option,true);
	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
			var result = xmlobj.responseText;
			result = parseJson(result);
			if( result['status'] == '1'){
				alert("提交成功！");
				infoAjax(flag1,flag2);			//提交后刷新一次
				var del = document.getElementById("popup-bg");
				del.style.display = "none";	
			}else{ 
				alert("提交失败！");
			}
		}
	}
	xmlobj.send();
}

function solve_help(flag1,flag2,obj){
	var group_num = (obj.getElementsByTagName("a"))[0].innerHTML;
	var msg = confirm("受理该请求吗?");
	if(msg){
		var xmlobj = createXMLHttpRequest();
		xmlobj.open("GET","./infoAjax.php?action=solve_help&group_num="+group_num,true);
		xmlobj.onreadystatechange = function(){
			infoAjax(flag1,flag2);
		}
		xmlobj.send();
	}
}