<?php
	//接收上一个页面提交的表单数据
	//使用PHP预定义的几个数组变量，读取客户端提交的数据
	/*var_dump($_GET);
	echo '<hr/>';
	var_dump($_POST);
	echo '<hr/>';
	var_dump($_COOKIE);
	echo '<hr/>';
	var_dump($_REQUEST);
	echo '<hr/>';*/
	$n = $_REQUEST['dno'];
	$m = $_REQUEST['dname'];
	$l = $_REQUEST['loc'];

	//把接收到的数据提交到数据库
	//(1)连接到RDBMS
	$conn = mysqli_connect('127.0.0.1', 'root', '', 'tarena');
	//(2)选择特定的数据库
	//mysqli_select_db($conn, 'tarena');
	//(3)发送SQL
	$sql = "INSERT INTO dept(dno,dname,loc) VALUES('$n','$m','$l')";
	//PHP中""内部带$符号的会被自动认为是变量
	//echo $sql;
	$result = mysqli_query($conn, $sql);//执行SQL
	//INSERT/DELETE/UPDATE 返回：true/false
	//SELECT:false / mysqli_result

	//(4)读取SQL语句的执行结果
	$affectedRows = -1;
	if($result){//执行成功后，读取上述SQL语句影响的行数
		$affectedRows = mysqli_affected_rows($conn);
	}

	//(5)关闭连接
	//mysqli_close($conn);

	//给客户端以提示：数据保存成功
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
  <title></title>
  <style type="text/css">
	*{margin:0; padding:0;}
  </style>
 </head>

 <body>
	<h2>添加结果：<h2>
	<?php
		echo '添加操作影响的行数为：'.$affectedRows;
	?>
 </body>
</html>
