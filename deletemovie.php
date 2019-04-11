<?php
	include 'header.php';
	//1、接收电影编号
	$id = isset($_GET['id'])?$_GET['id']:0;
	//2、连接数据库
	include 'models/linkMysqli--object.php';
	//3、执行sql
	$delete_sql = "delete from movies where movieid=?";
	$stmt = $linker->prepare($delete_sql);//预处理
	$stmt->bind_param('i',$id);//绑定参数
	$delete_res = $stmt->execute();//执行
	if($delete_res){
		echo "<script>alert('删除成功！');location.href='pagemovies.php'</script>";
	}else{
		echo "<script>alert('删除失败！');location.href='pagemovies.php'</script>";
	}
	//4、关闭结果集和数据库
	$delete_res->free();
	$linker->colse();
?>