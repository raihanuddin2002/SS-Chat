<?php 
		session_start();
		$email = $_SESSION['email'];
		// $username = $_SESSION['usename'];
		$mes = $_REQUEST['val'];
		$uid = $_REQUEST['uid'];
		include 'config.php';
		$sql = "INSERT INTO `me`(`email`, `messege`, `user`) VALUES ('{$email}','{$mes}','{$uid}')" ;
		$result = mysqli_query($connection,$sql) or die("Query Failed!");
		
		

	if($result){
		echo 1;
	}else{
		echo 0;
	}
	

	








 ?>