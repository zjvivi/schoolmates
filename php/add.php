<?php
	session_start();
	if(!isset($_SESSION["userid"]))
		die("请先登录<a href='login.php'>登陆</a>");
	else
		$_SESSION["page"]="add";
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

	<!-- 连接数据库 -->
	<?php include("conn.php"); ?>
	<div class="container">
		<!-- 导航 -->
		<?php include("nav.php");?>
		
		<!-- 面包屑 -->
		<?php include("bread_path.php");?>
		
		<!-- 新增人员 -->
		<?php include("add_form.php");?>
		
		<!-- 页脚 -->
		<?php include("footer.html"); ?>
	</div>
</body>
</html>