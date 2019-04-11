<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
			table{
				border-collapse: collapse;
				width:1000px;
				border:2px solid lightskyblue;
				margin:50px auto;
			}
			table th,table td{
				width:80px;
				border:2px solid lightskyblue;
				text-align: center;
				height: 40px;
			}
			table th{
				background: gold;
			}
			a{
				text-decoration: none;
				color:gray;
				font-size:14px;
			}
			a:hover{
				color:red;
			}
			.page a{
				padding:10px 20px;
			}
			table .add a{
				font-size:18px;
			}
			
		</style>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<?php
					session_start();
					if(isset($_SESSION['currentUser'])){
						echo "<td colspan='3'>您好  {$_SESSION['currentUser']} , 欢迎回来</td>";
						echo "<td colspan='5'></td>";
						echo "<td colspan='1'><a href='logout.php'>注销</a></td>";
					}else{
						echo "<td colspan='8'></td>";
						echo "<td colspan='1'><a href='login.html'>请登录</a></td>";
					}
				?>
			</tr>
			<tr>
				<th>编号</th>
				<th>名称</th>
				<th>类型</th>
				<th>时间</th>
				<th>导演</th>
				<th>演员</th>
				<th>简介</th>
				<th>删除</th>
				<th>修改</th>
			</tr>
			<?php 
				include 'models/linkMysqli--object.php';
				//1、每页显示几条数据
				$pageSize = 3;
				//2、分页的话，需要一个参数表明当前是第几页（从1开始）
				$pageIndex = isset($_GET['page'])&&((integer)$_GET['page'])>0?$_GET['page']:1;
				//3、每页起始索引
				$start = ($pageIndex-1)*$pageSize;
				//4、查询
				$select_all_sql = <<<std
				select a.*,b.typename
				from movies a,movietype b
				where a.movietype=b.typeid
				order by movieid limit $start,$pageSize;
std;
				$select_all_res = $linker->query($select_all_sql);
				while($assoc = $select_all_res->fetch_assoc()){
			?>
			<tr>
				<td><?php echo $assoc['movieid']?></td>
				<td><?php echo $assoc['moviename']?></td>
				<td><?php echo $assoc['typename']?></td>
				<td><?php echo $assoc['moviedate']?></td>
				<td><?php echo $assoc['director']?></td>
				<td><?php echo $assoc['primaryactors']?></td>
				<td><?php echo $assoc['memo']?></td>
				<td>
					<a href="deletemovie.php?id=<?php echo $assoc['movieid']?>" onclick="return confirm('确定删除吗？')">删除</a>
				</td>
				<td>
					<a href="updatemovie.php?id=<?php echo $assoc['movieid']?>">修改</a>
				</td>
			</tr>
			<?php
				}
				//关闭当前的结果集
				$select_all_res->free();
			?>
			<tr>
				<td colspan='9' class='page'>
				<?php 
					//1、计算一共多少条
					$select_count_sql = "select * from movies";
					$select_count_res = $linker->query($select_count_sql);
					$rowCount = $select_count_res->num_rows;
					//2、总页数
					$pageCount = ceil($rowCount/$pageSize);
					//echo "共有 {$pageCount} 页，当前是第{$pageIndex}页";
					//3、释放结果集
					$select_count_res->free();
					
					//4、创建连接页面
					$pageURL='';//总的连接，首页，上一页，下一页，末页，共几页，当前页
					if($pageCount>0){
						$firstURL='';//首页
						$previousURL='';//上一页
						$nextURL='';//下一页
						$lastURL='';//末页
						if($pageIndex==1){//首页
							$firstURL="<a>首页</a>";
							$nextURL="<a href='pagemovies.php?page=".($pageIndex+1)."'>下一页</a>";
							$lastURL = "<a href='pagemovies.php?page=".($pageCount)."'>末页</a>";
						}else if($pageIndex==$pageCount){//最后一页
							$firstURL="<a href='pagemovies.php?page=1'>首页</a>";
							$previousURL="<a href='pagemovies.php?page=".($pageIndex-1)."'>上一页</a>";
							$lastURL= "<a>末页</a>";
						}else{
							$firstURL="<a href='pagemovies.php?page=1'>首页</a>";
							$previousURL="<a href='pagemovies.php?page=".($pageIndex-1)."'>上一页</a>";
							$nextURL="<a href='pagemovies.php?page=".($pageIndex+1)."'>下一页</a>";
							$lastURL= "<a href='pagemovies.php?page=".($pageCount)."'>末页</a>";
						}
					}
					$pageURL = $firstURL.$previousURL.$nextURL.$lastURL."共有 {$pageCount} 页，当前是第 {$pageIndex} 页";
					echo $pageURL;
					$linker->close();
				?>
				</td>
			</tr>
			<tr >
				<td colspan='9' class='add'>
					<a href="addmovie.php">添加电影</a>
				</td>
			</tr>
		</table>
	</body>
</html>

