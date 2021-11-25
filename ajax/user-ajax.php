<?php 
	include 'config.php';
	$sql="SELECT * FROM user";

	$result = mysqli_query($connection,$sql);
	$output = "";
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_assoc($result)){
			$output .= "<div class='col-12 border-none border-bottom py-4' id='users-div'><img class='logo me-2' src='images/site/mfp-right.png' width='30' height='30'><a class='text-decoration-none text-dark fs-5' href='chat.php?page={$info['user_id']}' id='{$info['user_id']}'>{$info['name']}</a></div>";
		}
	}else{
		$output .="<h1> No record found!</h1>";
	}
	echo $output;
 ?>