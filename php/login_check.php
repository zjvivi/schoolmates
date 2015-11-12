<?php
session_start();
//error_reporting(0);
$userName=$_POST["userName"];
$userPwd=$_POST["userPwd"];
$userKind=$_POST["userKind"];

if(empty(trim($userName)) || empty(trim($userPwd)))
	die("用户名或者密码不能为空！<a href='login.php'>返回登陆</a>");

include("conn.php");

if($userKind==1)
	$sql="select id,admin_pwd  from admins where admin_name='".$userName."'";
else
	$sql="select id,user_pwd from students where user_name='".$userName."'";

$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);

if($row){
	if($row[1]==$userPwd){
		$_SESSION["userid"]=$row["id"];
		$_SESSION["username"]=$userName;
		$_SESSION["userKind"]=$userKind;
		echo("<script>window.location='index.php';</script>");
	}
	else{
		die("密码错误！<a href='login.php'>返回</a>");
	}

}
else
	die("用户名错误！<a href='login.php'>返回</a>");

mysqli_close($conn);
?>