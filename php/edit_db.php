<?php
	session_start();
	include("functions.php");

	$username=$_REQUEST["userName"];
	$realname=$_REQUEST["realName"];
	$mobile=$_REQUEST["mobile"];
	$cardID=$_REQUEST["cardID"];
	$enteryear=$_REQUEST["enterYear"];
	$classID=$_REQUEST["class"];
	$address=$_REQUEST["address"];
	$zipcode=$_REQUEST["zipCode"];
	$business=$_REQUEST["business"];
	$id=$_REQUEST["id"];
	$isuse=1;

	include("conn.php");
	
	if(isset($_SESSION["userimage"])){
		$image=$_SESSION["userimage"];
	}
	else{
		$sql="select image from students where id=$id";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_affected_rows($conn)>0){
			$row=mysqli_fetch_array($rs);
			$image=$row[0];
		}
	}

	// $sql="update students ";
	// $sql.="set user_name=?,real_name=?,mobile=?,idcard_no=?,enter_year=?,class_id=?,image=? ";
	// $sql.="where id=$id";
	// $stmt = mysqli_prepare($conn, $sql);
	// //echo $sql;
	// mysqli_stmt_bind_param($stmt,"sssssis",$username,$realname,$mobile,$cardID,$enteryear,$classID,$image);
	
	// mysqli_stmt_execute($stmt);
	
	$sql="update students ";
	$sql.="set user_name='".$username."',real_name='".$realname."',mobile='".$mobile."',";
	$sql.="idcard_no='".$cardID."',enter_year='".$enteryear."',class_id=$classID,";
	$sql.="business='".$business."',zipcode='".$zipcode."',address='".$address."',";
	$sql.="image='".$image."' ";
	$sql.=" where id=$id";
	
	mysqli_query($conn,$sql);	
	
	if(mysqli_affected_rows($conn)>=0){
		unset($_SESSION["userimage"]);
		pageLocator("edit.php?id=$id");
		
	}
	
?>