<?php
	include 'header.php';
	include 'models/linkMysqli--object.php';
//4、执行sql语句
	$insert_sql = "insert into student values(NULL,'差评666','女','1999-02-24','4班',74,'保定')";
	$select_sql = "select * from student order by studid";
	$update_sql = "update student set studname='马亚琪' where studid=3";
	$delete_sql = "delete from student where studid=7";
	
	//执行一条sql语句
	/*
		$insert_res = $linker->query($insert_sql);
		var_dump($insert_res);//true/false
		echo '<hr>';
		
		$select_res = $linker->query($select_sql);
		var_dump($select_res);//结果集
		echo '<hr>';
		
		$update_res = $linker->query($update_sql);
		var_dump($update_res);//true/false
		echo '<hr>';
		
		$delete_res = $linker->query($delete_sql);
		var_dump($delete_res);//true/false
		echo '<hr>';
	*/
	
	//执行多个查询sql语句，multi_query()
	/*
  	$sqls = "select studname from student;";
	$sqls .= "select * from student order by studid;";
	$sqls .= "select class from student;";
	$sqls .= "select studsex from student;";
	
	if($linker->multi_query($sqls)){
		//从最后的查询中转让结果集
		$res = $linker->store_result();
		var_dump($res);
	}
	*/
	
	
//5、操作结果集，取数据
 	$select_res = $linker->query($select_sql);
 	
 	/*
		$row = $select_res->fetch_row();
		var_dump($row);//索引数组,一行
		echo '<hr>';
		
		$assoc  =$select_res->fetch_assoc();
		var_dump($assoc);//关联数组,一行
		echo '<hr>';
		
		$array = $select_res->fetch_array();
		var_dump($array);//索引与关联结合,一行
		echo '<hr>';
		
		$object = $select_res->fetch_object();
		var_dump($object);//对象,一行
		echo '<hr>';
		
		$all = $select_res->fetch_all(MYSQLI_BOTH);
		var_dump($all);//索引与关联结合,所有数据
		echo '<hr>';
		
		$numrow = $select_res->num_rows;
		var_dump($numrow);//数据行数
		echo '<hr>';
	*/
	
//6、循环结果集
	echo "<table>";
	while($assoc=$select_res->fetch_assoc()){
		echo '<tr>';
			echo '<td>'.$assoc['studid'].'</td>';
			echo '<td>'.$assoc['studname'].'</td>';
			echo '<td>'.$assoc['studsex'].'</td>';
			echo '<td>'.$assoc['studbirthday'].'</td>';
			echo '<td>'.$assoc['class'].'</td>';
			echo '<td>'.$assoc['ingrade'].'</td>';
			echo '<td>'.$assoc['studaddress'].'</td>';
		echo '</tr>';
	}
	echo "</table>";
	
//7、关闭数据库的相关连接
	//关闭结果集，释放内存
	$select_res->free();
	//关闭数据库
	$linker->close();
?>