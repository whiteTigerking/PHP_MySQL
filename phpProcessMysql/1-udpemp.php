<?php
	$eno = $_REQUEST['eno'];
?>
<!DOCTYPE html>
<html>
   <head>
	  <meta charset="utf-8"/>
	  <title></title>
   </head>

   <body>
	<h2>修改员工信息</h2>
	<form action='1-updemp.do.php' method='POST'>
		员工编号：<select name='eno'>
					<option value='<?php echo $eno;?>'><?php echo $eno;?></option>
				  </select><br/>
		员工姓名：<input name='ename'/><br/>
		员工性别：<input type='radio' name='gender' value='男' checked='true'/>男
			      <input type='radio' name='gender' value='女'/>女<br/>
		员工工资：<input name='salary'/><br/>
		员工生日：<input name='birthday'/><br/>
		是否已婚：<select name='isMarried'>
					<option value='1'>已婚</option>
					<option value='0'>未婚</option>
			      </select><br/>
		<!--TODO:此处的部门列表应该改为动态数据，从数据库中读取部门表中的记录-->
		所在部门：<select name='deptNo'>
					<option value='10'>研发部</option>
					<option value='20'>市场部</option>
					<option value='30'>运营部</option>
				  </select><br/>
		<input type='submit' value='修改'/>
	</form> 
   </body>
</html>
