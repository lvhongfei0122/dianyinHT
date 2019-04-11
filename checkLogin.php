<?php
	//1、使用session储存用户名
	//2、登录的用户名和数据库的信息比对，成功，跳入下一个页面；否则，返回登录
	//开始session会话
	session_start();  
	include 'header.php';
	
	//接收用户信息
	$username = $_POST['userName'];
	$userpwd = $_POST['userPwd'];
	
	//与数据库比对
	include 'models/linkMysqli--object.php';
	
	$select_user_sql = "select count(*) from users where uname=? and upwd=?";
	//mysqli的prepare写法
	$stmt = $linker->prepare($select_user_sql);//预处理
	$stmt->bind_param("ss",$username,$userpwd);//绑定参数
	$stmt->execute();//执行查询
	$stmt->bind_result($rowCount);//把结果绑定到$rowCount上
	$stmt->fetch();//获取查询结果的值
	if($rowCount>0){
		//登陆成功
		//将登陆信息存入session
		$_SESSION['currentUser'] = $username;
		//跳转下一个页面
		header("location:pagemovies.php");
	}else{
		//登陆不成功
		echo "<script>alert('用户名或者密码错误！');location.href='login.html';</script>";
	}
	
?>