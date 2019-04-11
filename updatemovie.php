<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<script src='laydate/laydate.js'></script>
	</head>
	<body>
		<form action="updatemovieSave.php" method="post">
		<?php 
			include 'header.php';
			//1、接收电影编号
			$id = isset($_GET['id'])?$_GET['id']:0;
			//2、连接数据库
			include 'models/linkMysqli--object.php';
			//3、执行sql
			$select_movies_sql = "select * from movies where movieid=?";
			$stmt = $linker->prepare($select_movies_sql);//预处理
			$stmt->bind_param('i',$id);//绑定参数
			$stmt->execute();//执行
			$res = $stmt->get_result();//获取查询结果
			$select_movies_res = $res->fetch_all(MYSQLI_ASSOC);
			//4、关闭结果集
			$res->free();
			//var_dump($select_movies_res);
		?> 
					 <input type="hidden" name='movieid' value="<?php echo $select_movies_res[0]['movieid']?>"/>
			电影名称：<input type="text" name='moviename' value="<?php echo $select_movies_res[0]['moviename']?>"/><br />
			上映时间：<input type="text" name='moviedate' onfocus='laydate()' value="<?php echo $select_movies_res[0]['moviedate']?>"/><br />
			电影类型：<select name="movietype">
						<?php 
							$type_sql = "select * from movietype order by typeid";
							$type_res = $linker->query($type_sql);
							while($assoc = $type_res->fetch_assoc()){
								//如果哪一个被选中，给selected="selected"
									//movietype=typeid
									//$select_movies_res[0]['movietype'] = $assoc['typeid'];
								//value='typeid'
								//<option> typename </option>
						?>
							<option 
								<?php 
									if($select_movies_res[0]['movietype']==$assoc['typeid']){
										echo "selected='selected'";
									}
								?>
								value="<?php echo $assoc['typeid'] ?>"
							>
								<?php echo $assoc['typename'] ?>
							</option>
						<?php 
							}
						?>
					 </select><br />
			电影导演：<input type="text" name='director' value="<?php echo $select_movies_res[0]['director']?>"/><br />
			电影主演：<input type="text" name='primaryactors' value="<?php echo $select_movies_res[0]['primaryactors']?>"/><br />
			电影简介：<textarea name="memo" rows="4" cols="22">
							<?php echo $select_movies_res[0]['memo']?>
					 </textarea><br />
			<input type="submit" value="保存"/>
		</form>
	</body>
</html>

