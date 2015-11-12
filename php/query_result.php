<?php
	$export=$_GET["export"];
	if(isset($_SESSION["queryWord"])&&$export==0){
		$queryWord=$_SESSION["queryWord"];
		$queryCategory=$_SESSION["queryCategory"];
		$export=1;
	} 
		
	else{
		$export=-1;
		unset($_SESSION["queryWord"]);
		unset($_SESSION["queryCategory"]);
		if(isset($_POST["queryWord"])){
			$export=0;
			$queryWord=$_POST["queryWord"];
			$_SESSION["queryWord"]=$queryWord;

			if(isset($_POST["queryCategory"])) 
				$queryCategory=$_POST["queryCategory"];
			else
				$queryCategory="empty";
			$_SESSION["queryCategory"]=$queryCategory;
		}
	}
	if($export!=-1){

		$sql = "select s.id,real_name,idcard_no,enter_year,class_name,mobile ";
		$sql .= "from students s left join classes c on s.class_id=c.id ";
		$sql .= "where s.is_use=1 ";
		switch($queryCategory){
			case 'name':
				$sql.="and s.real_name like '%".$queryWord."%'";
				break;
			case 'enteryear':
				$sql .= "and s.enter_year like '%".$queryWord."%'";
				break;
			case 'class':
				$sql .= "and c.class_name like '%".$queryWord."%'";
				break;
			default:
				break;
		}
		$sql.=" order by s.id desc";
		
		$rs=mysqli_query($conn,$sql);
	?>
		<table class="person_list">
		 	<thead>
		 		<tr class="table_top_line">
		 			<th>姓名</th>
		 			<th>身份证号</th>
		 			<th>入学年月</th>
		 			<th>班级</th>
		 			<th>手机</th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		<?php
		 		$i=1;
		 		if(mysqli_affected_rows($conn)<=0){
		 			echo "<tr >";
		 			echo "<td colspan='6'>暂无数据</td>";
		 			echo "</tr>";
		 		}
		 		else{
			 		while($row=mysqli_fetch_array($rs)){
			 			if($i%2!=0)
			 				echo "<tr>";
			 			else
			 				echo "<tr class='tr_bg'>";
			 			
			 			for($j=1;$j<6;$j++)
			 			{
			 				echo "<td>";
							echo $row[$j];
							echo "</td>";
			 			}
			 			echo "</tr>";
			 			$i++;
					}	
		 		}
		 		?>
			 		
			</tbody>
		</table>
		<?php 
			if($export==0){
		?>
				<div class="query_count">
					<span >共有<?php echo $i-1; ?>人</span>
					<a href="export_excel.php?export=0"><img src="../images/export.png"/></a>
				</div>
		<?php
			}	
		}
	?>
	
	