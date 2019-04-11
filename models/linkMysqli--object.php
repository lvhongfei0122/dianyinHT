<?php
	//1、连接数据库
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','');
	define('DB_NAME','movie');
	$linker = new mysqli(DB_HOST,DB_USER,DB_PWD);
// 	if($linker){
// 		echo '连接数据库成功';
// 	}
	//错误处理
	if($linker->connect_error){
		echo '连接数据库失败';
	}

	//2、选择数据库
	$db_selected = $linker->select_db(DB_NAME);
// 	if($db_selected){
// 		echo '选择数据库成功';
// 	}
	if($linker->error||$linker->errno){
		echo '选择数据库失败';
	}
	
	//3、保险起见，设置连接的字符集
	$linker->set_charset('utf8');
?>