<?php
	include 'header.php';
	$movieid = isset($_POST['movieid'])?$_POST['movieid']:0;
	$moviename = isset($_POST['moviename'])?$_POST['moviename']:'';
	$moviedate = isset($_POST['moviedate'])?$_POST['moviedate']:'';
	$movietype = isset($_POST['movietype'])?$_POST['movietype']:'';
	$director = isset($_POST['director'])?$_POST['director']:'';
	$primaryactors = isset($_POST['primaryactors'])?$_POST['primaryactors']:'';
	$memo = isset($_POST['memo'])?$_POST['memo']:'';
	//1、连接数据库
	include 'models/linkMysqli--object.php';
	//2、更新语句
	$update_sql = "update movies set moviename=?,moviedate=?,movietype=?,director=?,primaryactors=?,memo=? where movieid=?";
	$stmt = $linker->prepare($update_sql);
	$stmt->bind_param('ssssssi',$moviename,$moviedate,$movietype,$director,$primaryactors,$memo,$movieid);
	$update_res = $stmt->execute();
	if($update_res){
		echo "<script>alert('更新数据成功！！');location.href='pagemovies.php'</script>";
	}else{
		echo "<script>alert('更新数据失败！！');</script>";
	}
	//3、关闭相关连接
	$update_res->free();
	$linker->close();
?>