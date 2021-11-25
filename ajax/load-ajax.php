<?php 
	include 'config.php';
	$sql="SELECT * FROM me ORDER BY mid DESC";

	$result = mysqli_query($connection,$sql);
	$output = "";
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_assoc($result)){
			$output .= "<tr style='margin: 0 auto;' id='show-data'>
						 	<td id='{$info['mid']}'>{$info['messege']}</td>
  		    			</tr>";
		}
	}else{
		echo "<h1> No record inserted!</h1>";
	}
	echo $output;
 ?>