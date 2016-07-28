<!DOCTYPE html>
<html>
   <head>
	  <meta charset="utf-8"/>
	  <title></title>
   </head>

   <body>
	<h2>员工列表</h2>
	<?php
		//查询数据库中所有的员工记录——二维数组
		$conn = mysqli_connect('localhost','root','root','tarena');
		mysqli_query($conn,'SET NAMES UTF8');
		$sql = 'SELECT eno,ename,salary,birthday,gender,isMarried,deptNo FROM emp';
		$result = mysqli_query($conn,$sql);//执行查询的返回值成功返回多行多列的结果集，失败返回false
		//var_dump($result);
		$data = array();//用于盛放查询结果集的二维数组
		while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
			$data[] = $row;//把抓取到的一行记录保存到二维数组中
		}
		//var_dump($data);
		$jsonstring = json_encode($data);
		//echo $jsonstring
	?>
	<hr/>
	<?php
		//从查询结果集中抓取一行
		//$row = mysqli_fetch_array($result);
		//var_dump($row);
	?>
	<table border='1' width='500'>
		<tr>
			<th>编号</th>	
			<th>姓名</th>	
			<th>性别</th>	
			<th>生日</th>	
			<th>工资</th>	
			<th>婚否</th>	
			<th>所在部门</th>	
			<th>操作</th>	
		</tr>
		<?php
			for($i=0;$i<count($data);$i++){
				$row = $data[$i];
		?>
				<tr>
					<td><?php echo $row['eno']?></td>
					<td><?php echo $row['ename']?></td>
					<td><?php echo $row['gender']?></td>
					<td><?php echo $row['birthday']?></td>
					<td><?php echo $row['salary']?></td>
					<td><?php echo $row['isMarried'] ?'已婚':'未婚'; ?></td>
					<td><?php echo $row['deptNo']?></td>
					<td>
						<button onclick = 'delEmp(<?php echo $row['eno'];?>)'>删除</button>
						<button onclick = 'updEmp(<?php echo $row['eno'];?>)'>修改</button>
					</td>
				</tr>
		<?php
			}
		?>
	</table>
	<br/>
	<a href='1.html'>返回主菜单</a>
	<script>
		function delEmp(eno){
			if(window.confirm('此操作不可回退！您确定要删除吗？')){
				window.location.href = '1-delemp.do.php?eno='+eno;
			}
		}
		function updEmp(eno){
			window.location.href = '1-udpemp.php?eno='+eno;
		}
	</script>
   </body>
</html>
