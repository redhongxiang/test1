<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
	$userName=$_POST['userName'];
	$pwd=$_POST['pwd'];
	$info=$_POST['info'];
	include("conn.php");
	$rs=mysql_query("select * from users where userName='$userName' and pwd='$pwd'");
	$num=mysql_num_rows($rs);
	if($num>0){
		$_SESSION['login']='success';
		$_SESSION['userName']=$userName;
		if($info=='yes'){
			setcookie("userName",$userName,time()+3600*24*10);
			setcookie("pwd",$pwd,time()+3600*24*10);
			}
	 echo '{"status":"1","msg":"成功"}';
		}else{
			echo '{"status":"0","msg":"用户名或密码不存在"}';
			}
}else{
	header("location:error.php");
}
?>