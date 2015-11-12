<?php
	echo "<ul class='nav'>";
	switch($_SESSION["page"]){
		case "index":
			echo "<li><a href='index.php' class='active'>首页</a></li>";
			echo "<li><a href='add.php' >新增</a></li>";
			echo "<li><a href='query.php?export=-1'>查询</a></li>";
			echo "<li><a href='exit.php'>退出</a></li>";
			break;
		case "add":
			echo "<li><a href='index.php' >首页</a></li>";
			echo "<li><a href='add.php' class='active'>新增</a></li>";
			echo "<li><a href='query.php?export=-1'>查询</a></li>";
			echo "<li><a href='exit.php'>退出</a></li>";
			break;
		case "query":
			echo "<li><a href='index.php' >首页</a></li>";
			echo "<li><a href='add.php' >新增</a></li>";
			echo "<li><a href='query.php?export=-1' class='active'>查询</a></li>";
			echo "<li><a href='exit.php'>退出</a></li>";
			break;
		case "exit":
			echo "<li><a href='index.php' >首页</a></li>";
			echo "<li><a href='add.php' >新增</a></li>";
			echo "<li><a href='query.php?export=-1' class='active'>查询</a></li>";
			echo "<li><a href='exit.php'>退出</a></li>";
			break;
		default :
			echo "<li><a href='index.php' >首页</a></li>";
			echo "<li><a href='add.php' >新增</a></li>";
			echo "<li><a href='query.php?export=-1'>查询</a></li>";
			echo "<li><a href='exit.php'>退出</a></li>";
			break;
	}
	echo "</ul>";
?>
		