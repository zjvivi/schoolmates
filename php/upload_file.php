<?php
  session_start();
  /* 文件上传类型
  0 gif image/gif 
  1 jpg image/jpeg 
  2 png image/png 
  3 bmp image/bmp 
  4 psd application/octet-stream 
  5 ico image/x-icon 
  6 rar application/octet-stream 
  7 zip application/zip 
  8 7z application/octet-stream 
  9 exe application/octet-stream 
  10 avi video/avi 
  11 rmvb application/vnd.rn-realmedia-vbr 
  12 3gp application/octet-stream 
  13 flv application/octet-stream 
  14 mp3 audio/mpeg 
  15 wav audio/wav 
  16 krc application/octet-stream 
  17 lrc application/octet-stream 
  18 txt text/plain 
  19 doc application/msword 
  20 xls application/vnd.ms-excel 
  21 ppt application/vnd.ms-powerpoint 
  22 pdf application/pdf 
  23 chm application/octet-stream 
  24 mdb application/msaccess 
  25 sql application/octet-stream 
  26 con application/octet-stream 
  27 log text/plain 
  28 dat application/octet-stream 
  29 ini application/octet-stream 
  30 php application/octet-stream 
  31 html text/html 
  32 htm text/html 
  33 ttf application/octet-stream 
  34 fon application/octet-stream 
  35 js application/x-javascript 
  36 xml text/xml 
  37 dll application/octet-stream 
  38 dll application/octet-stream
  */

  
  //文件类型判断
  $bool = ($_FILES["file"]["type"] == "image/gif"|| $_FILES["file"]["type"] == "image/pjpeg" || $_FILES["file"]["type"] == "image/jpeg"||$_FILES["file"]["type"] == "image/png" );
  if (!$bool)
  { 
   	die("类型不对<a href='javascript:window.history.back();'>返回</a>");
  }
  $bool=$_FILES["file"]["size"] < 100000 ;
  if (!$bool)
  { 
   	die("大小不对<a href='javascript:window.history.back();'>返回</a>");
  }
  //文件上传遇错后停止执行
  if ($_FILES["file"]["error"] > 0){
	 die("Return Code: " . $_FILES["file"]["error"] . "<br />");
  }
  


  //取上传时间作为文件名
  $today=idate("Y").idate("m").idate("d").idate("H").idate("m").idate("s");
	   
  //文件名按照“.”分成两部分存到数组
  $fileArray=explode(".",$_FILES["file"]["name"]);
	   
  //重命名上传文件名
  $filename=$today.".".$fileArray[1];
	   
  //移动文件并重命名upload
  move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/" . $filename);
  
  //保存文件路径，跳回到上传页面后可用
  $filePath="../upload/$filename";
  $_SESSION["userimage"]=$filePath; 
 
  echo "<script>";
  echo "alert('上传成功！');";
  //echo "window.parent.location='add.php';";
  echo "window.parent.document.getElementById('userImage').src='".$_SESSION['userimage']."';";
  echo "window.location='upload.php';";
  echo "</script>";
		
?>
