<?php 
	session_start();
	include 'config.php';
	$sql = "SELECT * FROM me ORDER BY mid DESC";
	$result= mysqli_query($connection,$sql);
	$output = "";

// user1
	$email1 = $_SESSION['email'];
	$uid = $_REQUEST['uid'];

// user 2
	$uid = $_REQUEST['uid'];
	$sql1 = "SELECT email FROM user WHERE user_id={$uid}" or die("SQL Failed!");
    $result1 = mysqli_query($connection,$sql1);
    $info1 = mysqli_fetch_assoc($result1);
    $email2 = $info1['email'];
    $uid2 = $_SESSION['user_role'];

	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_assoc($result)){
			if($email1 == $info['email'] && $uid == $info['user']){
				$output .= "<div class='text-end py-2 text-white mb-4' style='border-radius: 15px; max-width:80%; margin-left:auto;' id='{$info['mid']}'><span class='bg-success py-3 px-4 rounded-pill'>{$info['messege']}</span></div>";
			}else if($email2 == $info['email'] && $uid2 == $info['user']){
				$output .= "<div class='py-2 mb-4 text-white' style='border-radius: 15px; max-width:80%;' id='{$info['mid']}'><span class='bg-secondary py-3 px-4 rounded-pill'>{$info['messege']}</span></div>";
			}
		} // while
	echo $output;
	}
	
?>