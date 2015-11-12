<?php
	session_start();
	$username=$_REQUEST["userName"];
	$realname=$_REQUEST["realName"];
	$mobile=$_REQUEST["mobile"];
	$cardID=$_REQUEST["cardID"];
	$enteryear=$_REQUEST["enterYear"];
	$classID=$_REQUEST["class"];
	$isuse=1;
	
	include("conn.php");
	if(isset($_SESSION["userimage"])){
		$image=$_SESSION["userimage"];
	}
	else{
		$image="../images/user-128.png";
	}

	$sql="insert into students(user_name,real_name,mobile,idcard_no,enter_year,class_id,image,is_use) ";
	$sql.="values(?,?,?,?,?,?,?,?)";
	$stmt = mysqli_prepare($conn, $sql);

	mysqli_stmt_bind_param($stmt,"sssssssi",$username,$realname,$mobile,$cardID,$enteryear,$classID,$image,$isuse);
	mysqli_stmt_execute($stmt);
	
	if(mysqli_affected_rows($conn)>0){
		unset($_SESSION["userimage"]);
		header("Location:index.php");
	}
	
?>