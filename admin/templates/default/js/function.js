/*js函数库*/


//要开启的课程的名称
function createXMLHttpRequest(){
	var obj;
	if(window.ActiveXObject){
		obj = new ActiveXObject("Microsoft.XMLHTTP");
	}else if(window.XMLHttpRequest){
		obj = new XMLHttpRequest();
	}
	return obj;
}

function startCourse(obj,course_id){
	var user_id = (document.getElementById("uid")).getAttribute("name");
	var experiment_name = document.getElementById("experiment_name");
	experiment_name.innerHTML = obj.innerHTML; 
	document.getElementById("popup-bg").style.display = "block";
	experiment_name = obj.getAttribute("name");
	// console.log(experiment_name);
	form_action_name = document.getElementsByClassName("mask-form");

	var xmlobj = createXMLHttpRequest();		//修改该课程的状态
	xmlobj.open("GET","./templates/default/infoAjax.php?action=course_status&course_id="+course_id+"&user_id="+user_id,true);
	xmlobj.send();

	form_action_name[0].setAttribute("action","./index.php?exp_name="+experiment_name);
}

//关闭课程确认窗口
function close_popup(){
	document.getElementById("popup-bg").style.display="none";
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
function infoAjax(status_count){
	var exp_name = (document.getElementsByClassName("container"))[0].getAttribute("name");
	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./templates/default/infoXML.php?exp=true&exp_name="+exp_name+"&status_count="+status_count,true);

	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
	
			//处理新提交的条目
			var xml_doc = xmlobj.responseXML;
			var node_list = xml_doc.getElementsByTagName("student");
			var tr = document.getElementsByClassName("cur_data")[0];
			tr = tr.getElementsByTagName("tr");
		
			var tag = new Array();			//按照status的个数给数组进行赋值
			tag[0] = 'stunum';
			tag[1] = 'name';
			for( var i = 1; i <= status_count; i++){
				tag[i+1] = 'status'+i;
			}
			tag[i+1] = 'helptimes';
			tag[i+2] = 'failtimes';
			var len_tag = i+2+1;
		//alert('here');
		//console.log(xml_doc);
			if( node_list.length!=0 ){
				for( var i = 0; i<node_list.length; i++){
					var td = tr[i+1].getElementsByTagName("td");
					//console.log(td);
					for( var j = 1; j<=len_tag; j++){
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
					new_li.setAttribute("onclick","show_detail_widget(this,"+status_count+")");
					new_li.appendChild(new_a);
				var flag1 = (document.getElementsByClassName('group_list'))[0].getAttribute('name');	//从name属性获取标记的值
				//console.log(flag1);
				if(flag1==0 && i > 3){
					new_li.style.display = "none";
				}
				li_operation.appendChild(new_li);
			}

			if(i-1<=3){
				for(var j=i; j<=3; j++){
					var new_li = document.createElement("li");		//创建空的li
					li_operation.appendChild(new_li);
				}
			}

			var new_a = document.createElement("a");
			new_a.setAttribute("href","javascript:void(0)");
			var new_li = document.createElement("li");
			new_li.setAttribute("onclick","eval_spread()");
			if(flag1==1) {
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
			var li_operation_help = document.getElementsByClassName("group_list")[1];
			removeAllChild(li_operation_help);	
			for(i = 0; i < len_help; i++){
			    new_a = document.createElement("a");
				new_a.setAttribute("href","javascript:void(0)");
				new_a.innerHTML = help[i].innerHTML;
				new_li = document.createElement("li");
				new_li.setAttribute("title","受理这条信息");
				new_li.setAttribute("onclick","solve_help(this,"+status_count+")");
				new_li.appendChild(new_a);
			var flag2 = (document.getElementsByClassName("group_list"))[1].getAttribute("name");
				if(flag2==0 && i > 3){
					new_li.style.display = "none";
				}
				li_operation_help.appendChild(new_li);
			}

			if(i-1 <=3){
				for(var j=i; j<=3; j++){
					var new_li = document.createElement("li");		//创建空的li
					li_operation_help.appendChild(new_li);
				}
			}

			var new_a = document.createElement("a");
			new_a.setAttribute("href","javascript:void(0)");
			var new_li = document.createElement("li");
			new_li.setAttribute("onclick","help_spread()");
			if(flag2==1) {
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

	setTimeout("infoAjax("+status_count+");",4000);
	xmlobj.send();
}

//展开列表
function eval_spread(){
	var count = document.getElementsByClassName("count_evaluating")[0].innerHTML;
	
	(document.getElementsByClassName("group_list"))[0].setAttribute("name","1");
	
	if(count<=4){
		var li = (document.getElementsByClassName("group_list"))[0].lastChild;
		li.setAttribute("onclick","eval_fold_up()");
		li.setAttribute('title','收起');
		var a = (li.getElementsByTagName("a"))[0];
		a.innerHTML = "<span class='option_symbol'> << </span>";	
		return;
	}

	var group_list = document.getElementsByClassName("group_list");
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
}

//收起列表
function eval_fold_up(){
	var count = document.getElementsByClassName("count_evaluating")[0].innerHTML;

	(document.getElementsByClassName("group_list"))[0].setAttribute("name","0");
	
	if(count<=4){
		var li = (document.getElementsByClassName("group_list"))[0].lastChild;
			li.setAttribute("onclick","eval_spread()");
		li.setAttribute('title','展开');
		var a = (li.getElementsByTagName("a"))[0];
		a.innerHTML = "<span class='option_symbol'> >> </span>";
		return;
	}

	var group_list = document.getElementsByClassName("group_list");
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

}
 
function help_spread(){
	var count = document.getElementsByClassName("count_help")[0].innerHTML;
	var group_list = (document.getElementsByClassName("help")[0]).getElementsByClassName("group_list");
	li = group_list[0].getElementsByTagName("li");

	(document.getElementsByClassName("group_list"))[1].setAttribute("name","1");

	if(count<=4){
		var li = (document.getElementsByClassName("group_list"))[1].lastChild;
		li.setAttribute("onclick","help_fold_up()");
		li.setAttribute('title','收起');
		var a = (li.getElementsByTagName("a"))[0];
		a.innerHTML = "<span class='option_symbol'> << </span>";
		return;
	}

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
	
}


function help_fold_up(){
	var count = document.getElementsByClassName("count_help")[0].innerHTML;
	var group_list = document.getElementsByClassName("group_list");
	li = group_list[1].getElementsByTagName("li");

	(document.getElementsByClassName("group_list"))[1].setAttribute("name","0");

	if(count<=4){
		var li = (document.getElementsByClassName("group_list"))[1].lastChild;
		li.setAttribute("onclick","help_spread()");
		li.setAttribute('title','展开');
		var a = (li.getElementsByTagName("a"))[0];
		a.innerHTML = "<span class='option_symbol'> >> </span>";
		return;
	}

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
}

//json解释器,适合接近w3c标准的浏览器
function parseJson(str){
 	return JSON.parse(str);
}

//显示学生的详细信息
function show_detail_table(obj,status_count){
	var li = obj.parentNode.parentNode.getElementsByTagName("td");
	var stu_num = li[1].innerHTML;
	if(stu_num == ""){
		alert("该组没有学生！");
		return;
	}else{
		show_detail_option(li,status_count);
	} 
}

function show_detail_widget(obj,status_count){

	var group_num = (obj.getElementsByTagName("a"))[0].innerHTML;
	var li = document.getElementById("cur_data");
	li = li.getElementsByTagName("tbody");
	li = li[0].getElementsByTagName("tr");
	li = li[group_num-1].getElementsByTagName("td");
	show_detail_option(li,status_count);
}

function show_detail_option(li,status_count){
	var exp_name = (document.getElementsByClassName("container")[0]).getAttribute("name");
	var popup_bg = document.getElementById("popup-bg");
	popup_bg.style.display = "block";
	(document.getElementById("group_num")).innerHTML = li[0].innerHTML;
	(document.getElementById("stu_name")).innerHTML = li[2].innerHTML;
	(document.getElementById("stu_num")).innerHTML = li[1].innerHTML;

	var group_num = (document.getElementById("group_num")).innerHTML;
	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./templates/default/infoAjax.php?action=detail_data&group_num="+group_num+"&exp_name="+exp_name,true);
	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
			var result = xmlobj.responseText;
			//console.log(result);
			result = parseJson(result);

			for( var i = 1; i<=status_count; i++){
				//alert(result['status_'+i]);
				//console.log("button_"+i);
				var bt = document.getElementsByClassName("button_"+i);
				
				if( result['status_'+i] != 2){
					//console.log('不可用');
					bt[0].setAttribute("disabled","true");
					bt[0].style.background = "#fff";
					bt[1].setAttribute("disabled","true");
					bt[1].style.background = "#fff";
				}else{
					//console.log('可用');
					bt[0].removeAttribute("disabled");
					bt[0].style.background = "buttonface";
					bt[1].removeAttribute("disabled");
					bt[1].style.background = "buttonface";
				}
			}

			exp_name = (document.getElementsByClassName("container"))[0].getAttribute("name");
			if(exp_name=='oscillograph'){
				show_detail_oscillograph(result);
			}

		}
	}
	xmlobj.send();

}

function show_detail_oscillograph(result){
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

function pass(option,status_count){
	var exp_name = (document.getElementsByClassName("container"))[0].getAttribute("name");
	var group_num = (document.getElementById("group_num")).innerHTML;
//	console.log(group_num);
	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./templates/default/infoAjax.php?action=pass&group_num="+group_num+"&option="+option+"&exp_name="+exp_name,true);
	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
			var result = xmlobj.responseText;
			result = parseJson(result);
			//console.log(result);
			if( result['status'] == '1'){
				alert("提交成功！");
				infoAjax(status_count);			//提交后刷新一次
				var del = document.getElementById("popup-bg");
				del.style.display = "none";
			}else{ 
				alert("提交失败！");
			}
		}
	}
	xmlobj.send();
}

function fail(option,status_count){
	var exp_name = (document.getElementsByClassName("container"))[0].getAttribute("name");
	var group_num = (document.getElementById("group_num")).innerHTML;
	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./templates/default/infoAjax.php?action=fail&group_num="+group_num+"&option="+option+"&exp_name="+exp_name,true);
	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
			var result = xmlobj.responseText;
			//console.log(result);
			result = parseJson(result);
			if( result['status'] == '1'){
				alert("提交成功！");
				infoAjax(status_count);			//提交后刷新一次
				var del = document.getElementById("popup-bg");
				del.style.display = "none";	
			}else{ 
				alert("提交失败！");
			}
		}
	}
	xmlobj.send();
}

function solve_help(obj,status_count){
	var exp_name = (document.getElementsByClassName("container"))[0].getAttribute("name");
	var group_num = (obj.getElementsByTagName("a"))[0].innerHTML;
	var msg = confirm("受理该请求吗?");
	if(msg){
		var xmlobj = createXMLHttpRequest();
		xmlobj.open("GET","./templates/default/infoAjax.php?action=solve_help&group_num="+group_num+"&exp_name="+exp_name,true);
		xmlobj.onreadystatechange = function(){
			if( xmlobj.readyState == 4 && xmlobj.status == 200){
				infoAjax(status_count);
			}
		}
		xmlobj.send();
	}
}