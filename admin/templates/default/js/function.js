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
	if( !if_course_time()){
		alert("开课时间最早为上课前半小时！");
		return;
	}
	var user_id = (document.getElementById("uid")).getAttribute("name");
	var experiment_name = document.getElementById("experiment_name");
	obj1 = (obj.getElementsByTagName("span"))[0];
	experiment_name.innerHTML = obj1.innerHTML; 
	experiment_name.setAttribute("name",obj.getAttribute("name"));
	document.getElementById("popup-bg").style.display = "block";

	experiment_name = obj.getAttribute("name");
	// console.log(experiment_name);
	var form_action_name = document.getElementsByClassName("mask-form");

	//如果有课程还在进行则修改action的url
	var obj = createXMLHttpRequest();
	obj.open("GET","./templates/default/infoAjax.php?action=if_cur_course&user_id="+user_id,true);
	obj.onreadystatechange = function(){
		if( obj.readyState == 4 && obj.status == 200){
			var doc = obj.responseText;
			doc = parseJson(doc);
			console.log(doc);
			if( doc['status']=='1'){
				form_action_name[0].setAttribute("action","./index.php");
				return;
			}else{
					//修改该课程的状态
				var xmlobj = createXMLHttpRequest();		
				xmlobj.open("GET","./templates/default/infoAjax.php?action=course_status&course_id="+course_id+"&user_id="+user_id,true);
				xmlobj.send();
				//alert('exp_name: '+experiment_name);
				form_action_name[0].setAttribute("action","./index.php?exp_name="+experiment_name);
			}
		}
	}
	obj.send();


}

function if_course_time(){
	return 1;
}

function if_cur_course(){
	//如果有课程还在进行则必须先关闭该课程
	var user_id = (document.getElementById("uid")).getAttribute("name");
	var experiment_name = (document.getElementById("experiment_name")).getAttribute("name");
	var form_action_name = document.getElementsByClassName("mask-form");
	form_action_name =  form_action_name[0].getAttribute("action");
	// alert('user_id: '+user_id+'\nexp_name: '+experiment_name);
	//console.log(form_action_name);
	if( form_action_name === './index.php'){ 
		alert( "您还有课程未结束！请先结束该课程");
	}else{
		var class_num = (document.getElementById("classNum")).value;
		if(class_num == "") class_num = 'null';

		var obj = createXMLHttpRequest();
		obj.open("GET","./templates/default/infoAjax.php?action=start_course&user_id="+user_id+"&course_name="+experiment_name+"&classNum="+class_num,true);
		obj.send();
		
		form_action_name = document.getElementsByClassName("mask-form");
		console.log(form_action_name);
		form_action_name[1].setAttribute("action","./index.php?exp_name="+experiment_name+"&class_num="+class_num) ;
		// alert('exp_name: '+experiment_name+'\nclass_num: '+class_num);
		// alert('here');
	}
	//开始课程时，对数据库做相应更改

}

function close_course(){
	var experiment_name;
	var user_id = (document.getElementById("uid")).getAttribute("name");

	var xmlobj = createXMLHttpRequest();
	xmlobj.open("GET","./templates/default/infoAjax.php?action=cur_course_name&user_id="+user_id,false);
	xmlobj.onreadystatechange = function(){
		if( xmlobj.readyState == 4 && xmlobj.status == 200){
			//alert('here');
			experiment_name = xmlobj.responseText;
			//alert("experiment_name:"+experiment_name);
		}
	}
	xmlobj.send();

	console.log(experiment_name);
	// alert('user_id: '+user_id+'\nexp_name: '+experiment_name);
	if(confirm('要结束当前课程并保存实验数据吗？')){
		var obj = createXMLHttpRequest();
		obj.open("GET","./templates/default/infoAjax.php?action=close_course&user_id="+user_id+"&course_name="+experiment_name,true);
		obj.onreadystatechange = function(){
			//alert(obj.readyState);
			if( obj.readyState == 4 && obj.status == 200){
				var data = obj.responseText;
				//console.log(data);
				if( data == 1){
					alert('提交成功');
					window.location.href = "./index.php";
				}
				else alert('提交失败');		
			}
		}
		obj.send();
	}
}

//关闭课程确认窗口
function close_popup(){
	document.getElementById("popup-bg").style.display="none";
}

function search_close_popup(){
	var node = document.getElementById("popup-bg");
	node.parentNode.removeChild(node);
}

function close_popup_adduser(){
	document.getElementById("popup-bg-adduser").style.display="none";
}

function close_popup_result(){
	var div_rm = (document.getElementById("search-popup-bg")).parentNode;
	var body = document.getElementsByTagName("body")[0];
	body.removeChild(div_rm);
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
					bt[0].style.background = "#f0f2f0";
					bt[0].style.cursor="pointer";
					bt[1].removeAttribute("disabled");
					bt[1].style.background = "#f0f2f0";
					bt[1].style.cursor="pointer";
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

function change_pwd(){
	document.getElementById("popup-changepwd").style.display="block";
}

function changepwd_submit(){
	var user_id = (document.getElementById("uid")).getAttribute("name");
	var old_pwd = document.getElementById("old_pwd").value;
	var new_pwd = document.getElementById("new_pwd").value;
	var pwd_check = document.getElementById("pwd_check").value;

	if(old_pwd=="" || new_pwd==""  || pwd_check=="") {
		alert("输入不能为空！");
	}else if(new_pwd !== pwd_check){
		alert("两次输入不一致，请重新输入");
	}else{
		var obj = createXMLHttpRequest();
		obj.open("GET","./templates/default/infoAjax.php?action=change_pwd&user_id="+user_id+"&old_pwd="+old_pwd+"&new_pwd="+new_pwd,true);
		obj.onreadystatechange = function(){
			if( obj.readyState == 4 && obj.status == 200){
			//	alert(obj.responseText);
				if (obj.responseText==1){
					alert("修改成功");
					 close_popup_changepwd();
				}else{
					alert('旧密码错误');
				}
			}
		}
		obj.send();
	}
}

function close_popup_changepwd(){
	document.getElementById("popup-changepwd").style.display="none";
}

function detail_via_stu_num(this_node){
	var stu_num = document.getElementsByClassName('flag_stu_num')[0];
		stu_num = stu_num.innerHTML;


	var exp_name = (this_node.parentNode.parentNode)
		exp_name = exp_name.getElementsByClassName('exp_name')[0];
		exp_name = exp_name.getAttribute("name");


	var obj = createXMLHttpRequest();
		obj.open("GET","./templates/default/infoAjax.php?action=show_detail_via_stu_num&stu_num="+stu_num+"&exp_name="+exp_name);
		obj.onreadystatechange = function(){
			if( obj.readyState == 4 && obj.status == 200){
				var detail = document.createElement("div");
				    detail.innerHTML = obj.responseText;
				var body = document.getElementsByTagName("body");
				body[0].appendChild(detail);
				//ocument.write(obj.responseText);
			}
		}
	obj.send();
}

function detail_via_date(this_node){
	var exp_time = (this_node.parentNode.parentNode)
		exp_time = exp_time.getElementsByClassName('exp_time')[0];
		exp_time = exp_time.getAttribute("name");


	var exp_name = (this_node.parentNode.parentNode)
		exp_name = exp_name.getElementsByClassName('exp_name')[0];
		exp_name = exp_name.getAttribute("name");

	var obj = createXMLHttpRequest();
		obj.open("GET","./templates/default/infoAjax.php?action=show_detail_via_date&exp_time="+exp_time+"&exp_name="+exp_name);
		obj.onreadystatechange = function(){
			if( obj.readyState == 4 && obj.status == 200){
				var detail = document.createElement("div");
				    detail.innerHTML = obj.responseText;
				var body = document.getElementsByTagName("body");
				body[0].appendChild(detail);
				//ocument.write(obj.responseText);
			}
		}
	obj.send();
}

function admin_change_pwd(node){
	var user_name = node.parentNode.parentNode.getElementsByTagName('td')[1];
		user_name = user_name.innerHTML;
	var number = node.parentNode.parentNode.getElementsByTagName('td')[0];
		number = number.innerHTML; 
	var new_pwd = prompt("为用户"+user_name+"设置新密码：");
	if(new_pwd != null ){

		var obj = createXMLHttpRequest();
			obj.open("GET","./templates/default/infoAjax.php?action=admin_change_pwd&new_pwd="+new_pwd+"&number="+number);
			obj.onreadystatechange = function(){
				if( obj.readyState == 4 && obj.status == 200){
					if( obj.responseText == 1){
						alert('修改成功');
						window.location.href = './index.php?user_manage=true';
					}
				}
			}
		obj.send();
	}

}

function admin_delete_user(node){
	var user_name = node.parentNode.parentNode.getElementsByTagName('td')[1];
		user_name = user_name.innerHTML;
	var number = node.parentNode.parentNode.getElementsByTagName('td')[0];
		number = number.innerHTML; 
	if(confirm('确定要从系统中删除用户'+user_name+"吗？")){
		var obj = createXMLHttpRequest();
		obj.open("GET","./templates/default/infoAjax.php?action=admin_delete_user&number="+number);
		obj.onreadystatechange = function(){
			if( obj.readyState == 4 && obj.status == 200){
				// console.log(obj.responseText);
				if( obj.responseText == 1){
					alert('操作成功');
					window.location.href = './index.php?user_manage=true';
				}
			}
		}
		obj.send();
	}
}

function add_user(){
	document.getElementById('popup-bg-adduser').style.display = "block";
}

function add_user_submit(){
	var number = document.getElementById("number").value;
	var user_name = document.getElementById("added_user_name").value;	
	var pwd = document.getElementById("pwd").value;

	var obj = createXMLHttpRequest();
		obj.open("GET","./templates/default/infoAjax.php?action=add_user&number="+number+"&user_name="+user_name+"&pwd="+pwd);
		obj.onreadystatechange = function(){
			if( obj.readyState == 4 && obj.status == 200){
				 console.log(obj.responseText);
				if( obj.responseText == 1){
					alert('添加成功');
					window.location.href = './index.php?user_manage=true';
				}
			}
		}
	obj.send();

}