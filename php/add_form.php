<fieldset>
	<legend>新增校友</legend>
	<form action="add_db.php" method="post" accept-charset="utf-8" class="add_form">
		<label class="userInput"><input type="text" name="userName" placeholder="请输入用户名"/></label>
		<label class="userInput"><input type="text" name="realName" placeholder="请输入真实姓名"/></label>
		<label class="userInput"><input type="text" name="mobile" placeholder="请输入手机"/></label>
		<label class="userInput"><input type="text" name="business" placeholder="请输入工作单位"/></label>
		<label class="userInput"><input type="text" name="cardID" placeholder="请输入身份证号"/></label>
		<label class="userInput"><input type="text" name="address" placeholder="请输入通讯地址"/></label>
		<label class="userInput"><input type="text" name="zipCode" placeholder="请输入邮编"/></label>
		<label class="userInput">
			<select name="enterYear">
			<?php
				for($i=1970;$i<2015;$i++){
					echo "<option value='".$i."'>$i</option>";
				}
			?>
			</select>
		</label>
		<label class="userInput">
			<select name="class">
			<?php
			$sql = "select id,class_name from classes";
			$rs=mysqli_query($conn,$sql);
			echo "<option value='0'>请选择入校班级</option>";
			while($row=mysqli_fetch_array($rs)){
				echo "<option value='".$row["id"]."'>".$row["class_name"]."</option>";
			}
			?>
			</select>
		</label>
		<label class="user_img">
			<img src="../images/user-128.png" id="userImage"/>
			<iframe src="upload.php"></iframe>
		</label>
		<label class="loginButton">
			<input type="submit"  value="提交" />
			<input type="reset"  value="重置" />
		</label>

	</form>
</fieldset>
		