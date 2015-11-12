<?php
	$sql = "select s.id,real_name,idcard_no,enter_year,class_name,mobile ";
	$sql .= "from students s left join classes c on s.class_id=c.id ";
	$sql .= "where s.is_use=1 order by s.id desc";
	
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
 			<th>操作</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php
 		if(mysqli_affected_rows($conn)<=0){
 			echo "<tr >";
 			echo "<td colspan='6'>暂无数据</td>";
 			echo "</tr>";
 		}
 		else{
 			$i=1;
	 		while($row=mysqli_fetch_array($rs)){
	 			if($i%2!=0)
	 				echo "<tr>";
	 			else
	 				echo "<tr class='tr_bg'>";
	 			
	 			for($i=1;$i<6;$i++)
	 			{
	 				echo "<td>";
					echo $row[$i];
					echo "</td>";

					
	 			}
	 			echo "<td>";
				echo "<a href='view.php?id=".$row[0]."'><img src='../images/view.png' alt='view'/></a>";
				echo "<a href='edit.php?id=".$row[0]."'><img src='../images/edit.png'alt='edit'/></a>";
				echo "<a href='delete.php?id=".$row[0]."'><img src='../images/delete.png' alt='delete'/></a>";
				echo "</td>";
	 			echo "</tr>";
	 			$i++;
			}	
 		}
 		?>
	 		
	</tbody>
</table>
		