<?php
	//1、连接数据库
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','');
	define('DB_NAME','movies');
	$linker = mysqli_connect(DB_HOST,DB_USER,DB_PWD);
	if($linker){
		echo '连接数据库成功';
	}
	//错误处理
	if(mysqli_connect_errno()||mysqli_connect_error()){
		echo '连接数据库失败';
	}

	//2、选择数据库
	$db_selected = mysqli_select_db($linker,DB_NAME);
	if($db_selected){
		echo '选择数据库成功';
	}
	if(mysqli_errno($linker)||mysqli_error($linker)){
		echo '选择数据库失败';
	}
	
	//3、保险起见，设置连接的字符集
	mysqli_set_charset($linker, 'utf8');
?>