<?php
	session_start();
	include 'header.php';
	if(isset($_SESSION['currentUser'])){
		session_unset();
		//销毁所有的Session变量数据
		session_destroy();
		//销毁一个会话中的全部数据
		setcookie(session_name(),'',time()-3600);
		//销毁与客户端的卡号
		if($_SESSION==null){
			echo "<script>alert('您已成功注销。。');</script>";
			//隔3秒跳转到登录页面
			echo "<h2>   <span id='time1'>3</span>    秒之后返回登录页面</h2>";
			$time = <<<time
					<script>
						var time2 = 3;
						function delayTime(){
							var time1 = document.getElementById('time1');
							time1.innerHTML = time2;
							time2--;
							if(time2==0){
								clearInterval(timer);
								location.href='login.html';
							}
						}
						var timer = setInterval('delayTime()',1000);
					</script>
time;
			echo $time;
		}	
	}else{
		echo "<script>alert('王八犊子，滚');location.href='login.html'</script>";
	}
?>