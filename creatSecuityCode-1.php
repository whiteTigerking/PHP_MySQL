<?php
	//注意：此文件是要向客户端输出一副动态生成的图片
	//所以前前后后不能有任何的字符输出

	//告诉客户端，本页面输出的内容类型：是一副图片
	header('Content-Type', 'image/png');
	$w = 100;
	$h = 30;
	//在服务器端的内存中创建一副真彩色图片
	$img = imagecreatetruecolor($w, $h);

	//分配一个即将使用的颜色
	//$c = imagecolorallocate($img, 255, 0, 0);
	$c = imagecolorallocate($img, rand(150,230), rand(150,230), rand(150,230) );
	//在图片上画一个矩形，作为背景色
	imagefilledrectangle($img, 0, 0, $w, $h, $c);

	//生成四个随机的字符
	$src = 'ABCDEFGHIJKLMNPQRSTUVXWYZ23456789';
	$txt = $src[  rand(0,strlen($src) )];
	$txt .= $src[  rand(0,strlen($src) )];
	$txt .= $src[  rand(0,strlen($src) )];
	$txt .= $src[  rand(0,strlen($src) )];

	//再重新分配一个颜色
	$c = imagecolorallocate($img, rand(30,150), rand(30,150), rand(30,150) );
	//把字符串刷到图片上
	imagestring($img, 20, 30, 8, $txt, $c);
	//imagettftext()

	//向客户端输出图片中的二级制数据
	imagepng( $img );
	//从服务器端的内存中删除创建的图片
	imagedestroy( $img );
?>