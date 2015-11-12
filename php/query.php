<?php
	session_start();
	if(!isset($_SESSION["userid"]))
		die("请先登录<a href='login.php'>登陆</a>");
	else
		$_SESSION["page"]="query";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
	<!-- 顶部 -->
	<?php include("top_login.html"); ?>
	
	<div class="container">
		<!-- 导航 -->
		<?php include("nav.php");?>
		
		
		<!-- 连接数据库 -->
		<?php include("conn.php");?>

		<!-- 查询条件 -->
		<?php include("query_condition.html");?>
		
		<!-- 面包屑 -->
		<?php include("bread_path.php");?>
		
		
		<!-- 查询结果 -->
		<?php include("query_result.php");?>

		<!-- 页脚 -->
		<?php include("footer.html"); ?>
	</div>
</body>
</html>