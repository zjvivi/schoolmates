<?php
	session_start();
	include("functions.php");

	$id=$_REQUEST["id"];

	if(!is_null($id)){
		include("conn.php");
		$sql="update students set is_use=0 ";
		$sql.="where id=?";
		
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt,"i",$id);
		mysqli_stmt_execute($stmt);
		
		if(mysqli_affected_rows($conn)>0){
			showAlert("删除成功");
			pageLocator("index.php");
		}
	}
	else{
		showAlert("id号不存在");
		pageLocator("index.php");
	}

?>