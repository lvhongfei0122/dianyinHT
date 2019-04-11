<?php
	//1、连接数据库
	/*
	 $server = 'localhost';
	 $user = 'root';
	 $password = '';
	 */
	//定义常量
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','');
	define('DB_NAME','school');
	
	$linker = @mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('错误信息：'.mysql_error());
	//@如果出错了，不要出现任何警告，直接忽略掉
	//mysql_error()输出错误信息
	//die()函数之前，先试着连接数据库，如果出错，终止连接。
	if($linker){
		echo '连接数据库成功';
	}else{
		echo '连接数据库失败';
	}
	//2、选择数据库
	$db_selected = mysql_select_db(DB_NAME,$linker);
	if($db_selected){
		echo '选择数据库成功';
	}
	//mysql_query("use school",$linker);
	
	//3、保险起见，设置连接的字符集
	mysql_query("set names utf8",$linker);
?>