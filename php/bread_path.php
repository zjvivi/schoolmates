<?php
	echo "<ul class='top_line'>";
	echo "<li class='nav_path'>";
	echo "<a href='index.php'>首页</a>&gt;";
	switch ($_SESSION["page"]) {
		case 'index':
			echo "信息列表";
			break;
		case 'add':
			echo "新增校友";
			break;
		case 'edit':
			echo "编辑校友";
			break;
		case 'query':
			echo "查询结果";
			break;
	}
	
	echo "</li>";
	echo "</ul>";
?>