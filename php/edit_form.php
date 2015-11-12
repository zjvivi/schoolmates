<?php
$id=$_GET["id"];

$sql="select * from students s left join classes c on s.class_id=c.id where s.id=$id";
//echo $sql;
$rs=mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn)>0){
	$row=mysqli_fetch_array($rs);
}
else{
	echo "<h2>用户id丢失，请返回<a href='index.php'>首页</a>!</h2>";
	die();
}
?>

<fieldset>
	<legend>编辑校友</legend>
	<form action="edit_db.php?id=<?php echo $id;?>" method="post" accept-charset="utf-8" class="edit_form">
		<label class="userInput">
			<span>用户名：</span>
			<input type="text" name="userName" placeholder="请输入用户名" value="<?php echo $row['user_name']?>"/></label>
			<input type="hidden" name="userID" value="<?php echo $row['id']?>" />
		</label>
		<label class="userInput">
			<span>真实姓名：</span>
			<input type="text" name="realName" placeholder="请输入真实姓名" value="<?php echo $row['real_name']?>"/></label>
		<label class="userInput">
			<span>手机：</span>
			<input type="text" name="mobile" placeholder="请输入手机" value="<?php echo $row['mobile']?>"/></label>
		<label class="userInput">
			<span>工作单位：</span>
			<input type="text" name="business" placeholder="请输入工作单位" value="<?php echo $row['business']?>"/></label>
		<label class="userInput">
			<span>身份证号：</span>
			<input type="text" name="cardID" placeholder="请输入身份证号" value="<?php echo $row['idcard_no']?>"/></label>
		<label class="userInput">
			<span>通讯地址：</span>
			<input type="text" name="address" placeholder="请输入通讯地址" value="<?php echo $row['address']?>"/></label>
		<label class="userInput">
			<span>邮编：</span>
			<input type="text" name="zipCode" placeholder="请输入邮编" value="<?php echo $row['zipcode']?>"/></label>
		<label class="userInput">
			<span>入校年份:</span>
			<select name="enterYear">
			<?php
				for($i=1970;$i<2015;$i++){
					if($i==$row["enter_year"])
						echo "<option value='".$i."' selected='true'>$i</option>";
					else
						echo "<option value='".$i."'>$i</option>";
				}
			?>
			</select>
		</label>
		<label class="userInput">
			<span>班级：</span>
			<select name="class">
			<?php
			$sql = "select id,class_name from classes";
			$rs1=mysqli_query($conn,$sql);
			echo "<option value='0'>请选择入校班级</option>";
			while($row1=mysqli_fetch_array($rs1)){
				if($row1["class_name"]==$row["class_name"])
					echo "<option value='".$row1["id"]."' selected='true'>".$row1["class_name"]."</option>";
				else
					echo "<option value='".$row1["id"]."' >".$row1["class_name"]."</option>";
			}
			unset($row1);
			unset($rs1);
			?>
			</select>
		</label>
		<label class="user_img">
			
			<img src="<?php echo $row['image'];?>" id="userImage"/>
			
			<iframe src="upload.php"></iframe>
		</label>
		<label class="operButton">
			<input type="submit"  value="提交" />
			<input type="reset"  value="重置" />
		</label>

	</form>
</fieldset>

		