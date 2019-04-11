<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<script src='laydate/laydate.js'></script>
	</head>
	<body>
		<form action="addmovieSave.php" method="post">
			电影名称：<input type="text" name='moviename'/><br />
			上映时间：<input type="text" name='moviedate' onfocus='laydate()'/><br />
			电影类型：<select name="movietype">
						<option value='0'>----请选择----</option>
						<?php 
							include 'models/linkMysqli--object.php';
							$type_sql = "select * from movietype order by typeid";
							$type_res = $linker->query($type_sql);
							while($assoc = $type_res->fetch_assoc()){
						?>
							<option value="<?php echo $assoc['typeid'] ?>">
								<?php echo $assoc['typename'] ?>
							</option>
						<?php 
							}
							$type_res->free();
							$linker->close();
						?>
					 </select><br />
			电影导演：<input type="text" name='director'/><br />
			电影主演：<input type="text" name='primaryactors' /><br />
			电影简介：<textarea name="memo" rows="4" cols="22"></textarea><br />
			<input type="submit" value="保存"/>
		</form>
	</body>
</html>

