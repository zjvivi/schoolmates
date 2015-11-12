<?php
//页面警示框
function showAlert($str){
	echo "<script>";
	echo "alert('".$str."');";
	echo "</script>";
}
//页面重定向
function pageLocator($path){
	echo "<script>";
	echo "window.location='".$path."';";
	echo "</script>";
}
?>