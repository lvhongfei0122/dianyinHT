<?php
	include 'header.php';
	$moviename = isset($_POST['moviename'])?$_POST['moviename']:'';
	$moviedate = isset($_POST['moviedate'])?$_POST['moviedate']:'';
	$movietype = isset($_POST['movietype'])?$_POST['movietype']:'';
	$director = isset($_POST['director'])?$_POST['director']:'';
	$primaryactors = isset($_POST['primaryactors'])?$_POST['primaryactors']:'';
	$memo = isset($_POST['memo'])?$_POST['memo']:'';
	//1、连接数据库
	include 'models/linkMysqli--object.php';
	//2、更新语句
	$insert_sql = "insert into movies(moviename,moviedate,movietype,director,primaryactors,memo) values(?,?,?,?,?,?)";
	$stmt = $linker->prepare($insert_sql);
	$stmt->bind_param('ssssss',$moviename,$moviedate,$movietype,$director,$primaryactors,$memo);
	$insert_res = $stmt->execute();
	if($insert_res){
		echo "<script>alert('添加数据成功！！');location.href='pagemovies.php'</script>";
	}else{
		echo "<script>alert('添加数据失败！！');</script>";
	}
	//3、关闭相关连接
	$insert_res->free();
	$linker->close();
?>