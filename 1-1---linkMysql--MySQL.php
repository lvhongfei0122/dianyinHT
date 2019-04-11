<?php
	include 'header.php';
	include 'models/linkMysql.php';
//4、执行sql语句
	$insert_sql = "insert into student values(NULL,'陈平','女','1999-02-24','4班',74,'保定')";
	$select_sql = "select * from student order by studid";
	$update_sql = "update student set studname='马亚琪' where studid=4";
	$delete_sql = "delete from student where studid=2";
	
	/*
	$insert_res = mysql_query($insert_sql,$linker);
	var_dump($insert_res);//true/false
	echo '<hr>';
	
	$select_res = mysql_query($select_sql,$linker);
	var_dump($select_res);//结果集
	echo '<hr>';
	
	$update_res = mysql_query($update_sql,$linker);
	var_dump($update_res);//true/false
	echo '<hr>';
	
	$delete_res = mysql_query($delete_sql,$linker);
	var_dump($delete_res);//true/false
	echo '<hr>';
	*/
	
//5、操作结果集，取数据
	$select_res = mysql_query($select_sql,$linker);
		//$row = mysql_fetch_row($select_res);
		//var_dump($row);
		//echo '<hr>';
		//索引数组
		/*
			0 => string '1'
			1 => string '张三' 
			2 => string '男' 
			3 => string '1990-03-24' 
			4 => string '4班'
			5 => string '90'
			6 => string '石家庄' 
		*/
		
		//$assoc  =mysql_fetch_assoc($select_res);
		//var_dump($assoc);
		//echo '<hr>';
		//关联数组
		/*
			'studid' => string '3' 
			'studname' => string '王五' 
			'studsex' => string '男' 
			'studbirthday' => string '1998-07-22' 
			'class' => string '3班' 
			'ingrade' => string '100' 
			'studaddress' => string '沧州' 
		*/
		
		//$array = mysql_fetch_array($select_res);
		//var_dump($array);
		//echo '<hr>';
		//索引与关联结合
		/*
			0 => string '4'
			'studid' => string '4' 
			1 => string '马亚琪'
			'studname' => string '马亚琪' 
			2 => string '女'
			'studsex' => string '女'
			3 => string '1999-11-11' 
			'studbirthday' => string '1999-11-11'
			4 => string '2班'
			'class' => string '2班'
			5 => string '50' 
			'ingrade' => string '50'
			6 => string '衡水' (length=6)
			'studaddress' => string '衡水' 
		*/
		
		//$object = mysql_fetch_object($select_res);
		//var_dump($object);
		//echo '<hr>';
		//对象
		/*
			public 'studid' => string '5' 
			public 'studname' => string '陈平'
			public 'studsex' => string '女' 
			public 'studbirthday' => string '1999-02-24' 
			public 'class' => string '4班' 
			public 'ingrade' => string '74' 
			public 'studaddress' => string '保定' 
		*/

//6、循环结果集
	echo "<table>";
	while($assoc=mysql_fetch_assoc($select_res)){
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
	mysql_free_result($select_res);
	//关闭数据库
	mysql_close($linker);
?>