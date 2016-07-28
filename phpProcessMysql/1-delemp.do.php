<?php
	//接收请求中提交的eno
	$eno = $_REQUEST['eno'];
	//根据eno作数据的删除操作
	$conn = mysqli_connect('localhost','root','root','tarena');
	mysqli_query($conn,'SET NAMES utf8;');
	$sql = 'DELETE FROM emp WHERE eno='.$eno;
	$result = mysqli_query($conn,$sql);
	//把操作结果返回给用户
	$msg = '';
	if($result){
		$msg = '删除记录成功！被删除员工的编号为：'.$eno;
	}else{
		$msg = '删除记录失败！错误编号为：'.mysqli_errno($conn);
	}
?>
<!DOCTYPE html>
<html>
   <head>
	  <meta charset="utf-8"/>
	  <title></title>
   </head>

   <body>
	<h3><?php echo $msg;?></h3>
	<a href='1-showemp.php'>返回浏览员工页面</a>
   </body>
</html>
