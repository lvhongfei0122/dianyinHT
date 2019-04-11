<?php
//1、连接数据库
	$dsn = "mysql:host=localhost;dbname=school;port=3306;charset=utf8";
	$username = 'root';
	$password = '';
	
	try{
		$pdo = new PDO($dsn,$username,$password);
		//设置属性
		//异常处理方式
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//结果输出形式：关联数组
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		//PDOException类，存放异常信息
		die('连接数据库失败，错误信息：'.$e->getMessage() );
	}
?>