<?php 
// OWN PROFILE
	session_start();
	echo $email = $_SESSION['email'];
	$uid =  $_REQUEST['uid'];
	echo $uid;
	include 'config.php';
	$sql="SELECT * FROM me WHERE email='{$email}' AND user={$uid} ORDER BY mid DESC" or die("SQL Failed!");

	$result = mysqli_query($connection,$sql);
	$output = "";
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_assoc($result)){
			$output .= "<div>
				<p class='text-right bg-primary text-white' style='padding:1.5rem; border-radius: 15px' id='{$info['mid']}'>{$info['messege']}</p>
			</div>";
		}
	}else{
		$output .="<h1> No record found!</h1>";
	}
	echo $output;
 ?>

 <!-- <tr id='users-div' id='show-data'></tr> -->
 			