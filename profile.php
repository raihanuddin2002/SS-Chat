<?php require "head.php"; ?>
<?php 
	session_start();
	$user_role = $_SESSION['user_role'];
	include 'config.php';
	$sql= "SELECT * FROM user WHERE user_id = {$user_role}";
	$result = mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)){


 ?>
 
<input id="hidden_input" class="<?php echo $user_role; ?>" type="hidden" name="" value="">
<div class="container my-5 overflow-scroll">
	<div class="row p-4">

		<div class="b row justify-content-between align-items-center">
			<div class="col-6"><img class="logo img-fluid" src="images/site/gray.png" width="120" height="120"></div>
			<div  class="name col-6 align-items-center text-end">
				
					<?php 
						while($info = mysqli_fetch_assoc($result)){
						$_SESSION['name'] = $info['name'];

					?>
					<span class="me-4 fw-bold text-uppercase" id="<?php echo $info['user_id']; ?>"><?php echo $info['name']; ?>     </span>
					<?php 
							}
						}
					?>
				<button  class="btn btn-danger"><a class="text-decoration-none text-white" href="logout.php">LOG OUT</a></button>
			</div>
			<!-- <button>Himel</button> -->
		</div>
		<br><div class="empty"></div>
		<br><br><br>
		<div class="col-12 users border">
			
		</div>
	</div>
	
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//users
		function userLoad(){
			$.ajax({
				url: "ajax/user-ajax.php",
				post: "POST",
				success:function(data){
					$(".users").html(data);
				}
			})
		}
		userLoad();

		$(document).on("click",'#users-div a',function(){
			var uid = $(this).attr("id");
			$.ajax({
				url: "chat.php",
				post: "POST",
				data:{uid:uid},
				success:function(data){
					$(".chat").html(data);
				}
			})

		});
	});
</script>
<?php require "footer.php"; ?>
