<?php
	session_start();
	header ( "Content-type:application/vnd.ms-excel" );
	header ( "Content-Disposition:filename=query_result_".date("Y-m-d").".xls" );
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
</head>
<body>
	<?php include("conn.php");?>
	

	<?php include("query_result.php");?>

	<?php
		unset($_SESSION["queryWord"]);
		unset($_SESSION["queryCategory"]);
	?>
</body>
</html>