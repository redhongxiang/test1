<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录</title>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript">

$(function(){
	 //点击提交按钮验证用户名和密码
	$("#sub").click(function(){
		$.ajax({
			url:"check.php",
			type:"POST",
			data:{"userName":$("#userName").val(),"pwd":$("#pwd").val(),"info":$("#info").val()},
			dataType:"json",
			success: function(data){
			  if(data.status==1){
				  location.href="manage.php";
				  }else{
					  $("#tips").html(data.msg);
					  }
			}
		});
	});
	$("#userName").focus(function(){
		$("#tips").html("");
		});
	$("#pwd").focus(function(){
		$("#tips").html("");
		});
		
	//onload验证cookie
	var userName=$.cookie("userName");
	var pwd=$.cookie("pwd");
	if(userName!="" && pwd!=""){
	  $.ajax({
		  url:"check.php",
		  type:"POST",
		 data:{"userName":userName,"pwd":pwd},
		 dataType:"json",
		 success: function(data){
			 if(data.status==1){
				 location.href="manage.php";
				 }
			 }
		  });	
	}
});
</script>
<style>
body{
	font:12px/1.5em 微软雅黑;
}
span{
	display:block;
	height:24px;
	color:#f00;
}
</style>
</head>

<body>
<span id="tips"></span><br>
<label for="userName">用户名:</label>
<input type="text" id="userName"><br>
<label for="pwd">密码:</label>
<input type="password" id="pwd"><br>

<input type="checkbox" id="info" value="yes">十天免登录
<br>
<input type="button" id="sub" value="登录">
</body>
</html>