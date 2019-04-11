<?php
	include 'header.php';
	include 'models/linkMysql--PDO.php';
//2、执行SQL语句
	//===========查询===============
	//（1）使用query()
		$select_sql = "select * from student order by studid";
		$stmt = $pdo->query($select_sql);
		//PDOStatement对象
	
	//（2）使用prepare()
		//使用冒号
		/*
		$select_sql = "select * from student where studname=:name and studsex=:sex";
		$stmt = $pdo->prepare($select_sql);//预处理一条语句
		$stmt->execute([   //执行预处理语句，并传参
				":name"=>"马亚琪",
				":sex"=>"女"
		]);
		*/
		
		
		//使用问号
		/*
		$select_sql = "select * from student where studname=? and studsex=?";
		$stmt = $pdo->prepare($select_sql);//预处理一条语句
		$stmt->execute([   //执行预处理语句，并传参
				"马亚琪",
				"女"
		]);
		*/
		
		
		//通过bindParam()方法
		/*
		$select_sql = "select * from student where studname=:name and studsex=:sex";
		$stmt = $pdo->prepare($select_sql);//预处理一条语句
		//绑定参数
		$name = '马亚琪';
		$sex = '女';
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":sex", $sex);
		
		$stmt->execute();
		*/
		
		
		//===========增删改===============
		$insert_sql = "insert into student values(NULL,'差评666','女','1999-02-24','4班',74,'保定')";
		$update_sql = "update student set studname='杨安妮' where studid=3";
		$delete_sql = "delete from student where studid=7";
		//（1）使用exec()
		/*
			$count_insert = $pdo->exec($insert_sql);
			var_dump($count_insert);//受影响的行数
			
			$count_update = $pdo->exec($update_sql);
			var_dump($count_update);//受影响的行数
			
			$count_delete = $pdo->exec($delete_sql);
			var_dump($count_delete);//受影响的行数
		*/
		
		//（2）使用prepare()
		/*
			$update_sql = "update student set studname=? where studid=?";
			$stmt = $pdo->prepare($update_sql);
			$stmt->execute(['陈平',11]);
		*/
	
			
//3、操作结果集
	/*
	$row = $stmt->fetch();//获取一行，while(){}
	var_dump($row);
	
	$rows = $stmt->fetchAll();//获取所有的行
	var_dump($rows);
	
	$row_count = $stmt->rowCount();//获取行数
	var_dump($row_count); 
	*/
	
//4、循环结果集
	echo "<table>";
	while($row = $stmt->fetch()){
		echo '<tr>';
		echo '<td>'.$row['studid'].'</td>';
		echo '<td>'.$row['studname'].'</td>';
		echo '<td>'.$row['studsex'].'</td>';
		echo '<td>'.$row['studbirthday'].'</td>';
		echo '<td>'.$row['class'].'</td>';
		echo '<td>'.$row['ingrade'].'</td>';
		echo '<td>'.$row['studaddress'].'</td>';
		echo '</tr>';
	}
	echo "</table>";
	
//5、关闭结果集和连接
	$stmt->closeCursor();
	$stmt->null;
	
	$pdo->null;
?>