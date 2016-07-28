<?php
	//读取客户端提交的表单数据
	$ename = $_REQUEST['ename'];
	$gender = $_REQUEST['gender'];//男/女
	$salary = $_REQUEST['salary'];//规定格式
	$birthday = $_REQUEST['birthday'];
	$isMarried = $_REQUEST['isMarried'];//1/0
	$deptNo = $_REQUEST['deptNo'];//10/20/30
	//连接数据库，执行INSERT语句
	$conn = mysqli_connect('127.0.0.1','root','root');
	mysqli_select_db($conn,'tarena');
	$sql = "INSERT INTO emp(ename,gender,salary,birthday,isMarried,deptNo) VALUES('$ename','$gender','$salary','$birthday','$isMarried','$deptNo');";
	mysqli_query($conn,'SET NAMES UTF8;');/*告诉数据库接下来的SQL语句的编码方式*/
	$result = mysqli_query($conn,$sql);
	//根据执行的结果，给客户端以提示
	$msg = '';
	if($result){
		$msg = '添加记录成功！新员工的自增编号为：'.mysqli_insert_id($conn);
	}else{
		$msg = '添加记录失败！错误编号为：'.mysqli_errno($conn);
	}
	
?>
<!DOCTYPE html>
<html>
   <head>
	  <meta charset="utf-8"/>
	  <title></title>
   </head>

   <body>
	<h2>新添员工操作执行结果：</h2>
	<h3><?php echo $msg;?></h3>
	<p><a href='1-addemp.html'>继续添加新员工</a></p>
	<p><a href='1.html'>返回主菜单</a></p>
   </body>
</html>
