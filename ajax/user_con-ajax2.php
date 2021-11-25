<?php
		session_start();
		include 'config.php';
		$uid =$_REQUEST['uid'];
		$sql1 = "SELECT * FROM user WHERE user_id={$uid}" or die("SQL Failed!");
	   $result1 = mysqli_query($connection,$sql1);

	   $info1 = mysqli_fetch_assoc($result1);

	   $email2 = $info1['email'];
	   $uid2 = $_SESSION['user_role'];
	   $sql2 ="SELECT * FROM me WHERE email='{$email2}' AND user={$uid2} ORDER BY mid DESC" or die("SQL Failed!");
	   $result2 = mysqli_query($connection,$sql2);
	   $output2 ="";
	   if(mysqli_num_rows($result2) > 0){
			while($info2 = mysqli_fetch_assoc($result2)){
				$output2 .= "<div><p class='bg-info' style='padding:1.5rem; border-radius: 15px' id='{$info2['mid']}'>{$info2['messege']}</p></div>";
			}
		}else{
			$output2 .="<h1> No record found!</h1>";
		}
		echo $output2;
?>



<!-- <tr class='text-right' id='users-div' id='show-data'></tr> -->
			