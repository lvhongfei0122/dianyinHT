<?php
	include 'header.php';
	include 'models/linkMysqli.php';
//4、执行sql语句
	$insert_sql = "insert into student values(NULL,'差评','女','1999-02-24','4班',74,'保定')";
	$select_sql = "select * from student order by studid";
	$update_sql = "update student set studname='马亚琪' where studid=1";
	$delete_sql = "delete from student where studid=5";
	
	/*
	$insert_res = mysqli_query($linker,$insert_sql);
	var_dump($insert_res);//true/false
	echo '<hr>';
	
	$select_res = mysqli_query($linker,$select_sql);
	var_dump($select_res);//结果集
	echo '<hr>';
	
	$update_res = mysqli_query($linker,$update_sql);
	var_dump($update_res);//true/false
	echo '<hr>';
	
	$delete_res = mysqli_query($linker,$delete_sql);
	var_dump($delete_res);//true/false
	echo '<hr>';
	*/
	
	
//5、操作结果集，取数据
	$select_res = mysqli_query($linker,$select_sql);
	
	
	$row = mysqli_fetch_row($select_res);
	var_dump($row);//索引数组,一行
	echo '<hr>';
	
	$assoc  =mysqli_fetch_assoc($select_res);
	var_dump($assoc);//关联数组,一行
	echo '<hr>';
	
	$array = mysqli_fetch_array($select_res,MYSQLI_BOTH);
	var_dump($array);//索引与关联结合,一行
	echo '<hr>';
	
	$all = mysqli_fetch_all($select_res,MYSQLI_BOTH);
	var_dump($all);//索引与关联结合,所有数据
	echo '<hr>';
	
	$numrow = mysqli_num_rows($select_res);
	var_dump($numrow);//数据行数
	echo '<hr>';
	
	$affectrow = @mysqli_affected_rows($select_res);
	var_dump($affectrow);//影响的行数。
	echo '<hr>';
	

//6、循环结果集
	echo "<table>";
	while($assoc=mysqli_fetch_assoc($select_res)){
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
	mysqli_free_result($select_res);
	//关闭数据库
	mysqli_close($linker);
?>