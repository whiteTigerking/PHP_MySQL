<?php
	//接收请求中提交的eno
	$eno = $_REQUEST['eno'];
	$ename = $_REQUEST['ename'];
	$gender = $_REQUEST['gender'];
	$salary = $_REQUEST['salary'];
	$birthday = $_REQUEST['birthday'];
	$isMarried = $_REQUEST['isMarried'];
	$deptNo = $_REQUEST['deptNo'];
	//根据eno作数据的修改操作
	$conn = mysqli_connect('localhost','root','root','tarena');
	mysqli_query($conn,'SET NAMES utf8');
	$sql = "UPDATE emp SET ename='$ename',gender='$gender',salary='$salary',birthday='$birthday',isMarried='$isMarried' WHERE eno='$eno';";
	$result = mysqli_query($conn,$sql);
	$msg = '';
	if($result){
		$msg = '修改员工信息成功！修改的员工编号为：'.$eno;
	}else{
		$msg = '修改员工信息失败！错误编号为：'.mysqli_errno($conn);
	}
?>
<!DOCTYPE html>
<html>
   <head>
	  <meta charset="utf-8"/>
	  <title></title>
   </head>

   <body>
	<h3><?php echo $msg?></h3>
	<a href='1-showemp.php'>返回浏览员工信息页面</a>
   </body>
</html>
